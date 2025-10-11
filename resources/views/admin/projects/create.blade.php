@extends('layouts.admin')

@section('title', 'Create Project')
@section('page-title', 'Create New Project')

@section('content')
<div class="container-fluid">
    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" id="projectForm">
    @csrf
    
        <!-- Progress Bar -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="progress mb-3" style="height: 8px;">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 0%" id="progressBar"></div>
                </div>
                <div class="d-flex justify-content-between">
                    <small class="text-muted">Form Progress</small>
                    <small class="text-muted" id="progressText">0% Complete</small>
                </div>
            </div>
        </div>

        <!-- Basic Information -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="card-title mb-0">
                    <i class="fas fa-info-circle me-2"></i>Basic Information
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 mb-3">
                        <label for="title" class="form-label">Project Title <span class="text-danger">*</span></label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" required
                            class="form-control @error('title') is-invalid @enderror" 
                            placeholder="Enter project title">
                @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
                    <div class="col-md-4 mb-3">
                        <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
                        <select name="category" id="category" required
                            class="form-select @error('category') is-invalid @enderror">
                            <option value="">Select Category</option>
                            <option value="new_launch" {{ old('category') == 'new_launch' ? 'selected' : '' }}>New Launch</option>
                            <option value="ongoing" {{ old('category') == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                            <option value="completed" {{ old('category') == 'completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="short_description" class="form-label">Short Description</label>
                    <textarea name="short_description" id="short_description" rows="2"
                        class="form-control @error('short_description') is-invalid @enderror"
                        placeholder="Brief description for listings and cards">{{ old('short_description') }}</textarea>
                    <div class="form-text">This will be shown in project cards and listings</div>
                @error('short_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
                <div class="mb-3">
                    <label for="description" class="form-label">Detailed Description <span class="text-danger">*</span></label>
                <textarea name="description" id="description" rows="6" required
                        class="form-control @error('description') is-invalid @enderror"
                        placeholder="Detailed project description">{{ old('description') }}</textarea>
                    <div class="form-text">Provide comprehensive details about the project</div>
                @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    
        <!-- Project Details -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <h5 class="card-title mb-0">
                    <i class="fas fa-building me-2"></i>Project Details
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="location" class="form-label">Location <span class="text-danger">*</span></label>
                <input type="text" name="location" id="location" value="{{ old('location') }}" required
                            class="form-control @error('location') is-invalid @enderror"
                            placeholder="Enter project location">
                @error('location')
                            <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
                    <div class="col-md-3 mb-3">
                        <label for="area" class="form-label">Area (sq ft)</label>
                <input type="number" name="area" id="area" value="{{ old('area') }}"
                            class="form-control @error('area') is-invalid @enderror"
                            placeholder="e.g., 1200">
                @error('area')
                            <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
                    <div class="col-md-3 mb-3">
                        <label for="price" class="form-label">Price (₹)</label>
                <input type="number" name="price" id="price" value="{{ old('price') }}"
                            class="form-control @error('price') is-invalid @enderror"
                            placeholder="e.g., 5000000">
                        <div class="form-text">Enter price in rupees</div>
                @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            </div>
            
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="start_date" class="form-label">Start Date</label>
                <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}"
                            class="form-control @error('start_date') is-invalid @enderror">
                @error('start_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
                    <div class="col-md-6 mb-3">
                        <label for="end_date" class="form-label">Expected Completion Date</label>
                <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}"
                            class="form-control @error('end_date') is-invalid @enderror">
                @error('end_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                    </div>
            </div>
        </div>
    </div>
    
        <!-- Amenities -->
        <div class="card mb-4">
            <div class="card-header bg-info text-white">
                <h5 class="card-title mb-0">
                    <i class="fas fa-star me-2"></i>Amenities & Features
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="fw-bold mb-3">Basic Amenities</h6>
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="amenities[]" value="parking" id="parking">
                                    <label class="form-check-label" for="parking">
                                        <i class="fas fa-car me-1"></i>Parking
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="amenities[]" value="security" id="security">
                                    <label class="form-check-label" for="security">
                                        <i class="fas fa-shield-alt me-1"></i>24/7 Security
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="amenities[]" value="elevator" id="elevator">
                                    <label class="form-check-label" for="elevator">
                                        <i class="fas fa-elevator me-1"></i>Elevator
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="amenities[]" value="power_backup" id="power_backup">
                                    <label class="form-check-label" for="power_backup">
                                        <i class="fas fa-bolt me-1"></i>Power Backup
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="amenities[]" value="water_supply" id="water_supply">
                                    <label class="form-check-label" for="water_supply">
                                        <i class="fas fa-tint me-1"></i>24/7 Water Supply
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="amenities[]" value="garden" id="garden">
                                    <label class="form-check-label" for="garden">
                                        <i class="fas fa-seedling me-1"></i>Garden
                                    </label>
                                </div>
                            </div>
        </div>
    </div>
    
                    <div class="col-md-6">
                        <h6 class="fw-bold mb-3">Luxury Amenities</h6>
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="amenities[]" value="swimming_pool" id="swimming_pool">
                                    <label class="form-check-label" for="swimming_pool">
                                        <i class="fas fa-swimming-pool me-1"></i>Swimming Pool
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="amenities[]" value="gym" id="gym">
                                    <label class="form-check-label" for="gym">
                                        <i class="fas fa-dumbbell me-1"></i>Gymnasium
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="amenities[]" value="clubhouse" id="clubhouse">
                                    <label class="form-check-label" for="clubhouse">
                                        <i class="fas fa-home me-1"></i>Clubhouse
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="amenities[]" value="playground" id="playground">
                                    <label class="form-check-label" for="playground">
                                        <i class="fas fa-child me-1"></i>Children's Playground
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="amenities[]" value="party_hall" id="party_hall">
                                    <label class="form-check-label" for="party_hall">
                                        <i class="fas fa-birthday-cake me-1"></i>Party Hall
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="amenities[]" value="conference_room" id="conference_room">
                                    <label class="form-check-label" for="conference_room">
                                        <i class="fas fa-users me-1"></i>Conference Room
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
                <!-- Custom Features -->
                <div class="mt-4">
                    <h6 class="fw-bold mb-3">Additional Features</h6>
        <div id="features-container">
                        <div class="input-group mb-2">
                            <input type="text" name="features[]" class="form-control" placeholder="Enter a custom feature">
                            <button type="button" class="btn btn-outline-primary" onclick="addFeature()">
                                <i class="fas fa-plus"></i> Add
                </button>
                        </div>
                    </div>
                    <div class="form-text">Add any additional features not listed above</div>
                </div>
            </div>
        </div>
        
        <!-- Location & Map -->
        <div class="card mb-4">
            <div class="card-header bg-warning text-dark">
                <h5 class="card-title mb-0">
                    <i class="fas fa-map-marker-alt me-2"></i>Location & Map
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="map_lat" class="form-label">Latitude</label>
                        <input type="number" name="map_lat" id="map_lat" value="{{ old('map_lat') }}" step="any"
                            class="form-control @error('map_lat') is-invalid @enderror"
                            placeholder="e.g., 28.6139">
                        @error('map_lat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="map_lng" class="form-label">Longitude</label>
                        <input type="number" name="map_lng" id="map_lng" value="{{ old('map_lng') }}" step="any"
                            class="form-control @error('map_lng') is-invalid @enderror"
                            placeholder="e.g., 77.2090">
                        @error('map_lng')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-text">
                    <i class="fas fa-info-circle me-1"></i>
                    You can get coordinates from Google Maps by right-clicking on the location
                </div>
            </div>
        </div>
        
        <!-- Project Images -->
        <div class="card mb-4">
            <div class="card-header bg-secondary text-white">
                <h5 class="card-title mb-0">
                    <i class="fas fa-images me-2"></i>Project Images
                </h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="images" class="form-label">Upload Images</label>
                    <input type="file" name="images[]" id="images" multiple accept="image/*"
                        class="form-control @error('images') is-invalid @enderror">
                    <div class="form-text">You can select multiple images at once. Recommended size: 1200x800px</div>
                    @error('images')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <!-- Image Preview -->
                <div id="imagePreview" class="row mt-3" style="display: none;">
                    <div class="col-12">
                        <h6>Selected Images:</h6>
                        <div id="previewContainer" class="row"></div>
                    </div>
            </div>
        </div>
    </div>
    
        <!-- Project Brochure -->
        <div class="card mb-4">
            <div class="card-header bg-dark text-white">
                <h5 class="card-title mb-0">
                    <i class="fas fa-file-pdf me-2"></i>Project Brochure
                </h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="brochure" class="form-label">Upload Brochure (PDF)</label>
                    <div class="border border-2 border-dashed rounded p-4 text-center" id="brochureDropZone">
                        <i class="fas fa-file-pdf fa-3x text-muted mb-3"></i>
                        <p class="mb-2">Drag and drop your PDF file here, or</p>
                        <input type="file" name="brochure" id="brochure" accept=".pdf" class="d-none">
                        <button type="button" class="btn btn-outline-primary" onclick="document.getElementById('brochure').click()">
                            <i class="fas fa-upload me-1"></i>Choose File
                        </button>
                        <p class="text-muted mt-2 mb-0">PDF files up to 10MB</p>
                    </div>
                    @error('brochure')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        
        <!-- SEO Settings -->
        <div class="card mb-4">
            <div class="card-header bg-purple text-white">
                <h5 class="card-title mb-0">
                    <i class="fas fa-search me-2"></i>SEO Settings
                </h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="meta_title" class="form-label">Meta Title</label>
                <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title') }}"
                        class="form-control @error('meta_title') is-invalid @enderror"
                        placeholder="SEO title for search engines" maxlength="60">
                    <div class="form-text">Recommended: 50-60 characters</div>
                @error('meta_title')
                        <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
                <div class="mb-3">
                    <label for="meta_description" class="form-label">Meta Description</label>
                <textarea name="meta_description" id="meta_description" rows="3"
                        class="form-control @error('meta_description') is-invalid @enderror"
                        placeholder="SEO description for search engines" maxlength="160">{{ old('meta_description') }}</textarea>
                    <div class="form-text">Recommended: 150-160 characters</div>
                @error('meta_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    
        <!-- Project Settings -->
        <div class="card mb-4">
            <div class="card-header bg-danger text-white">
                <h5 class="card-title mb-0">
                    <i class="fas fa-cog me-2"></i>Project Settings
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_featured">
                                <i class="fas fa-star me-1"></i>Featured Project
                </label>
                            <div class="form-text">Featured projects appear prominently on the website</div>
                        </div>
            </div>
            
                    <div class="col-md-6">
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">
                                <i class="fas fa-eye me-1"></i>Active Project
                </label>
                            <div class="form-text">Active projects are visible to visitors</div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    
        <!-- Form Actions -->
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-1"></i>Back to Projects
                    </a>
                    <div>
                        <button type="button" class="btn btn-outline-primary me-2" onclick="saveDraft()">
                            <i class="fas fa-save me-1"></i>Save Draft
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-plus me-1"></i>Create Project
        </button>
                    </div>
                </div>
            </div>
    </div>
</form>
</div>

@push('scripts')
<script>
// Form progress tracking
function updateProgress() {
    const form = document.getElementById('projectForm');
    const inputs = form.querySelectorAll('input[required], textarea[required], select[required]');
    const filledInputs = Array.from(inputs).filter(input => input.value.trim() !== '');
    const progress = (filledInputs.length / inputs.length) * 100;
    
    document.getElementById('progressBar').style.width = progress + '%';
    document.getElementById('progressText').textContent = Math.round(progress) + '% Complete';
}

// Add event listeners for progress tracking
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('projectForm');
    const inputs = form.querySelectorAll('input, textarea, select');
    
    inputs.forEach(input => {
        input.addEventListener('input', updateProgress);
        input.addEventListener('change', updateProgress);
    });
    
    updateProgress();
});

// Add feature functionality
function addFeature() {
    const container = document.getElementById('features-container');
    const newFeature = document.createElement('div');
    newFeature.className = 'input-group mb-2';
    newFeature.innerHTML = `
        <input type="text" name="features[]" class="form-control" placeholder="Enter a custom feature">
        <button type="button" class="btn btn-outline-danger" onclick="removeFeature(this)">
            <i class="fas fa-trash"></i> Remove
        </button>
    `;
    container.appendChild(newFeature);
}

function removeFeature(button) {
    button.parentElement.remove();
}

// Image preview functionality
document.getElementById('images').addEventListener('change', function(e) {
    const files = e.target.files;
    const previewContainer = document.getElementById('previewContainer');
    const imagePreview = document.getElementById('imagePreview');
    
    previewContainer.innerHTML = '';
    
    if (files.length > 0) {
        imagePreview.style.display = 'block';
        
        Array.from(files).forEach((file, index) => {
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const col = document.createElement('div');
                    col.className = 'col-md-3 mb-3';
                    col.innerHTML = `
                        <div class="card">
                            <img src="${e.target.result}" class="card-img-top" style="height: 150px; object-fit: cover;">
                            <div class="card-body p-2">
                                <small class="text-muted">${file.name}</small>
                            </div>
                        </div>
                    `;
                    previewContainer.appendChild(col);
                };
                reader.readAsDataURL(file);
            }
        });
    } else {
        imagePreview.style.display = 'none';
    }
});

// Brochure drop zone functionality
const brochureDropZone = document.getElementById('brochureDropZone');
const brochureInput = document.getElementById('brochure');

brochureDropZone.addEventListener('dragover', function(e) {
    e.preventDefault();
    this.classList.add('border-primary', 'bg-light');
});

brochureDropZone.addEventListener('dragleave', function(e) {
    e.preventDefault();
    this.classList.remove('border-primary', 'bg-light');
});

brochureDropZone.addEventListener('drop', function(e) {
    e.preventDefault();
    this.classList.remove('border-primary', 'bg-light');
    
    const files = e.dataTransfer.files;
    if (files.length > 0 && files[0].type === 'application/pdf') {
        brochureInput.files = files;
        updateBrochurePreview(files[0]);
    }
});

brochureInput.addEventListener('change', function(e) {
    if (e.target.files.length > 0) {
        updateBrochurePreview(e.target.files[0]);
    }
});

function updateBrochurePreview(file) {
    const dropZone = document.getElementById('brochureDropZone');
    dropZone.innerHTML = `
        <i class="fas fa-file-pdf fa-2x text-danger mb-2"></i>
        <p class="mb-1 fw-bold">${file.name}</p>
        <p class="text-muted mb-0">${(file.size / 1024 / 1024).toFixed(2)} MB</p>
        <button type="button" class="btn btn-sm btn-outline-danger mt-2" onclick="removeBrochure()">
            <i class="fas fa-trash me-1"></i>Remove
        </button>
    `;
}

function removeBrochure() {
    document.getElementById('brochure').value = '';
    document.getElementById('brochureDropZone').innerHTML = `
        <i class="fas fa-file-pdf fa-3x text-muted mb-3"></i>
        <p class="mb-2">Drag and drop your PDF file here, or</p>
        <button type="button" class="btn btn-outline-primary" onclick="document.getElementById('brochure').click()">
            <i class="fas fa-upload me-1"></i>Choose File
        </button>
        <p class="text-muted mt-2 mb-0">PDF files up to 10MB</p>
    `;
}

// Save draft functionality
function saveDraft() {
    // Add a hidden input to indicate this is a draft
    const draftInput = document.createElement('input');
    draftInput.type = 'hidden';
    draftInput.name = 'is_draft';
    draftInput.value = '1';
    document.getElementById('projectForm').appendChild(draftInput);
    
    // Submit the form
    document.getElementById('projectForm').submit();
}

// Form validation
document.getElementById('projectForm').addEventListener('submit', function(e) {
    const requiredFields = ['title', 'description', 'location', 'category'];
    let isValid = true;
    
    requiredFields.forEach(fieldName => {
        const field = document.getElementById(fieldName);
        if (!field.value.trim()) {
            field.classList.add('is-invalid');
            isValid = false;
        } else {
            field.classList.remove('is-invalid');
        }
    });
    
    if (!isValid) {
        e.preventDefault();
        alert('Please fill in all required fields.');
    }
});

// Auto-generate meta title from project title
document.getElementById('title').addEventListener('input', function() {
    const metaTitle = document.getElementById('meta_title');
    if (!metaTitle.value) {
        metaTitle.value = this.value + ' - Gurukrupa Real Estate';
    }
});

// Auto-generate meta description from short description
document.getElementById('short_description').addEventListener('input', function() {
    const metaDescription = document.getElementById('meta_description');
    if (!metaDescription.value) {
        metaDescription.value = this.value;
    }
});
</script>

<style>
.bg-purple {
    background-color: #6f42c1 !important;
}

.card-header {
    border-bottom: none;
}

.form-check-input:checked {
    background-color: #D4AF37;
    border-color: #D4AF37;
}

.btn-primary {
    background-color: #D4AF37;
    border-color: #D4AF37;
}

.btn-primary:hover {
    background-color: #B8941F;
    border-color: #B8941F;
}

.progress-bar {
    background-color: #D4AF37;
}

#brochureDropZone {
    transition: all 0.3s ease;
    cursor: pointer;
}

#brochureDropZone:hover {
    border-color: #D4AF37 !important;
    background-color: #f8f9fa;
}

.form-control:focus,
.form-select:focus {
    border-color: #D4AF37;
    box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.25);
}

.card {
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    border: 1px solid rgba(0, 0, 0, 0.125);
}

.card:hover {
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    transition: box-shadow 0.15s ease-in-out;
}
</style>
@endpush
@endsection