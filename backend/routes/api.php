<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
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
//get all employee
Route::get('employees', [EmployeeController::class, 'getEmployee']);
// get specic employee detail
Route::get('employees/{id}',[EmployeeController::class, 'getEMployeeById']);
//add employee
Route::post('addEmployee',[EmployeeController::class, 'addEmployee']);
//update employee
Route::put('updateEmployee/{id}',[EmployeeController::class, 'updateEmployee']);
//delete employee
Route::delete('deleteEmployee/{id}',[EmployeeController::class, 'deleteEmployee']);
