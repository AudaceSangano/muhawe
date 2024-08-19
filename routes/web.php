<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [AuthController::class, 'login'])->name('login.form');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.op');

Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/register-agent', [AdminController::class, 'registerAgent'])->name('new.agent');
Route::post('/register-householder-op', [AdminController::class, 'registerHouseholderOp'])->name('new.householder.op');
Route::get('/register-householder', [AdminController::class, 'registerHouseholder'])->name('new.householder');
Route::get('/users-agent', [AdminController::class, 'agentList'])->name('user.list.agent');
Route::get('/users-houserholder', [AdminController::class, 'householderList'])->name('user.list.householder');
Route::get('/userList/{type}', [AdminController::class, 'users'])->name('user.list');
Route::post('/register-property', [AdminController::class, 'registerProperty'])->name('new.property');
Route::get('/propertiesList', [AdminController::class, 'properties'])->name('property.list');
Route::get('/propertiesAction', [AdminController::class, 'propertiesAction'])->name('action.property.list');
Route::get('/setting', [AdminController::class, 'setting'])->name('setting');
Route::get('/edit-form/{id}', [AdminController::class, 'editPropertyForm'])->name('edit.property.form');
Route::post('/update-property-op', [AdminController::class, 'updatePropertyOp'])->name('update.property');
Route::get('/delete-property/{id}', [AdminController::class, 'deletePropertyOp'])->name('delete.property');
Route::get('/confirm-property/{id}', [AdminController::class, 'confirmPropertyOp'])->name('confirm.property.price');
Route::get('/reject-property/{id}', [AdminController::class, 'rejectPropertyOp'])->name('reject.property.price');
Route::get('/appeal-property/{id}', [AdminController::class, 'appealPropertyOp'])->name('appeal.property.price');
Route::post('/update-cost', [AdminController::class, 'updatePropertyCost'])->name('inflation.new');
Route::post('/update-user', [AuthController::class, 'updateUser'])->name('update.user.information');
Route::post('/update-password', [AuthController::class, 'updatePassword'])->name('update.user.password');

