<?php

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\TestimonialController;

use App\Http\Controllers\SettingController;
use App\Http\Controllers\MetaDataController;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\PhotoGalleryController;
use App\Http\Controllers\Admin\VideoGalleryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\OurClientController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\YearController;
use App\Http\Controllers\InquiryController;

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

// Route::fallback(function () {
//     return view('errors.404'); // Make sure the view path matches your custom 404 page
// });

Route::get('/index', [FrontController::class, 'index'])->name('index');
Route::get('about-us', [FrontController::class, 'about'])->name('about');
Route::get('blog', [FrontController::class, 'blog'])->name('blog');
Route::get('contact-us', [FrontController::class, 'contactus'])->name('contactus');
Route::post('contact-us-store', [FrontController::class, 'contact_us_store'])->name('contact_us_store');
Route::get('refresh_captcha', [FrontController::class, 'refreshCaptcha'])->name('refresh_captcha');
Route::get('thank-you', [FrontController::class, 'thankyou'])->name('thankyou');


Route::get('service/{slugname?}', [FrontController::class, 'service'])->name('service');
Route::get('photogallery', [FrontController::class, 'photogallery'])->name('photogallery');
Route::get('videogallery', [FrontController::class, 'videogallery'])->name('videogallery');
Route::get('service-detail/{slugname?}', [FrontController::class, 'servicedetail'])->name('servicedetail');
Route::get('blog-detail/{slugname?}', [FrontController::class, 'blog_detail'])->name('blogdetail');

Route::get('login', fn() => redirect()->route('admin.login'))->name('login');

Route::middleware('guest:admin')->group(function () {
    Route::get('/admin/login', [AdminLoginController::class, 'showAdminLoginForm'])->name('admin.login');
    Route::post('/admin-login', [AdminLoginController::class, 'adminLogin'])->name('admin.login.post');
    Route::get('/admin-logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
});
// Route::get('/login', function () {
//     return redirect()->route('login');
// });

// Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/Inquiry', [App\Http\Controllers\InquiryController::class, 'index'])->name('Inquiry');
Route::delete('/Inquiry', [App\Http\Controllers\InquiryController::class, 'delete'])->name('inquiry.delete');
Route::delete('/Inquiry/multi-delete', [App\Http\Controllers\InquiryController::class, 'multiDelete'])
    ->name('inquiry.multidelete');
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    return 'Cache is cleared';
});
// Profile Routes
Route::prefix('profile')->name('profile.')->middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'getProfile'])->name('detail');
    Route::get('/edit', [HomeController::class, 'EditProfile'])->name('EditProfile');
    Route::post('/update', [HomeController::class, 'updateProfile'])->name('update');
    Route::post('/change-password', [HomeController::class, 'changePassword'])->name('change-password');
});

Route::get('logout', [LoginController::class, 'logout'])->name('logout');

// Roles
Route::resource('roles', App\Http\Controllers\RolesController::class);

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/categories', [CategoryController::class, 'index'])
        ->name('categories.index');

    Route::post('/categories', [CategoryController::class, 'store'])
        ->name('categories.store');

    Route::put('/categories/{id}', [CategoryController::class, 'update'])
        ->name('categories.update');

    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])
        ->name('categories.destroy');

    Route::post('/categories/bulk-delete', [CategoryController::class, 'bulkDelete'])
        ->name('categories.bulk-delete');
});

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get(
        '/our-clients',
        [OurClientController::class, 'index']
    )->name('our-clients.index');

    Route::post(
        '/our-clients',
        [OurClientController::class, 'store']
    )->name('our-clients.store');

    Route::put(
        '/our-clients/{id}',
        [OurClientController::class, 'update']
    )->name('our-clients.update');

    Route::delete(
        '/our-clients/{id}',
        [OurClientController::class, 'destroy']
    )->name('our-clients.destroy');

    Route::post(
        '/our-clients/bulk-delete',
        [OurClientController::class, 'bulkDelete']
    )->name('our-clients.bulk-delete');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/photo-gallery', [PhotoGalleryController::class, 'index'])->name('photo-gallery.index');/*|--------------------------------------------------------------------------|CategoryWiseServiceAJAX|--------------------------------------------------------------------------*/
    Route::get('/photo-gallery/services/{category_id}', [PhotoGalleryController::class, 'getServicesByCategory'])->name('photo-gallery.services');
    Route::post('/photo-gallery', [PhotoGalleryController::class, 'store'])->name('photo-gallery.store');
    Route::put('/photo-gallery/{id}', [PhotoGalleryController::class, 'update'])->name('photo-gallery.update');
    Route::delete('/photo-gallery/{id}', [PhotoGalleryController::class, 'destroy'])->name('photo-gallery.destroy');
    Route::post('/photo-gallery/bulk-delete', [PhotoGalleryController::class, 'bulkDelete'])->name('photo-gallery.bulk-delete');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/video-gallery', [VideoGalleryController::class, 'index'])->name('video-gallery.index');
    Route::get('/video-gallery/services/{category_id}', [VideoGalleryController::class, 'getServicesByCategory'])->name('video-gallery.services');
    Route::post('/video-gallery', [VideoGalleryController::class, 'store'])->name('video-gallery.store');
    Route::put('/video-gallery/{id}', [VideoGalleryController::class, 'update'])->name('video-gallery.update');
    Route::delete('/video-gallery/{id}', [VideoGalleryController::class, 'destroy'])->name('video-gallery.destroy');
    Route::post('/video-gallery/bulk-delete', [VideoGalleryController::class, 'bulkDelete'])->name('video-gallery.bulk-delete');
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/faqs', [FaqController::class, 'index'])->name('faqs.index');
    Route::post('/faqs', [FaqController::class, 'store'])->name('faqs.store');
    Route::put('/faqs/{id}', [FaqController::class, 'update'])->name('faqs.update');
    Route::delete('/faqs/{id}', [FaqController::class, 'destroy'])->name('faqs.destroy');
    Route::post('/faqs/bulk-delete', [FaqController::class, 'bulkDelete'])->name('faqs.bulk-delete');
});
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/services', [ServiceController::class, 'index'])
        ->name('services.index');

    Route::get('/services/create', [ServiceController::class, 'create'])
        ->name('services.create');

    Route::post('/services', [ServiceController::class, 'store'])
        ->name('services.store');

    Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])
        ->name('services.edit');

    Route::put('/services/{id}', [ServiceController::class, 'update'])
        ->name('services.update');

    Route::delete('/services/{id}', [ServiceController::class, 'destroy'])
        ->name('services.destroy');

    Route::post('/services/bulk-delete', [ServiceController::class, 'bulkDelete'])
        ->name('services.bulk-delete');
});
//Testimonial Master
Route::prefix('admin')->name('testimonial.')->middleware('auth')->group(function () {
    Route::get('/testimonial/index', [TestimonialController::class, 'index'])->name('index');
    Route::post('/testimonial/store', [TestimonialController::class, 'create'])->name('store');
    Route::get('/testimonial/edit/{id?}', [TestimonialController::class, 'editview'])->name('edit');
    Route::post('/testimonial/update', [TestimonialController::class, 'update'])->name('update');
    Route::delete('/testimonial/delete', [TestimonialController::class, 'delete'])->name('delete');
});

Route::prefix('admin')->name('metaData.')->middleware('auth')->group(function () {
    Route::get('/seo/index', [MetaDataController::class, 'index'])->name('index');
    Route::get('seo/{id}/edit', [MetaDataController::class, 'edit'])->name('edit');
    Route::put('seo/{id}', [MetaDataController::class, 'update'])->name('update');
});

//Setting
Route::prefix('admin')->name('setting.')->middleware('auth')->group(function () {
    Route::get('/setting/index', [SettingController::class, 'index'])->name('index');
    Route::post('/setting/store', [SettingController::class, 'create'])->name('store');
    Route::get('/setting/edit/{id?}', [SettingController::class, 'editview'])->name('edit');
    Route::post('/setting/update', [SettingController::class, 'update'])->name('update');
    Route::delete('/setting/delete', [SettingController::class, 'delete'])->name('delete');
});


//Blog Master
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get(
        '/blogs',
        [BlogController::class, 'index']
    )->name('blogs.index');

    Route::get(
        '/blogs/create',
        [BlogController::class, 'create']
    )->name('blogs.create');

    Route::get(
        '/blogs/services/{category_id}',
        [BlogController::class, 'getServicesByCategory']
    )->name('blogs.services');

    Route::post(
        '/blogs',
        [BlogController::class, 'store']
    )->name('blogs.store');

    Route::get(
        '/blogs/{id}/edit',
        [BlogController::class, 'edit']
    )->name('blogs.edit');

    Route::put(
        '/blogs/{id}',
        [BlogController::class, 'update']
    )->name('blogs.update');

    Route::delete(
        '/blogs/{id}',
        [BlogController::class, 'destroy']
    )->name('blogs.destroy');

    Route::post(
        '/blogs/bulk-delete',
        [BlogController::class, 'bulkDelete']
    )->name('blogs.bulk-delete');

    Route::get(
        '/blogs/services/{category_id}',
        [BlogController::class, 'getServicesByCategory']
    )->name('blogs.services');
});

//Testimonial Master
Route::prefix('admin')->name('testimonial.')->middleware('auth')->group(function () {
    Route::get('/testimonial/index', [TestimonialController::class, 'index'])->name('index');
    Route::get('/testimonial/create', [TestimonialController::class, 'create'])->name('create');
    Route::post('/testimonial/store', [TestimonialController::class, 'store'])->name('store');
    Route::get('/testimonial/edit/{id?}', [TestimonialController::class, 'editview'])->name('edit');
    Route::post('/testimonial/update', [TestimonialController::class, 'update'])->name('update');
    Route::delete('/testimonial/delete', [TestimonialController::class, 'delete'])->name('delete');
});
