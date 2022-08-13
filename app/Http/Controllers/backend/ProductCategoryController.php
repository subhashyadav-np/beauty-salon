<?php

namespace App\Http\Controllers\backend;

use App\Models\ProductCategory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['auth', 'admin',]);
    }

    public function index()
    {
        $categoriesAll = ProductCategory::all();
        $categoriesParent = ProductCategory::Where('type', 'parent')->get();
        return view('backend.category', [
            'cats' => $categoriesAll,
            'parents' => $categoriesParent,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'string|required|unique:product_categories',
                'catType' => 'string|required',
                'cover' => 'sometimes|image|mimes:jpg,jpeg,png',
            ]
        );
        $catName = $request->name;
        $catType = $request->catType;
        $catParent = $request->parent;
        $catSlug = Str::of($request->name)->slug('-');

        if ($catType == "child" && $catParent == NULL) {
            return back()->with('error', 'If you create category as a child then you must choose parent category for it');
        } else {
            $category = new ProductCategory;
            $category->name = $catName;
            $category->slug = $catSlug;
            $category->type = $catType;
            $category->if_has_parent = $catParent;

            if ($request->hasFile('cover')) {
                $originalImage = $request->file('cover');
                $originalImage->move(public_path() . '/images/products/category', $img = 'product_cat_' . Str::random(15) . '.jpg');
                $category->cover = $img;
            }

            $res = $category->save();
        }

        if ($res) {
            return redirect()->route('category.index')->with('success', 'Category Added successfully');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = ProductCategory::find($id);
        return json_encode($categories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'string|required',
                'catType' => 'string|required',
                'cover' => 'sometimes|image|mimes:jpg,jpeg,png',
            ]
        );

        $catName = $request->name;
        $catType = $request->catType;
        $catParent = $request->parent;
        $catSlug = Str::of($request->name)->slug('-');

        if ($catType == "child" && $catParent == NULL) {
            return back()->with('error', 'If you create category as a child then you must choose parent category for it');
        } else {
            $category = ProductCategory::find($id);
            $category->name = $catName;
            $category->slug = $catSlug;
            $category->type = $catType;
            $category->if_has_parent = $catParent;

            if ($request->hasFile('cover')) {
                $existCover = public_path('/images/products/category/' . $category->cover);
                if (file_exists($existCover)) {
                    unlink($existCover);
                }

                $originalImage = $request->file('cover');
                $originalImage->move(public_path() . '/images/products/category', $img = 'product_cat_' . Str::random(15) . '.jpg');
                $category->cover = $img;
            }

            $res = $category->save();
        }

        if ($res) {
            return redirect()->route('category.index')->with('success', 'Category Updated successfully');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = ProductCategory::find($id);
        $res = ProductCategory::destroy($id);
        if ($res) {
            $existCover = public_path('/images/products/category/' . $category->cover);
            if (file_exists($existCover)) {
                unlink($existCover);
            }
            return redirect()->route('category.index')->with('success', 'Product Category Deleted Successfully');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }
}
