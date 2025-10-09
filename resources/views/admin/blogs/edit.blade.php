@extends('layouts.admin')

@section('title', 'Edit Blog Post')
@section('page-title', 'Edit Blog Post')

@section('content')
<form action="{{ route('admin.blogs.update', $blog) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @method('PUT')
    
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Basic Information</h3>
        
        <div class="space-y-6">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title *</label>
                <input type="text" name="title" id="title" value="{{ old('title', $blog->title) }}" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary @error('title') border-red-500 @enderror">
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="excerpt" class="block text-sm font-medium text-gray-700">Excerpt</label>
                <textarea name="excerpt" id="excerpt" rows="3"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary @error('excerpt') border-red-500 @enderror">{{ old('excerpt', $blog->excerpt) }}</textarea>
                @error('excerpt')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="content" class="block text-sm font-medium text-gray-700">Content *</label>
                <textarea name="content" id="content" rows="10" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary @error('content') border-red-500 @enderror">{{ old('content', $blog->content) }}</textarea>
                @error('content')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Featured Image</h3>
        
        @if($blog->featured_image)
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">Current Image</label>
            <img src="{{ $blog->featured_image_url }}" alt="{{ $blog->title }}" class="w-32 h-32 object-cover rounded-lg">
        </div>
        @endif
        
        <div>
            <label for="featured_image" class="block text-sm font-medium text-gray-700">
                {{ $blog->featured_image ? 'Replace Image' : 'Featured Image' }}
            </label>
            <input type="file" name="featured_image" id="featured_image" accept="image/*"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary @error('featured_image') border-red-500 @enderror">
            @error('featured_image')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>
    
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-medium text-gray-900 mb-4">SEO Settings</h3>
        
        <div class="space-y-6">
            <div>
                <label for="meta_title" class="block text-sm font-medium text-gray-700">Meta Title</label>
                <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $blog->meta_title) }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary @error('meta_title') border-red-500 @enderror">
                @error('meta_title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="meta_description" class="block text-sm font-medium text-gray-700">Meta Description</label>
                <textarea name="meta_description" id="meta_description" rows="3"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary @error('meta_description') border-red-500 @enderror">{{ old('meta_description', $blog->meta_description) }}</textarea>
                @error('meta_description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Publish Settings</h3>
        
        <div class="space-y-4">
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status *</label>
                <select name="status" id="status" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary @error('status') border-red-500 @enderror">
                    <option value="draft" {{ old('status', $blog->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ old('status', $blog->status) == 'published' ? 'selected' : '' }}>Published</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="published_at" class="block text-sm font-medium text-gray-700">Publish Date</label>
                <input type="datetime-local" name="published_at" id="published_at" 
                    value="{{ old('published_at', $blog->published_at ? $blog->published_at->format('Y-m-d\TH:i') : '') }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary @error('published_at') border-red-500 @enderror">
                @error('published_at')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="flex items-center">
                <input type="checkbox" name="is_featured" id="is_featured" value="1" 
                    {{ old('is_featured', $blog->is_featured) ? 'checked' : '' }}
                    class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                <label for="is_featured" class="ml-2 block text-sm text-gray-900">
                    Featured Post
                </label>
            </div>
        </div>
    </div>
    
    <div class="flex justify-end space-x-3">
        <a href="{{ route('admin.blogs.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400 transition duration-300">
            Cancel
        </a>
        <button type="submit" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition duration-300">
            Update Post
        </button>
    </div>
</form>
@endsection
