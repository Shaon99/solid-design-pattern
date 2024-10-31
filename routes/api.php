<?php

use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\PaymentController;
use Illuminate\Support\Facades\Route;

//ocp
Route::post('/pay/{type}', [PaymentController::class, 'pay']);

//LSP
Route::post('/send-notification/{type}', [NotificationController::class, 'sendNotification']);
