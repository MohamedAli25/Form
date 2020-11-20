<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\AvailableNumberController;
use App\Http\Controllers\CommitteeController;
use App\Http\Controllers\TimeSlotController;
use App\Http\Controllers\WorkshopController;
use App\Models\TimeSlot;
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

Route::get('/', function () {
    return redirect("/registration-form");
});

Route::get('/registration-form', [ApplicantController::class, 'create']);
Route::post('/applicants', [ApplicantController::class, 'store']);
Route::get('/submitted-successfully', function () {
    return view("applicants.submitted");
});

Route::get('/277640/applicants/brief', [ApplicantController::class, 'indexBrief']);
Route::resource('/277640/applicants', ApplicantController::class);


Route::get('/277640/available-numbers/createAll', [AvailableNumberController::class, 'createAll']);
Route::post('/277640/available-numbers/storeAll', [AvailableNumberController::class, 'storeAll']);
Route::resource('/277640/available-numbers', AvailableNumberController::class);
Route::get('/277640/available-numbers/editAll/{committee}', [AvailableNumberController::class, 'editAll']);
Route::patch('/277640/available-numbers/updateAll/{committee}', [AvailableNumberController::class, 'updateAll']);

Route::get('/277640/committees/createAll', [CommitteeController::class, 'createAll']);
Route::post('/277640/committees/storeAll', [CommitteeController::class, 'storeAll']);
Route::resource('/277640/committees', CommitteeController::class);

Route::get('/277640/workshops/createAll', [WorkshopController::class, 'createAll']);
Route::post('/277640/workshops/storeAll', [WorkshopController::class, 'storeAll']);
Route::resource('/277640/workshops', WorkshopController::class);

Route::get('/277640/time-slots/createAll', [TimeSlotController::class, 'createAll']);
Route::post('/277640/time-slots/storeAll', [TimeSlotController::class, 'storeAll']);
Route::resource('/277640/time-slots', TimeSlotController::class);
