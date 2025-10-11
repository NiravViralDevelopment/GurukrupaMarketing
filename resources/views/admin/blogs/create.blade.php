@extends('layouts.admin')

@section('title', 'Create Blog Post')
@section('page-title', 'Create New Blog Post')

@section('content')
<div class="container-fluid">
    <!-- Hero Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-lg" style="background: linear-gradient(135deg, #D4AF37 0%, #B8941F 100%);">
                <div class="card-body p-5 text-white position-relative overflow-hidden">
                    <div class="position-absolute top-0 end-0 w-25 h-25 bg-white opacity-10 rounded-circle" style="transform: translate(50%, -50%);"></div>
                    <div class="position-absolute bottom-0 start-0 w-20 h-20 bg-white opacity-10 rounded-circle" style="transform: translate(-50%, 50%);"></div>
                    
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <h1 class="display-6 fw-bold mb-3">Create New Blog Post</h1>
                            <p class="lead mb-0">Share your thoughts and insights with the world through engaging blog content</p>
                        </div>
                        <div class="col-lg-4 text-lg-end">
                            <div class="d-flex flex-column align-items-lg-end gap-3">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fas fa-clock fa-sm"></i>
                                    <span class="small">Draft Auto-save</span>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fas fa-eye fa-sm"></i>
                                    <span class="small">SEO Preview</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Progress Bar -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="fw-semibold text-muted">Form Progress</span>
                        <span class="badge bg-primary" id="progressPercentage">0%</span>
                    </div>
                    <div class="progress" style="height: 8px;">
                        <div class="progress-bar bg-gradient" role="progressbar" style="width: 0%; background: linear-gradient(135deg, #D4AF37 0%, #B8941F 100%);" id="progressBar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data" id="blogForm">
    @csrf
    
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                <!-- Basic Information -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-0 py-3">
                        <div class="d-flex align-items-center">
                            <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                <i class="fas fa-edit text-primary"></i>
                            </div>
            <div>
                                <h5 class="mb-0 fw-bold">Basic Information</h5>
                                <small class="text-muted">Essential details for your blog post</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-12 mb-4">
                                <label for="title" class="form-label fw-semibold">
                                    Blog Title <span class="text-danger">*</span>
                                </label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" required
                                    class="form-control form-control-lg @error('title') is-invalid @enderror"
                                    placeholder="Enter an engaging title for your blog post"
                                    onkeyup="updateProgress()">
                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                                <div class="form-text">
                                    <i class="fas fa-lightbulb text-warning me-1"></i>
                                    <span id="titleCount">0</span>/100 characters. Keep it engaging and SEO-friendly!
                                </div>
            </div>
            
                            <div class="col-12 mb-4">
                                <label for="excerpt" class="form-label fw-semibold">Excerpt</label>
                <textarea name="excerpt" id="excerpt" rows="3"
                                    class="form-control @error('excerpt') is-invalid @enderror"
                                    placeholder="Write a brief summary of your blog post..."
                                    onkeyup="updateProgress()">{{ old('excerpt') }}</textarea>
                @error('excerpt')
                                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                                <div class="form-text">
                                    <i class="fas fa-info-circle text-info me-1"></i>
                                    <span id="excerptCount">0</span>/200 characters. This will appear in search results and social media previews.
                                </div>
            </div>
            
                            <div class="col-12">
                                <label for="content" class="form-label fw-semibold">
                                    Content <span class="text-danger">*</span>
                                </label>
                                <textarea name="content" id="content" rows="12" required
                                    class="form-control @error('content') is-invalid @enderror"
                                    placeholder="Write your blog post content here..."
                                    onkeyup="updateProgress()">{{ old('content') }}</textarea>
                @error('content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                                <div class="form-text">
                                    <i class="fas fa-keyboard text-success me-1"></i>
                                    <span id="contentCount">0</span> words. Use clear, engaging language to connect with your readers.
                                </div>
                            </div>
            </div>
        </div>
    </div>
    
                <!-- Featured Image -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-0 py-3">
                        <div class="d-flex align-items-center">
                            <div class="bg-success bg-opacity-10 rounded-circle p-2 me-3">
                                <i class="fas fa-image text-success"></i>
                            </div>
        <div>
                                <h5 class="mb-0 fw-bold">Featured Image</h5>
                                <small class="text-muted">Upload a compelling image for your blog post</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-12">
                                <label for="featured_image" class="form-label fw-semibold">Featured Image</label>
                                <div class="upload-area border-2 border-dashed border-primary border-opacity-25 rounded-3 p-5 text-center position-relative" 
                                     id="uploadArea" 
                                     ondrop="handleDrop(event)" 
                                     ondragover="handleDragOver(event)" 
                                     ondragleave="handleDragLeave(event)">
                                    <div id="uploadContent">
                                        <i class="fas fa-cloud-upload-alt fa-3x text-primary mb-3"></i>
                                        <h6 class="fw-bold text-dark">Drag & Drop Image Here</h6>
                                        <p class="text-muted mb-3">or click to browse files</p>
                                        <button type="button" class="btn btn-outline-primary" onclick="document.getElementById('featured_image').click()">
                                            <i class="fas fa-folder-open me-2"></i>Choose File
                                        </button>
                                    </div>
                                    <div id="imagePreview" class="d-none">
                                        <img id="previewImg" class="img-fluid rounded-3 shadow-sm" style="max-height: 200px;">
                                        <div class="mt-3">
                                            <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeImage()">
                                                <i class="fas fa-trash me-1"></i>Remove
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <input type="file" name="featured_image" id="featured_image" accept="image/*" class="d-none" onchange="handleFileSelect(event)">
            @error('featured_image')
                                    <div class="text-danger small mt-2">{{ $message }}</div>
            @enderror
                                <div class="form-text">
                                    <i class="fas fa-info-circle text-info me-1"></i>
                                    Recommended size: 1200x630px. Supported formats: JPG, PNG, GIF (Max 5MB)
        </div>
    </div>
            </div>
            </div>
        </div>
    </div>
    
            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Publish Settings -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-0 py-3">
                        <div class="d-flex align-items-center">
                            <div class="bg-warning bg-opacity-10 rounded-circle p-2 me-3">
                                <i class="fas fa-paper-plane text-warning"></i>
                            </div>
            <div>
                                <h5 class="mb-0 fw-bold">Publish Settings</h5>
                                <small class="text-muted">Control when and how your post is published</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="mb-4">
                            <label for="status" class="form-label fw-semibold">
                                Status <span class="text-danger">*</span>
                            </label>
                            <select name="status" id="status" required class="form-select @error('status') is-invalid @enderror">
                                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>📝 Draft</option>
                                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>🚀 Published</option>
                </select>
                @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
                        <div class="mb-4">
                            <label for="published_at" class="form-label fw-semibold">Publish Date</label>
                <input type="datetime-local" name="published_at" id="published_at" value="{{ old('published_at') }}"
                                class="form-control @error('published_at') is-invalid @enderror">
                @error('published_at')
                                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                            <div class="form-text">
                                <i class="fas fa-calendar text-info me-1"></i>
                                Leave empty to publish immediately
                            </div>
            </div>
            
                        <div class="form-check form-switch mb-4">
                <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}
                                class="form-check-input">
                            <label for="is_featured" class="form-check-label fw-semibold">
                                <i class="fas fa-star text-warning me-1"></i>
                    Featured Post
                </label>
                            <div class="form-text">
                                <i class="fas fa-info-circle text-info me-1"></i>
                                Featured posts appear prominently on the homepage
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- SEO Settings -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-0 py-3">
                        <div class="d-flex align-items-center">
                            <div class="bg-info bg-opacity-10 rounded-circle p-2 me-3">
                                <i class="fas fa-search text-info"></i>
                            </div>
                            <div>
                                <h5 class="mb-0 fw-bold">SEO Settings</h5>
                                <small class="text-muted">Optimize your post for search engines</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="mb-4">
                            <label for="meta_title" class="form-label fw-semibold">Meta Title</label>
                            <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title') }}"
                                class="form-control @error('meta_title') is-invalid @enderror"
                                placeholder="SEO-optimized title for search engines"
                                onkeyup="updateProgress()">
                            @error('meta_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">
                                <i class="fas fa-chart-line text-success me-1"></i>
                                <span id="metaTitleCount">0</span>/60 characters. Auto-filled from title if empty.
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="meta_description" class="form-label fw-semibold">Meta Description</label>
                            <textarea name="meta_description" id="meta_description" rows="3"
                                class="form-control @error('meta_description') is-invalid @enderror"
                                placeholder="Brief description that appears in search results"
                                onkeyup="updateProgress()">{{ old('meta_description') }}</textarea>
                            @error('meta_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">
                                <i class="fas fa-eye text-info me-1"></i>
                                <span id="metaDescCount">0</span>/160 characters. Auto-filled from excerpt if empty.
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- SEO Preview -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-0 py-3">
                        <div class="d-flex align-items-center">
                            <div class="bg-secondary bg-opacity-10 rounded-circle p-2 me-3">
                                <i class="fas fa-eye text-secondary"></i>
                            </div>
                            <div>
                                <h5 class="mb-0 fw-bold">Search Preview</h5>
                                <small class="text-muted">How your post will appear in search results</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="search-preview border rounded-3 p-3 bg-light">
                            <div class="text-primary small mb-1" id="previewUrl">https://yoursite.com/blog/...</div>
                            <div class="fw-bold text-dark mb-1" id="previewTitle">Your blog post title will appear here</div>
                            <div class="text-muted small" id="previewDescription">Your meta description will appear here...</div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    
        <!-- Action Buttons -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center gap-3">
                            <div class="d-flex align-items-center gap-3">
                                <button type="button" class="btn btn-outline-secondary" onclick="saveDraft()">
                                    <i class="fas fa-save me-2"></i>Save Draft
                                </button>
                                <button type="button" class="btn btn-outline-info" onclick="previewPost()">
                                    <i class="fas fa-eye me-2"></i>Preview
                                </button>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-danger">
                                    <i class="fas fa-times me-2"></i>Cancel
                                </a>
                                <button type="submit" class="btn btn-primary btn-lg px-5" id="submitBtn">
                                    <i class="fas fa-paper-plane me-2"></i>Create Post
        </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</form>
</div>
@endsection

@push('scripts')
<script>
// Form progress tracking
function updateProgress() {
    const title = document.getElementById('title').value;
    const excerpt = document.getElementById('excerpt').value;
    const content = document.getElementById('content').value;
    const metaTitle = document.getElementById('meta_title').value;
    const metaDesc = document.getElementById('meta_description').value;
    
    let progress = 0;
    if (title) progress += 20;
    if (excerpt) progress += 15;
    if (content) progress += 25;
    if (metaTitle) progress += 20;
    if (metaDesc) progress += 20;
    
    document.getElementById('progressBar').style.width = progress + '%';
    document.getElementById('progressPercentage').textContent = progress + '%';
    
    // Update character counts
    document.getElementById('titleCount').textContent = title.length;
    document.getElementById('excerptCount').textContent = excerpt.length;
    document.getElementById('contentCount').textContent = content.split(' ').filter(word => word.length > 0).length;
    document.getElementById('metaTitleCount').textContent = metaTitle.length;
    document.getElementById('metaDescCount').textContent = metaDesc.length;
    
    // Update SEO preview
    updateSEOPreview();
}

// Auto-fill SEO fields
document.getElementById('title').addEventListener('input', function() {
    const metaTitle = document.getElementById('meta_title');
    if (!metaTitle.value) {
        metaTitle.value = this.value;
        updateProgress();
    }
});

document.getElementById('excerpt').addEventListener('input', function() {
    const metaDesc = document.getElementById('meta_description');
    if (!metaDesc.value) {
        metaDesc.value = this.value;
        updateProgress();
    }
});

// Update SEO preview
function updateSEOPreview() {
    const title = document.getElementById('title').value || 'Your blog post title will appear here';
    const metaTitle = document.getElementById('meta_title').value || title;
    const metaDesc = document.getElementById('meta_description').value || 'Your meta description will appear here...';
    
    document.getElementById('previewTitle').textContent = metaTitle;
    document.getElementById('previewDescription').textContent = metaDesc;
}

// Image upload handling
function handleFileSelect(event) {
    const file = event.target.files[0];
    if (file) {
        displayImagePreview(file);
    }
}

function handleDrop(event) {
    event.preventDefault();
    const files = event.dataTransfer.files;
    if (files.length > 0) {
        displayImagePreview(files[0]);
    }
}

function handleDragOver(event) {
    event.preventDefault();
    event.currentTarget.classList.add('border-primary', 'bg-primary', 'bg-opacity-10');
}

function handleDragLeave(event) {
    event.currentTarget.classList.remove('border-primary', 'bg-primary', 'bg-opacity-10');
}

function displayImagePreview(file) {
    if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('previewImg').src = e.target.result;
            document.getElementById('uploadContent').classList.add('d-none');
            document.getElementById('imagePreview').classList.remove('d-none');
        };
        reader.readAsDataURL(file);
    }
}

function removeImage() {
    document.getElementById('featured_image').value = '';
    document.getElementById('uploadContent').classList.remove('d-none');
    document.getElementById('imagePreview').classList.add('d-none');
}

// Form submission
document.getElementById('blogForm').addEventListener('submit', function(e) {
    const submitBtn = document.getElementById('submitBtn');
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Creating...';
    submitBtn.disabled = true;
});

// Save draft functionality
function saveDraft() {
    const statusSelect = document.getElementById('status');
    statusSelect.value = 'draft';
    document.getElementById('blogForm').submit();
}

// Preview functionality
function previewPost() {
    // Create a preview window
    const title = document.getElementById('title').value;
    const content = document.getElementById('content').value;
    const excerpt = document.getElementById('excerpt').value;
    
    if (!title || !content) {
        alert('Please fill in the title and content before previewing.');
        return;
    }
    
    const previewWindow = window.open('', '_blank', 'width=800,height=600');
    previewWindow.document.write(`
        <!DOCTYPE html>
        <html>
        <head>
            <title>Preview: ${title}</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            <style>
                body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; }
                .preview-header { background: linear-gradient(135deg, #D4AF37 0%, #B8941F 100%); color: white; }
            </style>
        </head>
        <body>
            <div class="preview-header py-4 mb-4">
                <div class="container">
                    <h1 class="display-6 fw-bold">${title}</h1>
                    ${excerpt ? `<p class="lead mb-0">${excerpt}</p>` : ''}
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="content">
                            ${content.replace(/\n/g, '<br>')}
                        </div>
                    </div>
                </div>
            </div>
        </body>
        </html>
    `);
    previewWindow.document.close();
}

// Initialize progress on page load
document.addEventListener('DOMContentLoaded', function() {
    updateProgress();
    
    // Set current datetime for publish date
    const now = new Date();
    const datetimeLocal = now.toISOString().slice(0, 16);
    document.getElementById('published_at').value = datetimeLocal;
});
</script>
@endpush
