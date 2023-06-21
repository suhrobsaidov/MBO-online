<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'admin']], function(){
    Route::get('/dashboard',function(){
        return view('admin.dashboard');
    });

    Route::get('/role-register', [App\Http\Controllers\Admin\DashboardController::class, 'registered'])->name('role-register');
    Route::post('/role-register', [App\Http\Controllers\Admin\DashboardController::class, 'registerstore'])->name('role-register');
    Route::get('/role-edit/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'registeredit'])->name('role-edit');
    Route::put('/role-register-update/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'registerupdate'])->name('role-register-update');
    Route::delete('/role-delete/{id}' , [App\Http\Controllers\Admin\DashboardController::class, 'registerdelete'])->name('role-delete');

    Route::get('/abouts' , 'Admin\AboutusController@index');
    Route::post('/save-aboutus','Admin\AboutusController@store');
    Route::get('/about-us/{id}','Admin\AboutusController@edit');
    Route::put('/abouts/{id}', 'Admin\AboutusController@update');
    Route::delete('/abouts/{id}' , 'Admin\AboutusController@delete');

});

