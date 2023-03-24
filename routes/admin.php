<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Auth; 

Route::middleware('auth','user-access:Admin')->group(function () {
    Route::get('/home', function () {
        return view('admin');
    })->name('/');
});