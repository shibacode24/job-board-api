<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\LoginController;

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

    Route::post('register', [LoginController::class, 'register']);
    Route::post('login', [LoginController::class, 'login']);

    Route::apiResource('jobs', JobController::class);
    Route::get('search', [JobController::class, 'search']);
    Route::post('apply', [ApplicationController::class, 'apply']);
    Route::put('update_application/{id}', [ApplicationController::class, 'update_application']);
    Route::get('showUserJobs', [ApplicationController::class, 'showUserJobs']);
    Route::get('index', [ApplicationController::class, 'index']);
    Route::get('get_applied_job_against_jobid', [ApplicationController::class, 'get_applied_job_against_jobid']);





