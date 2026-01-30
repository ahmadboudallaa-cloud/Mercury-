<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\GroupController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('contacts.index');
});

Route::resource('groups', GroupController::class)->except(['show']);

Route::resource('contacts', ContactController::class)->except(['show']);