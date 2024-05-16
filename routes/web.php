<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; 
use app\Http\Controllers\HomeController;

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
    return view('auth.login');
});

// User Route
Route::get('/myprofile', [App\Http\Controllers\HomeController::class, 'myprofile'])->name('myprofile');

Route::get('/prescriptionForm', [App\Http\Controllers\HomeController::class, 'prescriptionForm'])->name('prescriptionForm');

Route::post('addPrescription', [App\Http\Controllers\HomeController::class, 'addPrescription'])->name('addPrescription');

Route::get('/quatationDetails', [App\Http\Controllers\HomeController::class, 'quatationDetails'])->name('quatationDetails');

Route::get('/viewQuatation/{id}', [App\Http\Controllers\HomeController::class, 'viewQuatation'])->name('viewQuatation');

Route::get('/acceptQuatation/{id}', [App\Http\Controllers\HomeController::class, 'acceptQuatation'])->name('acceptQuatation');

Route::get('/rejectQuatation/{id}', [App\Http\Controllers\HomeController::class, 'rejectQuatation'])->name('rejectQuatation');


// Admin Route
Route::get('/adminUsers', [App\Http\Controllers\HomeController::class, 'adminUsers'])->name('adminUsers');
Route::delete('/deleteUser/{id}', [App\Http\Controllers\HomeController::class, 'deleteUser'])->name('deleteUser');
Route::get('/adminPresDetails', [App\Http\Controllers\HomeController::class, 'adminPresDetails'])->name('adminPresDetails');

Route::get('/addQuantity', function () {
    return view('addQuantity');
});

Route::get('/addQuantity', [App\Http\Controllers\HomeController::class, 'addQuantity'])->name('addQuantity');

Route::post('addDrugs', [App\Http\Controllers\HomeController::class, 'addDrugs'])->name('addDrugs');

Route::get('/adminquatationForm/{id}', [App\Http\Controllers\HomeController::class, 'adminquatationForm'])->name('adminquatationForm');

Route::post('adminquatationForm', [App\Http\Controllers\HomeController::class, 'addquatation'])->name('adminquatationForm');

Route::get('/sendQuatation/{id}', [App\Http\Controllers\HomeController::class, 'sendQuatation'])->name('sendQuatation');

// Auth Route
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
