<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; 
use app\Http\Controllers\pharmacyController;

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
Route::get('/myprofile', [App\Http\Controllers\pharmacyController::class, 'myprofile'])->name('myprofile');

Route::get('/prescriptionForm', [App\Http\Controllers\pharmacyController::class, 'prescriptionForm'])->name('prescriptionForm');

Route::post('addPrescription', [App\Http\Controllers\pharmacyController::class, 'addPrescription'])->name('addPrescription');

Route::get('/quatationDetails', [App\Http\Controllers\pharmacyController::class, 'quatationDetails'])->name('quatationDetails');

Route::get('/viewQuatation/{id}', [App\Http\Controllers\pharmacyController::class, 'viewQuatation'])->name('viewQuatation');

Route::get('/acceptQuatation/{id}', [App\Http\Controllers\pharmacyController::class, 'acceptQuatation'])->name('acceptQuatation');

Route::get('/rejectQuatation/{id}', [App\Http\Controllers\pharmacyController::class, 'rejectQuatation'])->name('rejectQuatation');


// Admin Route
Route::get('/adminUsers', [App\Http\Controllers\pharmacyController::class, 'adminUsers'])->name('adminUsers');
Route::delete('/deleteUser/{id}', [App\Http\Controllers\pharmacyController::class, 'deleteUser'])->name('deleteUser');
Route::get('/adminPresDetails', [App\Http\Controllers\pharmacyController::class, 'adminPresDetails'])->name('adminPresDetails');

Route::get('/addQuantity', function () {
    return view('addQuantity');
});
//ss
Route::get('/addQuantity', [App\Http\Controllers\pharmacyController::class, 'addQuantity'])->name('addQuantity');

Route::post('addDrugs', [App\Http\Controllers\pharmacyController::class, 'addDrugs'])->name('addDrugs');

Route::get('/adminquatationForm/{id}', [App\Http\Controllers\pharmacyController::class, 'adminquatationForm'])->name('adminquatationForm');

Route::post('adminquatationForm', [App\Http\Controllers\pharmacyController::class, 'addquatation'])->name('adminquatationForm');

Route::get('/sendQuatation/{id}', [App\Http\Controllers\pharmacyController::class, 'sendQuatation'])->name('sendQuatation');

// Auth Route
Auth::routes();

Route::get('/home', [App\Http\Controllers\pharmacyController::class, 'index'])->name('home');
