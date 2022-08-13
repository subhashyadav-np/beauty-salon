<?php

namespace App\Http\Controllers\backend;

use App\Models\FrontBanner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FrontpageBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homebanner = FrontBanner::all();
        return view('backend.frontpagebanner', [
            'banners' => $homebanner,
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
        $homebanner = new FrontBanner;
        $homebanner->small_title = $request->smTitle;
        $homebanner->main_title = $request->mTitle;
        $homebanner->paragraph = $request->Bparagraph;
        if ($request->hasFile('cover')) {
            $originalImage = $request->file('cover');
            $originalImage->move(public_path() . '/images/homepage', $img = 'home_banner_' . Str::random(15) . '.jpg');
            $homebanner->banner = $img;
        }
        $res = $homebanner->save();
        if ($res) {
            return redirect()->route('frontbanner.index')->with('success', 'Homepage Banner Added successfully');
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
        $homebanner = FrontBanner::find($id);
        return json_encode($homebanner);
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
        $homebanner = FrontBanner::find($id);
        $homebanner->small_title = $request->smTitle;
        $homebanner->main_title = $request->mTitle;
        $homebanner->paragraph = $request->Bparagraph;
        if ($request->hasFile('cover')) {
            $existBanner = public_path('/images/homepage/' . $homebanner->banner);
            if (file_exists($existBanner)) {
                unlink($existBanner);
            }
            $originalImage = $request->file('cover');
            $originalImage->move(public_path() . '/images/homepage', $img = 'home_banner_' . Str::random(15) . '.jpg');
            $homebanner->banner = $img;
        }
        $res = $homebanner->save();
        if ($res) {
            return redirect()->route('frontbanner.index')->with('success', 'Homepage Banner Updated successfully');
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
        $homebanner = FrontBanner::find($id);
        $res = FrontBanner::destroy($id);
        if ($res) {
            $existBanner = public_path('/images/homepage/' . $homebanner->banner);
            if (file_exists($existBanner)) {
                unlink($existBanner);
            }
            return redirect()->route('frontbanner.index')->with('success', 'Home Banner Deleted Successfully');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }
}
