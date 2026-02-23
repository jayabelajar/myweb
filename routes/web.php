<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BlogTagController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\TeamController as AdminTeamController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\BlogCategoryController as AdminBlogCategoryController;
use App\Http\Controllers\Admin\BlogTagController as AdminBlogTagController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\HomepageSectionController as AdminHomepageSectionController;
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/teams', [TeamController::class, 'index'])->name('teams');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/category/{slug}', [BlogCategoryController::class, 'show'])->name('blog.category');
Route::get('/blog/tag/{slug}', [BlogTagController::class, 'show'])->name('blog.tag');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/contact', fn() => view('contact', ['title' => 'Contact']))->name('contact');

Route::get('/admin/login', fn() => view('admin.login', ['title' => 'Admin Login']))->name('admin.login');
Route::post('/admin/login', function () {
    $credentials = request()->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        request()->session()->regenerate();
        return redirect()->route('admin.index');
    }

    return back()->with('error', 'Email atau password salah.');
})->name('admin.login.submit');

Route::post('/admin/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('admin.login');
})->name('admin.logout');

Route::get('/admin', [AdminController::class, 'index'])->middleware('auth')->name('admin.index');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('profile', [AdminProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [AdminProfileController::class, 'update'])->name('profile.update');
    Route::resource('projects', AdminProjectController::class)->except(['show']);
    Route::resource('services', AdminServiceController::class)->except(['show']);
    Route::resource('teams', AdminTeamController::class)->except(['show']);
    Route::resource('testimonials', AdminTestimonialController::class)->except(['show']);
    Route::resource('homepage-sections', AdminHomepageSectionController::class)->except(['show']);
    Route::resource('blog', AdminBlogController::class)->except(['show']);
    Route::resource('blog/categories', AdminBlogCategoryController::class)
        ->names('blog.categories')
        ->except(['show']);
    Route::resource('blog/tags', AdminBlogTagController::class)
        ->names('blog.tags')
        ->except(['show']);
    Route::resource('contact', AdminContactController::class)->except(['show']);
});
