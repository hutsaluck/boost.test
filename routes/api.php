<?php

use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\ReportController;
use Illuminate\Support\Facades\Route;

Route::apiResource('countries', CountryController::class);
Route::apiResource('companies', CompanyController::class);
Route::post('generate-data', [ReportController::class, 'generateData']);
Route::get('report', [ReportController::class, 'generateReport']);

