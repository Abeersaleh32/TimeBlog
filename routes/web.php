<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Posts;
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

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/add', 'PostController@create')->name('create');
Route::post('/store', 'PostController@store')->name('store');
//
Route::get('/blog', 'PostController@index')->name('index');

//
Route::post('/delete/{id}', 'PostController@destroy')->name('destroy');
Route::get('/edite/{id}', 'PostController@edit')->name('edite');
Route::put('/update', 'PostController@update')->name('update');
//
Route::get('/profile/{id}', 'PostController@show')->name('show');

//
Auth::routes();
Auth::logout();
Route::get('logout', 'Auth\LoginController@logout');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route registration
Route::get('rigester', 'Auth\LoginController@index')->name('register');
Route::post('userPostRegistration', 'Auth\LoginController@userPostRegistration')->name('userPostRegistration');

//Auth::login();
Route::get('login', 'Auth\LoginController@userLoginIndex')->name('login');
Route::post('userPostLogin', 'Auth\LoginController@userPostLogin')->name('userPostLogin');
/*Route::get('/login', function () {
    return view('welcome');
});*/
//Route::get('/index', [App\Http\Controllers\PostController::class, 'index'])->name('index');
?>
