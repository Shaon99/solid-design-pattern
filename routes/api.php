<?php

use App\Http\Controllers\Api\PaymentController;
use Illuminate\Support\Facades\Route;

Route::post('/pay/{type}', [PaymentController::class, 'pay']);
