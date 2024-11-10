<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MilkDeliveryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerLoginController;


Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
Route::get('/customers/{customer}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
Route::put('/customers/{customer}', [CustomerController::class, 'update'])->name('customers.update');
Route::delete('/customers/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');
Route::get('/customers/{customer}/deliveries', [MilkDeliveryController::class, 'index'])->name('deliveries.index');
Route::get('/customers/{customer}/deliveries/create', [MilkDeliveryController::class, 'create'])->name('deliveries.create');
Route::post('/customers/{customer}/deliveries', [MilkDeliveryController::class, 'store'])->name('deliveries.store');


Route::get('/', function () {
    return view('landing');
})->name('landing');

// Admin login routes
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Route to view customers index, restricted to admin
Route::get('/customers', [AdminController::class, 'viewCustomers'])->name('customers.index');


//Logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); // Redirect to the landing page after logout
})->name('logout');


//Customer
// Customer login routes
Route::get('/customer/login', [CustomerLoginController::class, 'showLoginForm'])->name('customer.login');
Route::post('/customer/login', [CustomerLoginController::class, 'login'])->name('customer.login.submit');

// Route for customer deliveries without middleware
Route::get('/customer/deliveries', [CustomerController::class, 'viewDeliveries'])->name('customer.deliveries');



