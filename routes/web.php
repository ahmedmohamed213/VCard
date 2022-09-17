<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Routing\RouteRegistrar;
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

// Route::get('/profile/create', function () {
//     return view('profile.create');
// });


Route::get('/', [AuthController::class, "login"]);






//////////////    Admin routes  //////////////
Route::group(['perfix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/showUserProfile/{id}', [AdminController::class, 'show_user_profile'])->name('admin.show_user_profile');
    Route::get('/showAllUsers', [AdminController::class, 'show_all_users'])->name('admin.show_all_users');
});

////////////////   register  routes   ////////////

Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('registerRequest', [AuthController::class, 'registerRequest'])->name('register.request');

////////////////   login  routes   ////////////
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('loginRequest', [AuthController::class, 'loginRequest'])->name('login.request');


////////////// logout
Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');



//////////////    profile routes  //////////////

Route::get('profile/create', [ProfileController::class, 'create'])->name('profile.create')->middleware('auth');
Route::post('/profile/store', [ProfileController::class, 'store'])->name('profile.store')->middleware('auth');
Route::get('/profile/index/{profile:profile_name}', [ProfileController::class, 'index'])->name('profile.index');
Route::get('profile/indexView', [ProfileController::class, 'indexView'])->name('profile.indexView')->middleware('auth');
Route::get('/profile/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');
Route::delete('/profile/delete', [ProfileController::class, 'delete'])->name('profile.delete')->middleware('auth');
