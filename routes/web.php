<?php
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CastController;
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
    return redirect('/movies');
});

Auth::routes();

Route::group([],function (){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
}
);


Route::resource('movies','MovieController');
Route::resource('casts','CastController');
Route::resource('movies.comments','CommentController')->shallow();

// Route::post('/movies/{movie:id}/cast_store',[MovieController::class]);
// Route::delete('/movies/{movie:id}/casts/{cast:id}',[MovieController::class]);

Route::post('/movies/{movie:id}/cast_store',[MovieController::class,'movie_cast_store'])->name('movie_cast_store');
Route::delete('/movies/{movie:id}/casts/{cast:id}',[MovieController::class,'movie_cast_destroy'])->name('movie_cast_destroy');
