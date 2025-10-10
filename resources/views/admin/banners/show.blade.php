@extends('layouts.admin')

@section('title', 'View Banner')
@section('page-title', 'Banner Details')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-start mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">{{ $banner->title }}</h1>
            <div class="flex items-center space-x-4 mt-2">
                <span class="text-sm text-gray-500">
                    Created: {{ $banner->created_at->format('M d, Y \a\t g:i A') }}
                </span>
                <span class="text-sm text-gray-500">
                    Updated: {{ $banner->updated_at->format('M d, Y \a\t g:i A') }}
                </span>
            </div>
        </div>
        <div class="flex space-x-2">
            <a href="{{ route('admin.banners.edit', $banner) }}" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition duration-300">
                Edit Banner
            </a>
        </div>
    </div>
    
    @if($banner->image)
    <div class="mb-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Banner Image</h3>
        <div class="bg-gray-50 p-4 rounded-lg">
            <img src="{{ $banner->image_url }}" alt="{{ $banner->title }}" class="max-w-full h-auto rounded-lg shadow-sm">
            <div class="mt-2 text-sm text-gray-600">
                <p><strong>Filename:</strong> {{ $banner->image }}</p>
                <p><strong>URL:</strong> <a href="{{ $banner->image_url }}" target="_blank" class="text-primary hover:text-yellow-600">{{ $banner->image_url }}</a></p>
            </div>
        </div>
    </div>
    @else
    <div class="mb-6">
        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-yellow-800">No Image</h3>
                    <div class="mt-2 text-sm text-yellow-700">
                        <p>This banner doesn't have an image associated with it.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    
    <div class="border-t pt-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Banner Information</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="text-sm font-medium text-gray-600">Banner ID</label>
                <p class="text-gray-900">{{ $banner->id }}</p>
            </div>
            
            <div>
                <label class="text-sm font-medium text-gray-600">Title</label>
                <p class="text-gray-900">{{ $banner->title }}</p>
            </div>
            
            <div>
                <label class="text-sm font-medium text-gray-600">Created At</label>
                <p class="text-gray-900">{{ $banner->created_at->format('M d, Y \a\t g:i A') }}</p>
            </div>
            
            <div>
                <label class="text-sm font-medium text-gray-600">Last Updated</label>
                <p class="text-gray-900">{{ $banner->updated_at->format('M d, Y \a\t g:i A') }}</p>
            </div>
        </div>
    </div>
</div>

<div class="mt-6">
    <a href="{{ route('admin.banners.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400 transition duration-300">
        Back to Banners
    </a>
</div>
@endsection
