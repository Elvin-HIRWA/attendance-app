<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/register', [UsersController::class, 'register']);
Route::post('/login', [UsersController::class, 'login']);
Route::get('/employee/{id}',[EmployeeController::class, 'show']);

Route::post('/employee',[EmployeeController::class, 'store']);
Route::get('/employee/search/{name}',[EmployeeController::class, 'search']);
Route::put('/employee/{id}',[EmployeeController::class, 'update']);
Route::delete('/employee/{id}',[EmployeeController::class, 'destroy']);


Route::post('attendance/check-in', [AttendanceController::class, 'checkIn']);
Route::post('attendance/check-out', [AttendanceController::class, 'checkOut']);
//protected Routes

// Route::group(['middleware' => ['auth:sanctum']], function () {
  
    Route::get('/employee', [EmployeeController::class, 'index']);







Route::post('/logout', [UsersController::class, 'logout']);

// });
