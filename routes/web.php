<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\backend\BackController;
use App\Http\Controllers\backend\ProductCategoryController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\TestiController;
use App\Http\Controllers\backend\FrontpageBannerController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [FrontController::class, 'home'])->name('homepage');
Route::get('/about', [FrontController::class, 'about'])->name('aboutpage');
Route::get('/appointment', [FrontController::class, 'appointment'])->name('appointment');
Route::post('/appointment/add', [FrontController::class, 'addAppoint'])->name('addAppoint');
Route::get('/contact', [FrontController::class, 'contact'])->name('contactus');
Route::post('/contact/send', [FrontController::class, 'storeCusMsg'])->name('sendContactMsg');

Route::prefix('shop')->group(
    function () {
        Route::get('/', [FrontController::class, 'shop'])->name('shoppage');
        Route::get('category/{slug}', [FrontController::class, 'shopByCategory'])->name('shop_by_cat');
        Route::get('product/{slug}', [FrontController::class, 'shopSingle'])->name('shop_single');
    }
);

Route::prefix('service')->group(
    function () {
        Route::get('/', [FrontController::class, 'service'])->name('servicepage');
        // Route::get('haircut-design', [FrontController::class, 'haircut_design'])->name('haircut_design');
        // Route::get('hair-straight', [FrontController::class, 'hair_straight'])->name('hair_straight');
        // Route::get('hair-treatment', [FrontController::class, 'hair_treatment'])->name('hair_treatment');
        // Route::get('makeup', [FrontController::class, 'makeup'])->name('makeup');
        // Route::get('facial', [FrontController::class, 'facial'])->name('facial');
        // Route::get('waxing', [FrontController::class, 'waxing'])->name('waxing');
        // Route::get('threading-micro-blading', [FrontController::class, 'threading'])->name('threading');
        // Route::get('beauty-training', [FrontController::class, 'beauty_trainig'])->name('beauty_training');
    }
);



/*
|--------------------------------------------------------------------------
| Back Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(
    function () {
        Route::get('/', [BackController::class, 'dashboard'])->name('adminDash');

        Route::prefix('appointment')->group(
            function () {
                Route::get('/', [BackController::class, 'appointments'])->name('appointments');
                Route::get('visited/{id}', [BackController::class, 'MarkAppointAsVisited'])->name('markAppointVisited');
                Route::get('delete/{id}', [BackController::class, 'appointmentDelete'])->name('appointmentDelete');
            }
        );

        Route::prefix('mails')->group(
            function () {
                Route::get('/', [BackController::class, 'showCusMails'])->name('showCusMails');
                Route::get('read/{id}', [BackController::class, 'markMailAsRead'])->name('markMailAsRead');
                Route::get('delete/{id}', [BackController::class, 'ContactMailDelete'])->name('ContactMailDelete');
            }
        );

        Route::resource('frontbanner', FrontpageBannerController::class);
        Route::resource('product', ProductController::class);
        Route::resource('category', ProductCategoryController::class);
        Route::resource('testimonial', TestiController::class);
    }
);

Auth::routes();

Route::any('/register', function () {
    return  redirect('/login');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
