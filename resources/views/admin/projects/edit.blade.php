@extends('layouts.admin')

@section('title', 'Edit Project')
@section('page-title', 'Edit Project')

@section('content')
<form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @method('PUT')
    
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Basic Information</h3>
        
        <div class="space-y-6">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title *</label>
                <input type="text" name="title" id="title" value="{{ old('title', $project->title) }}" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary @error('title') border-red-500 @enderror">
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="short_description" class="block text-sm font-medium text-gray-700">Short Description</label>
                <textarea name="short_description" id="short_description" rows="3"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary @error('short_description') border-red-500 @enderror">{{ old('short_description', $project->short_description) }}</textarea>
                @error('short_description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description *</label>
                <textarea name="description" id="description" rows="6" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary @error('description') border-red-500 @enderror">{{ old('description', $project->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Project Details</h3>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="location" class="block text-sm font-medium text-gray-700">Location *</label>
                <input type="text" name="location" id="location" value="{{ old('location', $project->location) }}" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary @error('location') border-red-500 @enderror">
                @error('location')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="area" class="block text-sm font-medium text-gray-700">Area (sq ft)</label>
                <input type="number" name="area" id="area" value="{{ old('area', $project->area) }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary @error('area') border-red-500 @enderror">
                @error('area')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="price" class="block text-sm font-medium text-gray-700">Price (₹)</label>
                <input type="number" name="price" id="price" value="{{ old('price', $project->price) }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary @error('price') border-red-500 @enderror">
                @error('price')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="category" class="block text-sm font-medium text-gray-700">Category *</label>
                <select name="category" id="category" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary @error('category') border-red-500 @enderror">
                    <option value="">Select Category</option>
                    <option value="new_launch" {{ old('category', $project->category) == 'new_launch' ? 'selected' : '' }}>New Launch</option>
                    <option value="ongoing" {{ old('category', $project->category) == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                    <option value="completed" {{ old('category', $project->category) == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
                @error('category')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                <input type="date" name="start_date" id="start_date" 
                    value="{{ old('start_date', $project->start_date ? $project->start_date->format('Y-m-d') : '') }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary @error('start_date') border-red-500 @enderror">
                @error('start_date')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                <input type="date" name="end_date" id="end_date" 
                    value="{{ old('end_date', $project->end_date ? $project->end_date->format('Y-m-d') : '') }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary @error('end_date') border-red-500 @enderror">
                @error('end_date')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Project Images</h3>
        
        @if($project->images->count() > 0)
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">Current Images</label>
            <div class="grid grid-cols-4 gap-4">
                @foreach($project->images as $image)
                <div class="relative">
                    <img src="{{ $image->image_url }}" alt="{{ $image->alt_text }}" class="w-full h-24 object-cover rounded-lg">
                    @if($image->is_primary)
                    <span class="absolute top-1 left-1 bg-primary text-white px-1 py-0.5 text-xs rounded">Primary</span>
                    @endif
                    <button type="button" onclick="deleteImage({{ $image->id }})" 
                        class="absolute top-1 right-1 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs hover:bg-red-600">
                        ×
                    </button>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        
        <div>
            <label for="images" class="block text-sm font-medium text-gray-700">Add More Images</label>
            <input type="file" name="images[]" id="images" multiple accept="image/*"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary @error('images') border-red-500 @enderror">
            <p class="text-sm text-gray-500 mt-1">You can select multiple images at once.</p>
            @error('images')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>
    
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Key Features</h3>
        
        <div id="features-container">
            @if($project->features && count($project->features) > 0)
                @foreach($project->features as $index => $feature)
                <div class="flex items-center space-x-2 mb-2">
                    <input type="text" name="features[]" value="{{ $feature }}" placeholder="Enter a key feature"
                        class="flex-1 border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
                    @if($index > 0)
                    <button type="button" onclick="removeFeature(this)" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                        Remove
                    </button>
                    @endif
                </div>
                @endforeach
            @else
            <div class="flex items-center space-x-2 mb-2">
                <input type="text" name="features[]" placeholder="Enter a key feature"
                    class="flex-1 border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
                <button type="button" onclick="addFeature()" class="bg-primary text-white px-3 py-1 rounded hover:bg-yellow-600">
                    Add
                </button>
            </div>
            @endif
        </div>
    </div>
    
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-medium text-gray-900 mb-4">SEO Settings</h3>
        
        <div class="space-y-6">
            <div>
                <label for="meta_title" class="block text-sm font-medium text-gray-700">Meta Title</label>
                <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $project->meta_title) }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary @error('meta_title') border-red-500 @enderror">
                @error('meta_title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="meta_description" class="block text-sm font-medium text-gray-700">Meta Description</label>
                <textarea name="meta_description" id="meta_description" rows="3"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary @error('meta_description') border-red-500 @enderror">{{ old('meta_description', $project->meta_description) }}</textarea>
                @error('meta_description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Settings</h3>
        
        <div class="space-y-4">
            <div class="flex items-center">
                <input type="checkbox" name="is_featured" id="is_featured" value="1" 
                    {{ old('is_featured', $project->is_featured) ? 'checked' : '' }}
                    class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                <label for="is_featured" class="ml-2 block text-sm text-gray-900">
                    Featured Project
                </label>
            </div>
            
            <div class="flex items-center">
                <input type="checkbox" name="is_active" id="is_active" value="1" 
                    {{ old('is_active', $project->is_active) ? 'checked' : '' }}
                    class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                <label for="is_active" class="ml-2 block text-sm text-gray-900">
                    Active Project
                </label>
            </div>
        </div>
    </div>
    
    <div class="flex justify-end space-x-3">
        <a href="{{ route('admin.projects.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400 transition duration-300">
            Cancel
        </a>
        <button type="submit" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition duration-300">
            Update Project
        </button>
    </div>
</form>

<script>
function addFeature() {
    const container = document.getElementById('features-container');
    const newFeature = document.createElement('div');
    newFeature.className = 'flex items-center space-x-2 mb-2';
    newFeature.innerHTML = `
        <input type="text" name="features[]" placeholder="Enter a key feature"
            class="flex-1 border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
        <button type="button" onclick="removeFeature(this)" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
            Remove
        </button>
    `;
    container.appendChild(newFeature);
}

function removeFeature(button) {
    button.parentElement.remove();
}

function deleteImage(imageId) {
    if (confirm('Are you sure you want to delete this image?')) {
        fetch(`/admin/project-images/${imageId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
        })
        .then(response => {
            if (response.ok) {
                location.reload();
            } else {
                alert('Error deleting image');
            }
        });
    }
}
</script>
@endsection
