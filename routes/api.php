<?php

use App\Http\Controllers\Api\CousineController;
use App\Http\Controllers\Api\LeadController;
use App\Http\Controllers\Api\RestaurantController;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PaymentController;
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

Route::get('restaurants', [RestaurantController::class, 'index']);
Route::get('restaurant/{restaurant:slug}', [RestaurantController::class, 'show']);
Route::get('restaurants/{searchTerm}', [RestaurantController::class, 'filter']);


Route::get('cousines', [CousineController::class, 'index']);
// Route::get('cousines/{searchCousine}', [CousineController::class, 'filterByCousine']);
Route::get('cousines/{multipleSearch}', [CousineController::class, 'filterByMultipleCousine']);

Route::get('payments/token', [PaymentController::class, 'generateToken']);
Route::post('payments/checkout', [PaymentController::class, 'makePayment']);


Route::post('/contacts', [LeadController::class, 'store']);

