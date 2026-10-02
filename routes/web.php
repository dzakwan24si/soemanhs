<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FacilityController;

Route::get('/', function () {
    return Inertia::render('Home', [
        'seo' => [
            'title' => 'Beranda',
            'description' => 'Website resmi SMA IT Soeman HS Pekanbaru.',
        ],
    ]);
});


