<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FineController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\MainController;

// Route to the main page
Route::get('/main', [MainController::class, 'index']);

// Resource routes
Route::resource('members', MemberController::class);
Route::resource('reservations', ReservationController::class);
Route::resource('books', BookController::class);
route::resource('categories', CategoryController::class);
Route::resource('fines', FineController::class);
Route::resource('issues', IssueController::class);
