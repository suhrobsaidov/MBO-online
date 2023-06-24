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

    //for users
    Route::get('/user-register', [App\Http\Controllers\Admin\DashboardController::class, 'registered'])->name('user-register');
    Route::post('/user-register', [App\Http\Controllers\Admin\DashboardController::class, 'registerstore'])->name('user-register');
    Route::get('/user-edit/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'registeredit'])->name('user-edit');
    Route::put('/user-register-update/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'registerupdate'])->name('user-register-update');
    Route::delete('/user-delete/{id}' , [App\Http\Controllers\Admin\DashboardController::class, 'registerdelete'])->name('user-delete');
    //for notes
    Route::get('/abouts' , [App\Http\Controllers\Admin\AboutusController::class, 'index'])->name('abouts');
    Route::post('/save-aboutus', [App\Http\Controllers\Admin\AboutusController::class, 'store'])->name('save-abouts');
    Route::get('/about-us/{id}', [App\Http\Controllers\Admin\AboutusController::class, 'edit'])->name('about-us');
    Route::put('/abouts/{id}',  [App\Http\Controllers\Admin\AboutusController::class, 'update'])->name('abouts');
    Route::delete('/abouts/{id}' ,  [App\Http\Controllers\Admin\AboutusController::class, 'delete'])->name('abouts');
    //payments
    Route::get('payments' ,[\App\Http\Controllers\PaymentsController::class , 'index']);
    Route::post('create-payment' ,[\App\Http\Controllers\PaymentsController::class , 'store']);
    //teachers
    Route::get('teachers' ,[\App\Http\Controllers\TeachersController::class , 'index']);



});

