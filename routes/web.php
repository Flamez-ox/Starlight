<?php

use App\Http\Controllers\Home\ContactController;
use App\Http\Controllers\Home\HomeSectionController;
use App\Http\Controllers\Home\HomeServiceController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\HomeSolutionController;
use App\Http\Controllers\Home\RinglightController;
use App\Http\Controllers\Home\ShoesController;
use App\Models\Home\HomeSection;
use App\Models\Home\HomeSlider;
use App\Models\Home\HomeSolution;
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

Route::get('/', function () {
    // $sliders = HomeSlider::all();
    // $sections = HomeSection::all();
    //$services = HomeService::all();
    return view('frontend.index');
});

// Route::get('/admin', function () {
//     return view('admin.index');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});

// frontend pages
Route::get('/ringlights', [RinglightController::class, 'ringlight'])->name('ringlights');
Route::get('/shoes', [ShoesController::class,'shoes'])->name('shoes');
Route::get('/contact', [ShoesController::class,'contact'])->name('contact');

//FOR THE HOMESLIDER
Route::get('/admin/home/homeslider', [HomeSliderController::class, 'index'])->name('admin.home.homeslider');
Route::get('/admin/homeslider/add', [HomeSliderController::class, 'create'])->name('admin/homeslider/add');
Route::post('/admin/homeslider/add/post', [HomeSliderController::class, 'store'])->name('store.homeslider');
Route::get('/admin/homeslider/edit/{id}', [HomeSliderController::class, 'edit'])->name('edit.homeslider');
Route::post('/admin/homeslider/update/{id}', [HomeSliderController::class, 'update'])->name('update.homeslider');
Route::get('/admin/homeslider/delete/{id}', [HomeSliderController::class, 'destroy'])->name('destroy.homeslider');


//FOR THE RINGLIGHT
Route::get('/admin/home/ringlight', [RinglightController::class, 'index'])->name('admin.ringlight');
Route::get('/admin/ringlight/add', [RinglightController::class, 'create'])->name('admin.ringlight.add');
Route::post('/admin/ringlight/add/post', [RinglightController::class, 'store'])->name('store.ringlight');
Route::get('/admin/ringlight/edit/{id}', [RinglightController::class, 'edit'])->name('edit.ringlight');
Route::post('/admin/ringlight/update/{id}', [RinglightController::class, 'update'])->name('update.ringlight');
Route::get('/admin/ringlight/delete/{id}', [RinglightController::class, 'destroy'])->name('destroy.ringlight');

//FOR THE SHOES
Route::get('/admin/home/shoes', [ShoesController::class, 'index'])->name('admin.shoes');
Route::get('/admin/shoes/add', [ShoesController::class, 'create'])->name('admin.shoes.add');
Route::post('/admin/shoes/add/post', [ShoesController::class, 'store'])->name('store.shoes');
Route::get('/admin/shoes/edit/{id}', [ShoesController::class, 'edit'])->name('edit.shoes');
Route::post('/admin/shoes/update/{id}', [ShoesController::class, 'update'])->name('update.shoes');
Route::get('/admin/shoes/delete/{id}', [ShoesController::class, 'destroy'])->name('destroy.shoes');

//FOR CONTACT

Route::post('/send', [ContactController::class, 'send'])->name('send.email');
Route::post('/shoe_order', [ContactController::class, 'order'])->name('shoe.order');


//FOR ABOUT SECTION
Route::get('/admin/section', [HomeSectionController::class,'index'])->name('admin.section');
Route::get('/admin/section/create', [HomeSectionController::class,'create'])->name('admin.section.create');
Route::post('/admin/section/add', [HomeSectionController::class,'store'])->name('admin.section.add');
Route::get('/admin/section/edit/{id}', [HomeSectionController::class, 'edit'])->name('edit.section');
Route::post('/admin/section/update/{id}', [HomeSectionController::class, 'update'])->name('update.section');
Route::get('/admin/section/delete/{id}', [HomeSectionController::class, 'destroy'])->name('destroy.section');


//FOR SERVICE SECTION
Route::get('/admin/service', [HomeServiceController::class,'index'])->name('admin.service');
Route::get('/admin/service/create', [HomeServiceController::class,'create'])->name('admin.service.create');
Route::post('/admin/service/add', [HomeServiceController::class,'store'])->name('admin.service.add');
Route::get('/admin/service/edit/{id}', [HomeServiceController::class, 'edit'])->name('edit.service');
Route::post('/admin/service/update/{id}', [HomeServiceController::class, 'update'])->name('update.service');
Route::get('/admin/service/delete/{id}', [HomeServiceController::class, 'destroy'])->name('destroy.service');


//FOR SOLUTION SECTION
Route::get('/admin/solution', [HomeSolutionController::class,'index'])->name('admin.solution');
Route::get('/admin/solution/create', [HomeSolutionController::class,'create'])->name('admin.solution.create');
Route::post('/admin/solution/add', [HomeSolutionController::class,'store'])->name('admin.solution.add');
Route::get('/admin/solution/edit/{id}', [HomeSolutionController::class, 'edit'])->name('edit.solution');
Route::post('/admin/solution/update/{id}', [HomeSolutionController::class, 'update'])->name('update.solution');
Route::get('/admin/solution/delete/{id}', [HomeSolutionController::class, 'destroy'])->name('destroy.solution');
