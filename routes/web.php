<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchaseDetailController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UniteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WerhouseController;
use App\Mail\StockLowMail;
use App\Models\Product;
use App\Models\PurchaseDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
    if (Auth::check()) return redirect('/dashboard');
    return redirect('/login') ;
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard'); 

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [DashboardController::class ,'index'])->middleware(['auth', 'verified'])->name('dashboard');
    

    // Our resource routes
    Route::resource('roles', RoleController::class);
    
    Route::resource('users', UserController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('suppliers', SupplierController::class);
    Route::get('users/{user}/change_roles_permissions', [UserController::class, 'showChangeRolesPermissions'])->name('users.change_roles_permissions');
    Route::post('users/{user}/update_roles_permissions', [UserController::class, 'updateRolesPermissions'])->name('users.update_roles_permissions');

    Route::resource('categories', CategorieController::class);
    Route::resource('products', ProductController::class);
    Route::resource('purchases', PurchaseController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('werhouses', WerhouseController::class);
    Route::resource('unites', UniteController::class);
    
    // Route::post('products/{id}/notificationAsRead', [ProductController::class, 'markAsRead'])->name('products.markAsRead');
    
});

require __DIR__.'/auth.php';

// Auth::routes();



// Test Send Email

// Route::get('/test-email', function () {
//     $product = Product::first(); 
//     $user = Auth::user(); 

//     if ($user) {
//         Mail::to($user->email)->send(new StockLowMail($product));
//         return 'Email sent to ' . $user->email;
//     }
//     return 'No authenticated user';
// });