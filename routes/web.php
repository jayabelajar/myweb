<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('home', ['title' => 'Home']))->name('home');
Route::get('/projects', fn() => view('projects', ['title' => 'Projects']))->name('projects');
Route::get('/workflow', fn() => view('workflow', ['title' => 'Workflow']))->name('workflow');
Route::get('/teams', fn() => view('teams', ['title' => 'Teams']))->name('teams');
Route::get('/contact', fn() => view('contact', ['title' => 'Contact']))->name('contact');
