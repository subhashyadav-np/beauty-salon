<?php

namespace App\Http\Controllers\backend;

use App\Models\ProductCategory;
use App\Models\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
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
        $products = DB::table('product_categories')
            ->join('products', 'product_categories.id', "=", 'products.cat_id')
            ->select(
                'products.*',
                'product_categories.name as catName',
                'product_categories.if_has_parent as catParent',
            )
            ->get();
        return view('backend.product', [
            'Product' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::all();
        return view(
            'backend.product-add',
            [
                'Cats' => $categories,
            ]
        );
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
                'title' => 'string|required|max:99',
                'cat_id' => 'required|numeric',
                'price' => 'required|numeric',
                'discount' => 'sometimes|numeric',
                'productDesc' => 'nullable|string',
                'meta_desc' => 'nullable|string',
                'keywords' => 'nullable|string',
            ]
        );

        $product = new Product;
        $product->title = $request->title;
        $product->slug = Str::of($request->title)->slug('-');
        $product->cat_id = $request->cat_id;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->description = $request->productDesc;
        $product->meta_desc = $request->meta_desc;
        $product->keywords = $request->keywords;
        if ($request->hasFile('cover')) {
            $originalImage = $request->file('cover');
            $originalImage->move(public_path() . '/images/products', $img = 'product_' . Str::random(15) . '.jpg');
            $product->cover = $img;
        }
        $res = $product->save();
        if ($res) {
            return redirect()->route('product.index')->with('success', 'Product Added successfully');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $categories = ProductCategory::all();
        $product = DB::table('product_categories')
            ->join('products', 'product_categories.id', "=", 'products.cat_id')
            ->select(
                'products.*',
                'product_categories.id as catID',
                'product_categories.name as catName',
                'product_categories.if_has_parent as catParent',
            )
            ->Where('products.slug', '=', $slug)
            ->first();
        return view('backend.product-edit', [
            'Cats' => $categories,
            'productData' => $product,
        ]);
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
                'title' => 'string|required|max:99',
                'cat_id' => 'required|numeric',
                'price' => 'required|numeric',
                'discount' => 'sometimes|numeric',
                'productDesc' => 'nullable|string',
                'meta_desc' => 'nullable|string',
                'keywords' => 'nullable|string',
            ]
        );

        $product = Product::find($id);
        $product->title = $request->title;
        $product->slug = Str::of($request->title)->slug('-');
        $product->cat_id = $request->cat_id;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->description = $request->productDesc;
        $product->meta_desc = $request->meta_desc;
        $product->keywords = $request->keywords;
        if ($request->hasFile('cover')) {
            $existCover = public_path('/images/products/' . $product->cover);
            if (file_exists($existCover)) {
                unlink($existCover);
            }
            $originalImage = $request->file('cover');
            $originalImage->move(public_path() . '/images/products', $img = 'product_' . Str::random(15) . '.jpg');
            $product->cover = $img;
        }
        $res = $product->save();
        if ($res) {
            return redirect()->route('product.index')->with('success', 'Product Updated successfully');
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
        $product = Product::find($id);
        $res = Product::destroy($id);
        if ($res) {
            $existCover = public_path('/images/products/' . $product->cover);
            if (file_exists($existCover)) {
                unlink($existCover);
            }
            return redirect()->route('product.index')->with('success', 'Product Deleted Successfully');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }
}
