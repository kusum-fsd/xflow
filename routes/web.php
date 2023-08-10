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
        Route::resource('users', 'UserController');
        Route::resource('payments', 'PaymentController');
        Route::resource('customers', 'CustomerController');

        Route::post('/get-branches', 'BranchController@getBranches');

        // Route::resource('employees', EmployeeController::class);
    }
);
Auth::routes();
Route::get('/logout', [UserController::class, 'logout'])->name('logout');