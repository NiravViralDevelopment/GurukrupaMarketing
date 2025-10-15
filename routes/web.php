<?php

use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\InquiryController;
use App\Http\Controllers\Frontend\ProjectController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InquiryController as AdminInquiryController;
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

// Brochure download routes
Route::post('/brochure/download', [InquiryController::class, 'downloadBrochure'])->name('brochure.request');
Route::get('/brochure/{projectId}/download', [InquiryController::class, 'downloadBrochureFile'])->name('brochure.download');

// Test route to verify dynamic project functionality
Route::get('/test-project', function() {
    $project = \App\Models\Project::with('images')->first();
    if ($project) {
        return response()->json([
            'project' => $project->toArray(),
            'images_count' => $project->images->count(),
            'primary_image' => $project->primaryImage() ? $project->primaryImage()->image_url : 'No primary image',
            'first_image' => $project->images->first() ? $project->images->first()->image_url : 'No images'
        ]);
    }
    return response()->json(['message' => 'No projects found']);
})->name('test.project');

// Test route to debug brochure upload
Route::post('/test-brochure-upload', function(\Illuminate\Http\Request $request) {
    \Log::info('Test brochure upload', [
        'has_file' => $request->hasFile('brochure'),
        'file' => $request->file('brochure'),
        'all_files' => $request->allFiles(),
        'all_data' => $request->all()
    ]);
    
    if ($request->hasFile('brochure')) {
        $file = $request->file('brochure');
        return response()->json([
            'success' => true,
            'file_name' => $file->getClientOriginalName(),
            'file_size' => $file->getSize(),
            'mime_type' => $file->getMimeType(),
            'is_valid' => $file->isValid()
        ]);
    }
    
    return response()->json([
        'success' => false,
        'message' => 'No brochure file received'
    ]);
});

// Test route to check project brochure
Route::get('/test-project-brochure/{id}', function($id) {
    $project = \App\Models\Project::find($id);
    if (!$project) {
        return response()->json(['error' => 'Project not found']);
    }
    
    $brochurePath = public_path('project/brochure/' . $project->brochure);
    
    return response()->json([
        'project_id' => $project->id,
        'project_title' => $project->title,
        'brochure_field' => $project->brochure,
        'brochure_path' => $brochurePath,
        'file_exists' => file_exists($brochurePath),
        'download_url' => route('brochure.download', $project->id)
    ]);
});

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
    Route::get('inquiries', [AdminInquiryController::class, 'index'])->name('admin.inquiries.index');
    Route::get('inquiries/{inquiry}', [AdminInquiryController::class, 'show'])->name('admin.inquiries.show');
    Route::patch('inquiries/{inquiry}/mark-read', [AdminInquiryController::class, 'markAsRead'])->name('admin.inquiries.mark-read');
    Route::patch('inquiries/{inquiry}/mark-replied', [AdminInquiryController::class, 'markAsReplied'])->name('admin.inquiries.mark-replied');
    Route::patch('inquiries/{inquiry}/mark-closed', [AdminInquiryController::class, 'markAsClosed'])->name('admin.inquiries.mark-closed');
    Route::delete('inquiries/{inquiry}', [AdminInquiryController::class, 'destroy'])->name('admin.inquiries.destroy');
    Route::get('inquiries-filter', [AdminInquiryController::class, 'filter'])->name('admin.inquiries.filter');
    
    // Settings
    Route::get('settings', [SettingController::class, 'index'])->name('admin.settings.index');
    Route::put('settings', [SettingController::class, 'update'])->name('admin.settings.update');
});

// Authentication Routes (Laravel Breeze)
require __DIR__.'/auth.php';
