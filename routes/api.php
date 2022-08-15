<?php

use App\Http\Controllers\admin\AppointmentsController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Auth
Route::group([
    'middleware' => 'api',
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);    
});
//Department
Route::get('/departments',[DepartmentController::class,'index']);
//Appointments
Route::get('/appointments/{dept_name}',[AppointmentController::class,'index']);


//Admin Appointment routes
Route::get('/admin/appointments',[AppointmentsController::class,'index']);
Route::get('/admin/appointments/{id}',[AppointmentsController::class,'show']);
Route::post('/admin/appointments',[AppointmentsController::class,'store']);
Route::put('/admin/appointments/{id}',[AppointmentsController::class,'update']);
Route::delete('/admin/appointments/{id}',[AppointmentsController::class,'destroy']);