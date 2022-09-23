<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogcateController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AboutmoreController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\BookingController;

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


Route::get('send-mail', function () {
   
    $details = [
        'title' => 'Mail from Rimon Nahid',
        'body' => 'This is for testing email using smtp'
    ];
   
    \Mail::to('5001000junkemail@gmail.com')->send(new \App\Mail\MyMail($details));
   
    dd("Email is Sent.");
});



Route::get('/test', function () {
    return view('test');
});
Route::get('/layouts', function () {
    return view('layouts.app');
});
Route::get('/', function () {
    return view('welcome');
});


Route::post('/course-booking',[BookingController::class, 'booking'])->name('course.booking');
Route::get('/booking-create',[BookingController::class, 'bookingCreate'])->name('booking.create');
Route::post('/booking-store',[BookingController::class, 'bookingStore'])->name('booking.store');

//single product cart
Route::post('/singleproduct/addcart/{course}',[PublicController::class, 'addCart']);


//BASIC MENU
Route::get('/', [PublicController::class, 'index'])->name('/');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/courses', [PublicController::class, 'courses'])->name('courses');
Route::get('/course/{slug}', [PublicController::class, 'courseSingle'])->name('course.single');
Route::post('/course-order', [PublicController::class, 'courseOrder'])->name('course.order');

Route::get('/blogs', [PublicController::class, 'blogs'])->name('blogs');
Route::get('/faqs', [PublicController::class, 'faqs'])->name('faqs');
Route::get('/contact', [PublicController::class, 'contact'])->name('contact');
Route::get('/about', [PublicController::class, 'about'])->name('about');


Route::post('/contact-create', [PublicController::class, 'contactCreate'])->name('contact.create');


Auth::routes(['verify' => true]);

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/contact-messages', [AdminController::class, ''])->name('contact.messages');

    //Faq ROUTES
    Route::get('/faq-list', [FaqController::class, 'index'])->name('admin.faq');
    Route::post('/create/faq', [FaqController::class, 'create'])->name('create.faq');
    Route::post('/update/faq/{faq}', [FaqController::class, 'update'])->name('update.faq');
    Route::get('/delete/faq/{faq}', [FaqController::class, 'delete'])->name('delete.faq');
    Route::get('/active-faq/{faq}', [FaqController::class, 'active'])->name('active.faq');
    Route::get('/deactive-faq/{faq}', [FaqController::class, 'deactive'])->name('deactive.faq');
    Route::get('/deactive-faq-list', [FaqController::class, 'deactiveList'])->name('deactive.faq.list');

    //BLOG ROUTES
    Route::get('/list-blog', [BlogController::class, 'index'])->name('index.blog');
    Route::get('/create-blog', [BlogController::class, 'create'])->name('create.blog');
    Route::post('/store-blog', [BlogController::class, 'store'])->name('store.blog');
    Route::get('/edit-blog/{blog}', [BlogController::class, 'edit'])->name('edit.blog');
    Route::post('/update-blog/{blog}', [BlogController::class, 'update'])->name('update.blog');
    Route::get('/delete-blog/{blog}', [BlogController::class, 'delete'])->name('delete.blog');
    Route::get('/active-blog/{blog}', [BlogController::class, 'active'])->name('active.blog');
    Route::get('/deactive-blog/{blog}', [BlogController::class, 'deactive'])->name('deactive.blog');
    Route::get('/deactive-blog-list', [BlogController::class, 'deactiveList'])->name('deactive.blog.list');

    //BLOGCATE ROUTES
    Route::get('/blogcate', [BlogcateController::class, 'index'])->name('admin.blogcate');
    Route::post('/create/blogcate', [BlogcateController::class, 'create'])->name('create.blogcate');
    Route::post('/update/blogcate/{blogcate}', [BlogcateController::class, 'update'])->name('update.blogcate');
    Route::get('/delete/blogcate/{blogcate}', [BlogcateController::class, 'delete'])->name('delete.blogcate');
    Route::get('/active-blogcate/{blogcate}', [BlogcateController::class, 'active'])->name('active.blogcate');
    Route::get('/deactive-blogcate/{blogcate}', [BlogcateController::class, 'deactive'])->name('deactive.blogcate');
    Route::get('/deactive-blogcate-list', [BlogcateController::class, 'deactiveList'])->name('deactive.blogcate.list');


    //COURSE ROUTES
    Route::get('/list-course', [CourseController::class, 'index'])->name('index.course');
    Route::get('/create-course', [CourseController::class, 'create'])->name('create.course');
    Route::post('/store-course', [CourseController::class, 'store'])->name('store.course');
    Route::get('/edit-course/{course}', [CourseController::class, 'edit'])->name('edit.course');
    Route::post('/update-course/{course}', [CourseController::class, 'update'])->name('update.course');
    Route::get('/delete-course/{course}', [CourseController::class, 'delete'])->name('delete.course');
    Route::get('/active-course/{course}', [CourseController::class, 'active'])->name('active.course');
    Route::get('/deactive-course/{course}', [CourseController::class, 'deactive'])->name('deactive.course');
    Route::get('/deactive-course-list', [CourseController::class, 'deactiveList'])->name('deactive.course.list');

    //PACKAGE ROUTES
    Route::get('/list-package', [PackageController::class, 'index'])->name('admin.package');
    Route::post('/create/package', [PackageController::class, 'create'])->name('create.package');
    Route::post('/update/package/{package}', [PackageController::class, 'update'])->name('update.package');
    Route::get('/delete/package/{package}', [PackageController::class, 'delete'])->name('delete.package');
    Route::get('/active-package/{package}', [PackageController::class, 'active'])->name('active.package');
    Route::get('/deactive-package/{package}', [PackageController::class, 'deactive'])->name('deactive.package');
    Route::get('/deactive-package-list', [PackageController::class, 'deactiveList'])->name('deactive.package.list');

    //CAR ROUTES
    Route::get('/list-car', [CarController::class, 'index'])->name('admin.car');
    Route::post('/create/car', [CarController::class, 'create'])->name('create.car');
    Route::post('/update/car/{car}', [CarController::class, 'update'])->name('update.car');
    Route::get('/delete/car/{car}', [CarController::class, 'delete'])->name('delete.car');
    Route::get('/active-car/{car}', [CarController::class, 'active'])->name('active.car');
    Route::get('/deactive-car/{car}', [CarController::class, 'deactive'])->name('deactive.car');
    Route::get('/deactive-car-list', [CarController::class, 'deactiveList'])->name('deactive.car.list');


    //SETTING ROUTE ARE HERE
    Route::get('setting', [SettingController::class,'index'])->name('setting');
    Route::post('setting-store',[SettingController::class,'store'])->name('store.setting');
    Route::post('setting-update',[SettingController::class,'update'])->name('update.setting');


    //ABOUT ROUTE ARE HERE
    Route::get('admin-about', [AboutController::class,'index'])->name('admin.about');
    Route::post('about-store',[AboutController::class,'store'])->name('store.about');
    Route::post('about-update',[AboutController::class,'update'])->name('update.about');

    
    //ABOUT MORE ROUTES
    Route::get('/aboutmore/{about}', [AboutmoreController::class, 'index'])->name('admin.aboutmore');
    Route::post('/create/aboutmore', [AboutmoreController::class, 'create'])->name('create.aboutmore');
    Route::post('/update/aboutmore/{aboutmore}', [AboutmoreController::class, 'update'])->name('update.aboutmore');
    Route::get('/delete/aboutmore/{aboutmore}', [AboutmoreController::class, 'delete'])->name('delete.aboutmore');
    Route::get('/active-aboutmore/{aboutmore}', [AboutmoreController::class, 'active'])->name('active.aboutmore');
    Route::get('/deactive-aboutmore/{aboutmore}', [AboutmoreController::class, 'deactive'])->name('deactive.aboutmore');
    Route::get('/deactive-aboutmore-list', [AboutmoreController::class, 'deactiveList'])->name('deactive.aboutmore.list');
    
    //contact MORE ROUTES
    Route::get('/contact-messages', [AdminController::class, 'contactMessages'])->name('admin.contact.messages');
    Route::get('/delete/contact/{contact}', [AdminController::class, 'delete'])->name('delete.contact');
    Route::get('/active-contact/{contact}', [AdminController::class, 'active'])->name('active.contact');
    Route::get('/deactive-contact/{contact}', [AdminController::class, 'deactive'])->name('deactive.contact');
    Route::get('/deactive-contact-list', [AdminController::class, 'deactiveList'])->name('deactive.contact.list');

});


// logout
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');


