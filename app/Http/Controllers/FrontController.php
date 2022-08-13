<?php

namespace App\Http\Controllers;

use App\Mail\Appointment as MailAppointment;
use App\Models\Testimonial;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\Appointment;
use App\Models\ContactMail;
use App\Models\FrontBanner;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
    public function home()
    {
        $homebanner = FrontBanner::all();
        $testi = Testimonial::all();
        $categoriesParent = ProductCategory::Where('type', 'parent')->get();
        $latestProduct = Product::all()->sortByDesc("id")->take(4);
        return view('frontend.home', [
            'HomeBanners' => $homebanner,
            'Testimonials' => $testi,
            'ProuctParentCats' => $categoriesParent,
            'latestProduct' => $latestProduct,
        ]);
    }

    public function about()
    {
        $categoriesParent = ProductCategory::Where('type', 'parent')->get();
        return view('frontend.about', [
            'ProuctParentCats' => $categoriesParent,
        ]);
    }

    public function shop()
    {
        $categoriesParent = ProductCategory::Where('type', 'parent')->get();
        $products = Product::all()->sortByDesc("id");
        return view('frontend.shop', [
            'productData' => $products,
            'ProuctParentCats' => $categoriesParent,
        ]);
    }

    public function shopByCategory($slug)
    {
        $categoriesParent = ProductCategory::Where('type', 'parent')->get();
        $products = DB::table('product_categories')
            ->join('products', 'product_categories.id', "=", 'products.cat_id')
            ->select(
                'products.*',
                'product_categories.slug as catSlug',
            )
            ->where('product_categories.slug', '=', $slug)
            ->get();
        return view('frontend.shop', [
            'productData' => $products,
            'ProuctParentCats' => $categoriesParent,
        ]);
    }

    public function shopSingle($slug)
    {
        $categoriesParent = ProductCategory::Where('type', 'parent')->get();
        $product = DB::table('product_categories')
            ->join('products', 'product_categories.id', "=", 'products.cat_id')
            ->select(
                'products.*',
                'product_categories.name as catname',
                'product_categories.if_has_parent as catMainname',
            )
            ->where('products.slug', '=', $slug)
            ->first();
        return view('frontend.shop_single', [
            'productData' => $product,
            'ProuctParentCats' => $categoriesParent,
        ]);
    }

    public function appointment()
    {
        $categoriesParent = ProductCategory::Where('type', 'parent')->get();
        return view('frontend.appointment', [
            'ProuctParentCats' => $categoriesParent,
        ]);
    }

    public function addAppoint(Request $request)
    {
        $request->validate(
            [
                'aa_name' => 'string|required|max:99',
                'aa_email' => 'email|required|max:99',
                'aa_number' => 'string|required|max:99',
                'aa_service' => 'string|nullable',
                'aa_name' => 'string|required|max:99',
            ]
        );
        $appoint = new Appointment;
        $appoint->customer = $request->aa_name;
        $appoint->email = $request->aa_email;
        $appoint->phone = $request->aa_number;
        $appoint->visited_before = $request->aa_visited;
        $appoint->service = $request->aa_service;
        $appoint->appointDate = $request->aa_date;
        $appoint->message = $request->aa_message;

        $res = $appoint->save();

        $data = $request->except('_token');
        Mail::to('info@jimeebeautysalon.com')->send(new MailAppointment($data));

        if ($res) {
            return redirect()->route('homepage')->with('success', 'Appointment Booked Successfully');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }

    public function contact()
    {
        $categoriesParent = ProductCategory::Where('type', 'parent')->get();
        return view('frontend.contact', [
            'ProuctParentCats' => $categoriesParent,
        ]);
    }

    public function storeCusMsg(Request $request)
    {
        $mail = new ContactMail;
        $mail->customer = $request->name;
        $mail->email = $request->email;
        $mail->phone = $request->number;
        $mail->message = $request->message;

        $res = $mail->save();

        if ($res) {
            return redirect()->route('homepage')->with('success', 'Mail Sent Successfully');
        } else {
            return back()->with('error', 'Something went wrong!');
        }
    }

    public function service()
    {
        $categoriesParent = ProductCategory::Where('type', 'parent')->get();
        return view('frontend.service', [
            'ProuctParentCats' => $categoriesParent,
        ]);
    }

    public function haircut_design()
    {
        $categoriesParent = ProductCategory::Where('type', 'parent')->get();
        return view('frontend.service_single.haircut_design', [
            'ProuctParentCats' => $categoriesParent,
        ]);
    }

    public function hair_straight()
    {
        $categoriesParent = ProductCategory::Where('type', 'parent')->get();
        return view('frontend.service_single.hair_straight', [
            'ProuctParentCats' => $categoriesParent,
        ]);
    }

    public function hair_treatment()
    {
        $categoriesParent = ProductCategory::Where('type', 'parent')->get();
        return view('frontend.service_single.hair_treatment', [
            'ProuctParentCats' => $categoriesParent,
        ]);
    }

    public function makeup()
    {
        $categoriesParent = ProductCategory::Where('type', 'parent')->get();
        return view('frontend.service_single.makeup', [
            'ProuctParentCats' => $categoriesParent,
        ]);
    }

    public function facial()
    {
        $categoriesParent = ProductCategory::Where('type', 'parent')->get();
        return view('frontend.service_single.facial', [
            'ProuctParentCats' => $categoriesParent,
        ]);
    }

    public function waxing()
    {
        $categoriesParent = ProductCategory::Where('type', 'parent')->get();
        return view('frontend.service_single.waxing', [
            'ProuctParentCats' => $categoriesParent,
        ]);
    }

    public function beauty_trainig()
    {
        $categoriesParent = ProductCategory::Where('type', 'parent')->get();
        return view('frontend.service_single.beauty_trainig', [
            'ProuctParentCats' => $categoriesParent,
        ]);
    }

    public function threading()
    {
        $categoriesParent = ProductCategory::Where('type', 'parent')->get();
        return view('frontend.service_single.threading', [
            'ProuctParentCats' => $categoriesParent,
        ]);
    }
}
