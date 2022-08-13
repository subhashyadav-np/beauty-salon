<?php

namespace App\Http\Controllers\backend;

use App\Models\Testimonial;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TestiController extends Controller
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
        $testimonials = Testimonial::all();
        return view('backend.testimonial', ['testimonials' => $testimonials]);
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
                'name' => 'required|string|max:55',
                'avatar' => 'sometimes|image|max:1024|mimes:jpg,png,jpeg',
                'review' => 'required|string',
            ]
        );

        $testi = new Testimonial();
        $testi->name = $request->name;
        $testi->review = $request->review;

        if ($request->hasFile('avatar')) {
            $originalImage = $request->file('avatar');
            $originalImage->move(public_path() . '/images/testimonials', $img = 'customer_' . Str::random(15) . '.jpg');
            $testi->avatar = $img;
        }

        $res = $testi->save();

        if ($res) {
            return redirect()->route('testimonial.index')->with('success', 'Testimonial added successfully');
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
        $testimonial = Testimonial::find($id);
        return json_encode($testimonial);
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
                'name' => 'required|string|max:55',
                'avatar' => 'sometimes|image|max:1024|mimes:jpg,png,jpeg',
                'review' => 'required|string',
            ]
        );

        $testi = Testimonial::find($id);
        $testi->name = $request->name;
        $testi->review = $request->review;

        if ($request->hasFile('avatar')) {
            $existAvtar = public_path('/images/testimonials/' . $testi->avatar);
            if (file_exists($existAvtar)) {
                unlink($existAvtar);
            }
            $originalImage = $request->file('avatar');
            $originalImage->move(public_path() . '/images/testimonials', $img = 'customer_' . Str::random(15) . '.jpg');
            $testi->avatar = $img;
        }

        $res = $testi->save();

        if ($res) {
            return redirect()->route('testimonial.index')->with('success', 'Testimonial added successfully');
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
        $testi = Testimonial::find($id);
        $res = Testimonial::destroy($id);
        if ($res) {
            $existAvtar = public_path('/images/testimonials/' . $testi->avatar);
            if (file_exists($existAvtar)) {
                unlink($existAvtar);
            }
            return redirect()->route('testimonial.index')->with('success', 'Testimonial Deleted Successfully');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }
}
