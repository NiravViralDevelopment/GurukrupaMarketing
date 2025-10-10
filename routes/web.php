<?php

use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProjectController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blogs.show');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Admin Routes
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    // Projects
    Route::get('projects', [AdminProjectController::class, 'index'])->name('admin.projects.index');
    Route::get('projects/create', [AdminProjectController::class, 'create'])->name('admin.projects.create');
    Route::post('projects', [AdminProjectController::class, 'store'])->name('admin.projects.store');
    Route::get('projects/{project}', [AdminProjectController::class, 'show'])->name('admin.projects.show');
    Route::get('projects/{project}/edit', [AdminProjectController::class, 'edit'])->name('admin.projects.edit');
    Route::put('projects/{project}', [AdminProjectController::class, 'update'])->name('admin.projects.update');
    Route::delete('projects/{project}', [AdminProjectController::class, 'destroy'])->name('admin.projects.destroy');
    Route::delete('project-images/{image}', [AdminProjectController::class, 'deleteImage'])->name('admin.project-images.destroy');
    
    // Blogs
    Route::get('blogs', [AdminBlogController::class, 'index'])->name('admin.blogs.index');
    Route::get('blogs/create', [AdminBlogController::class, 'create'])->name('admin.blogs.create');
    Route::post('blogs', [AdminBlogController::class, 'store'])->name('admin.blogs.store');
    Route::get('blogs/{blog}', [AdminBlogController::class, 'show'])->name('admin.blogs.show');
    Route::get('blogs/{blog}/edit', [AdminBlogController::class, 'edit'])->name('admin.blogs.edit');
    Route::put('blogs/{blog}', [AdminBlogController::class, 'update'])->name('admin.blogs.update');
    Route::delete('blogs/{blog}', [AdminBlogController::class, 'destroy'])->name('admin.blogs.destroy');
    
    // Banners
    Route::get('banners', [BannerController::class, 'index'])->name('admin.banners.index');
    Route::get('banners/create', [BannerController::class, 'create'])->name('admin.banners.create');
    Route::post('banners', [BannerController::class, 'store'])->name('admin.banners.store');
    Route::get('banners/{banner}', [BannerController::class, 'show'])->name('admin.banners.show');
    Route::get('banners/{banner}/edit', [BannerController::class, 'edit'])->name('admin.banners.edit');
    Route::put('banners/{banner}', [BannerController::class, 'update'])->name('admin.banners.update');
    Route::delete('banners/{banner}', [BannerController::class, 'destroy'])->name('admin.banners.destroy');
    
    // Inquiries
    Route::get('inquiries', [InquiryController::class, 'index'])->name('admin.inquiries.index');
    Route::get('inquiries/{inquiry}', [InquiryController::class, 'show'])->name('admin.inquiries.show');
    Route::patch('inquiries/{inquiry}/mark-read', [InquiryController::class, 'markAsRead'])->name('admin.inquiries.mark-read');
    Route::patch('inquiries/{inquiry}/mark-replied', [InquiryController::class, 'markAsReplied'])->name('admin.inquiries.mark-replied');
    Route::patch('inquiries/{inquiry}/mark-closed', [InquiryController::class, 'markAsClosed'])->name('admin.inquiries.mark-closed');
    Route::delete('inquiries/{inquiry}', [InquiryController::class, 'destroy'])->name('admin.inquiries.destroy');
    Route::get('inquiries-filter', [InquiryController::class, 'filter'])->name('admin.inquiries.filter');
    
    // Settings
    Route::get('settings', [SettingController::class, 'index'])->name('admin.settings.index');
    Route::put('settings', [SettingController::class, 'update'])->name('admin.settings.update');
});

// Authentication Routes (Laravel Breeze)
require __DIR__.'/auth.php';
