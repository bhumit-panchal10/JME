<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FrontController;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/clear-cache', function () {

    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
});

Route::post('/ContactUs_inquiry', [FrontController::class, 'ContactUs_inquiry']);
Route::post('/Package_Test_inquiry', [FrontController::class, 'Package_Test_inquiry']);

Route::post('/blogs', [FrontController::class, 'blogs'])->name('blogs');
Route::post('/blog/details', [FrontController::class, 'blog_details'])->name('blog_details');
Route::post('/faqlist', [FrontController::class, 'faqlist'])->name('faqlist');
Route::post('/popular/Testlist', [FrontController::class, 'testlist'])->name('testlist');
Route::post('/package/list', [FrontController::class, 'packagelist'])->name('packagelist');
Route::post('/Right/Health/package/list', [FrontController::class, 'RightHealthpackagelist'])->name('RightHealthpackagelist');
Route::post('/package/Test/list', [FrontController::class, 'packageTestlist'])->name('packageTestlist');
Route::post('/Newseventlist', [FrontController::class, 'Newseventlist'])->name('Newseventlist');

Route::post('/package-detail', [FrontController::class, 'packageDetail']);
Route::post('/cmslist', [FrontController::class, 'cmslist']);

Route::post('/search-packages', [FrontController::class, 'searchPackages']);
Route::post('/search', [FrontController::class, 'search']);

Route::post('/testimoniallist', [FrontController::class, 'testimoniallist'])->name('testimoniallist');
