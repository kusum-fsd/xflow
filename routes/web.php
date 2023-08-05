<?php

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
    return view('auth/login');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(
    ['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin',  'middleware' => ['auth']],
    function () {

        Route::resource('countries', 'CountryController');
        Route::resource('branches', 'BranchController');
        Route::resource('employees', 'EmployeeController');

    }
);
Auth::routes();

// Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin',  'middleware' => ['admin_auth']], function () {

//     Route::get('dashboard', 'ProfileController@dashboard')->name('dashboard');
//     Route::resource('users', 'UserController');
//     Route::resource('customers', 'CustomerController');
//     // Route::delete('customers/{id}/delete', 'CustomerController');
// })