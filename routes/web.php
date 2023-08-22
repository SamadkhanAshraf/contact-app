<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CompanyController;

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
    return view('layouts.main');
});
Route::get('contacts/all-contacts',[ContactController::class, 'index'])->name('contacts.index');
Route::get('contacts/create-new-contacts',[ContactController::class, 'create'])->name('contacts.create');
Route::post('contacts/store-new-contact',[ContactController::class, 'store'])->name('contacts.store');
Route::get('contacts/{contacts} /edit-contact',[ContactController::class, 'edit'])->name('contacts.edit');
Route::put('contacts/{contacts}',[ContactController::class, 'update'])->name('contacts.update');
Route::get('contacts/show-contacts/{contacts}',[ContactController::class, 'show'])->name('contacts.show');
// Route::delete('contacts/delete-contacts/{contacts}',[ContactController::class, 'destroy'])->name('contacts.destroy');
// Route::resource('/contacts', ContactController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/company', CompanyController::class);

