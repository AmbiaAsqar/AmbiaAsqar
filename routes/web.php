<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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

Route::get('/', [PageController::class, 'index']);
Route::get('/category/{id}', [PageController::class, 'category']);
Route::get('/post/{id}', [PageController::class, 'detailPost']);
Route::get('/getsimilartopic/{id}', [PageController::class, 'getSimilarTopic']);
Route::get('/browsepage', [PageController::class, 'getBrowsePage'])->name('browsepage');
Route::post('/postuserview', [PageController::class, 'userView']);
// Route::get('/dummy', function() {
//     return view('post.adorable_detailPost');
// });

Route::prefix('topup')->group(function() {
    Route::get('toweroffantasy', [TopupController::class, 'tofSuccessHandle']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
