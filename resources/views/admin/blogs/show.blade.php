@extends('layouts.admin')


@section('title', 'View Blog Post')
@section('page-title', 'Blog Post Details')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-start mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">{{ $blog->title }}</h1>
            <div class="flex items-center space-x-4 mt-2">
                <span class="px-2 py-1 text-xs font-medium rounded-full
                    @if($blog->status === 'published') bg-green-100 text-green-800
                    @else bg-yellow-100 text-yellow-800
                    @endif">
                    {{ ucfirst($blog->status) }}
                </span>
                @if($blog->is_featured)
                <span class="px-2 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800">Featured</span>
                @endif
                <span class="text-sm text-gray-500">
                    {{ $blog->published_at ? $blog->published_at->format('M d, Y \a\t g:i A') : 'Not published' }}
                </span>
            </div>
        </div>
        <div class="flex space-x-2">
            <a href="{{ route('admin.blogs.edit', $blog) }}" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition duration-300">
                Edit Post
            </a>
        </div>
    </div>
    
    @if($blog->featured_image)
    <div class="mb-6">
        <img src="{{ $blog->featured_image_url }}" alt="{{ $blog->title }}" class="w-full h-64 object-cover rounded-lg">
    </div>
    @endif
    
    @if($blog->excerpt)
    <div class="mb-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-2">Excerpt</h3>
        <p class="text-gray-700">{{ $blog->excerpt }}</p>
    </div>
    @endif
    
    <div class="mb-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-2">Content</h3>
        <div class="prose max-w-none text-gray-700">
            {!! nl2br(e($blog->content)) !!}
        </div>
    </div>
    
    @if($blog->meta_title || $blog->meta_description)
    <div class="border-t pt-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">SEO Information</h3>
        <div class="space-y-4">
            @if($blog->meta_title)
            <div>
                <label class="text-sm font-medium text-gray-600">Meta Title</label>
                <p class="text-gray-900">{{ $blog->meta_title }}</p>
            </div>
            @endif
            
            @if($blog->meta_description)
            <div>
                <label class="text-sm font-medium text-gray-600">Meta Description</label>
                <p class="text-gray-900">{{ $blog->meta_description }}</p>
            </div>
            @endif
        </div>
    </div>
    @endif
</div>

<div class="mt-6">
    <a href="{{ route('admin.blogs.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400 transition duration-300">
        Back to Blog Posts
    </a>
</div>
@endsection
