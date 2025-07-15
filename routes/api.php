<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\VideogameController;

Route::get('videogames', [VideogameController::class, 'index']);

Route::get('videogames/{id}', [VideogameController::class, 'show']);
