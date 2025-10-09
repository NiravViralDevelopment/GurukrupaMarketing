@extends('layouts.admin')

@section('title', 'View Project')
@section('page-title', 'Project Details')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-start mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">{{ $project->title }}</h1>
            <div class="flex items-center space-x-4 mt-2">
                <span class="px-2 py-1 text-xs font-medium rounded-full
                    @if($project->category === 'new_launch') bg-blue-100 text-blue-800
                    @elseif($project->category === 'ongoing') bg-yellow-100 text-yellow-800
                    @else bg-green-100 text-green-800
                    @endif">
                    {{ ucfirst(str_replace('_', ' ', $project->category)) }}
                </span>
                @if($project->is_featured)
                <span class="px-2 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800">Featured</span>
                @endif
                @if($project->is_active)
                <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">Active</span>
                @else
                <span class="px-2 py-1 text-xs font-medium rounded-full bg-red-100 text-red-800">Inactive</span>
                @endif
            </div>
        </div>
        <div class="flex space-x-2">
            <a href="{{ route('admin.projects.edit', $project) }}" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition duration-300">
                Edit Project
            </a>
        </div>
    </div>
    
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div>
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Project Information</h3>
            <div class="space-y-4">
                <div>
                    <label class="text-sm font-medium text-gray-600">Location</label>
                    <p class="text-gray-900">{{ $project->location }}</p>
                </div>
                
                @if($project->area)
                <div>
                    <label class="text-sm font-medium text-gray-600">Area</label>
                    <p class="text-gray-900">{{ $project->area }}</p>
                </div>
                @endif
                
                @if($project->price)
                <div>
                    <label class="text-sm font-medium text-gray-600">Price</label>
                    <p class="text-gray-900 font-semibold">₹{{ number_format($project->price / 100000, 1) }}L</p>
                </div>
                @endif
                
                @if($project->start_date)
                <div>
                    <label class="text-sm font-medium text-gray-600">Start Date</label>
                    <p class="text-gray-900">{{ $project->start_date->format('M d, Y') }}</p>
                </div>
                @endif
                
                @if($project->end_date)
                <div>
                    <label class="text-sm font-medium text-gray-600">End Date</label>
                    <p class="text-gray-900">{{ $project->end_date->format('M d, Y') }}</p>
                </div>
                @endif
            </div>
        </div>
        
        <div>
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Project Images</h3>
            @if($project->images->count() > 0)
            <div class="grid grid-cols-2 gap-4">
                @foreach($project->images as $image)
                <div class="relative">
                    <img src="{{ $image->image_url }}" alt="{{ $image->alt_text }}" class="w-full h-32 object-cover rounded-lg">
                    @if($image->is_primary)
                    <span class="absolute top-2 left-2 bg-primary text-white px-2 py-1 text-xs rounded">Primary</span>
                    @endif
                </div>
                @endforeach
            </div>
            @else
            <p class="text-gray-500">No images uploaded yet.</p>
            @endif
        </div>
    </div>
    
    @if($project->short_description)
    <div class="mt-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-2">Short Description</h3>
        <p class="text-gray-700">{{ $project->short_description }}</p>
    </div>
    @endif
    
    <div class="mt-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-2">Description</h3>
        <div class="prose max-w-none text-gray-700">
            {!! nl2br(e($project->description)) !!}
        </div>
    </div>
    
    @if($project->features && count($project->features) > 0)
    <div class="mt-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Key Features</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach($project->features as $feature)
            <div class="flex items-center">
                <svg class="w-5 h-5 text-primary mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
                <span>{{ $feature }}</span>
            </div>
            @endforeach
        </div>
    </div>
    @endif
    
    @if($project->meta_title || $project->meta_description)
    <div class="mt-6 border-t pt-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">SEO Information</h3>
        <div class="space-y-4">
            @if($project->meta_title)
            <div>
                <label class="text-sm font-medium text-gray-600">Meta Title</label>
                <p class="text-gray-900">{{ $project->meta_title }}</p>
            </div>
            @endif
            
            @if($project->meta_description)
            <div>
                <label class="text-sm font-medium text-gray-600">Meta Description</label>
                <p class="text-gray-900">{{ $project->meta_description }}</p>
            </div>
            @endif
        </div>
    </div>
    @endif
</div>

<div class="mt-6">
    <a href="{{ route('admin.projects.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400 transition duration-300">
        Back to Projects
    </a>
</div>
@endsection
