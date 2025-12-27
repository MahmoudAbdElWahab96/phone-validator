<?php

use App\Http\Controllers\PhoneNumberController;
use Illuminate\Support\Facades\Route;

Route::get('/', PhoneNumberController::class)->name('phone-numbers.index');
