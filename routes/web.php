<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('home', ['title' => 'Home']))->name('home');
Route::get('/biodata', fn() => view('biodata', ['title' => 'Biodata']))->name('biodata');
Route::get('/pendidikan', fn() => view('pendidikan', ['title' => 'Riwayat Pendidikan']))->name('pendidikan');
Route::get('/prestasi', fn() => view('prestasi', ['title' => 'Prestasi']))->name('prestasi');
