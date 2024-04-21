<?php

use App\Http\Controllers\admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::group(["prefix"=> "admin","as"=>"admin."], function () {
    Route::resource("dashboard",adminController::class)->only('index');
});
