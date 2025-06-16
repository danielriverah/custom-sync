<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GitFtpController;

Route::get('/git-ftp', [GitFtpController::class, 'index']);
