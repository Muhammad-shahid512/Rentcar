<?php

use App\Http\Controllers\admin\CarCrudMgmt;
use App\Http\Controllers\admin\CategoryCrudMgmt;
use App\Http\Controllers\admin\FeaturesCrudMgmt;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});Route::get('/view', function () {
    return view('frontend.dashboard.data');
});
Route::get('/dashboard', function () {
    return view('frontend.dashboard.pannel');
});




Route::get('category', [ CategoryCrudMgmt::class, 'index' ])->name('category.index');
Route::post('post/data', [ CategoryCrudMgmt::class, 'postcategory' ])->name('category.storex');
Route::get('get/data', [ CategoryCrudMgmt::class, 'getcategory' ])->name('category.getcategory');

Route::delete('/category/{id}', [CategoryCrudMgmt::class, 'destroy'])->name('category.destroy');
Route::get('/category/update/{id}', [CategoryCrudMgmt::class, 'updatecate'])->name('category.update');
Route::post('cate/data/update', [ CategoryCrudMgmt::class, 'updatecategorydata' ])->name('category.updatecategorydata');





// 
Route::get('features', [ FeaturesCrudMgmt::class, 'index' ])->name('features.index');
Route::post('post/features', [ FeaturesCrudMgmt::class, 'postfeatured' ])->name('features.post');
Route::get('get/features', [ FeaturesCrudMgmt::class, 'getfeatures' ])->name('features.get');
Route::delete('/featured/{id}', [FeaturesCrudMgmt::class, 'destroyfeatured'])->name('features.destroy');
Route::get('/featured/update/{id}', [FeaturesCrudMgmt::class, 'updatefeatured'])->name('features.update');
Route::post('featured/data/update', [ FeaturesCrudMgmt::class, 'updateFeaturesdata' ])->name('features.updatefeatured');




Route::get('cars', [ CarCrudMgmt::class, 'index' ])->name('car.index');
Route::get('car/add', [ CarCrudMgmt::class, 'showform' ])->name('car.add');
Route::get('category/card', [ CarCrudMgmt::class, 'carcategory' ])->name('car.carcategory');
Route::post('xyz/abc', [ CarCrudMgmt::class, 'store' ])->name('car.stores');
Route::get('view/{id}', [ CarCrudMgmt::class, 'viewsingle' ])->name('car.view');
Route::get('toggle/{id}', [ CarCrudMgmt::class, 'toggle' ])->name('car.toggle');

Route::get('/cls', function () {
    $output = '';
    $output .= Artisan::call('config:clear');
    $output .= Artisan::call('route:clear');
    $output .= Artisan::call('cache:clear');
    $output .= Artisan::call('view:clear');

    return nl2br("Caches cleared!");
});
