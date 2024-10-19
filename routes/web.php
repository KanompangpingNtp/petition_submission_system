<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersformController;
use App\Http\Controllers\IistcomplaintController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminAuthController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//login-register user
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login_post', [AuthController::class, 'login'])->name('login_post');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

//login-register admin
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'loginAmin']);
Route::post('/admin/logout', [AdminAuthController::class, 'logoutAmin'])->name('logoutAmin');

//user no login
Route::get('/', [UsersformController::class, 'index'])->name('usersform.index');
Route::post('/usersform', [UsersformController::class, 'Formcreate'])->name('Formcreate');

Route::middleware(['auth'])->group(function () {
    //user login
    Route::get('/dashboardUser', [UsersformController::class, 'dashboardUser'])->name('dashboardUser');
    Route::get('/users/complaints', [IistcomplaintController::class, 'Iistcomplaintaccount'])->name('Iistcomplaintaccount');
    Route::get('/users/complaints/{id}', [IistcomplaintController::class, 'Iistcomplaintaccountshow'])->name('Iistcomplaintaccountshow');
});

Route::middleware(['admin'])->group(function () {
    //admincomplaints
    Route::get('/admin/complaints', [IistcomplaintController::class, 'Iistcomplaintindex'])->name('Iistcomplaintindex');
    Route::get('/admin/complaints/{id}', [IistcomplaintController::class, 'complaintshow'])->name('complaintshow');
    Route::put('/complaint/{id}/status', [IistcomplaintController::class, 'updateStatus'])->name('complaint.updateStatus');
});
