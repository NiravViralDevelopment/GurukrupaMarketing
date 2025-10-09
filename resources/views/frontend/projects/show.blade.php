@extends('layouts.app')

@section('title', $project->title . ' - Gurukrupa Real Estate')
@section('description', $project->short_description)

@section('content')
<!-- Hero Section -->
<section class="relative h-96 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80')">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="relative z-10 flex items-center justify-center h-full">
        <div class="text-center text-white px-4">
            <h1 class="text-4xl md:text-6xl font-bold mb-4">{{ $project->title }}</h1>
            <p class="text-xl md:text-2xl">{{ $project->location }}</p>
        </div>
    </div>
</section>

<!-- Project Details -->
<section class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <div class="mb-8">
                    <div class="flex items-center gap-4 mb-6">
                        <span class="bg-primary text-white px-4 py-2 rounded-lg">
                            {{ ucfirst(str_replace('_', ' ', $project->category)) }}
                        </span>
                        @if($project->is_featured)
                        <span class="bg-yellow-500 text-white px-4 py-2 rounded-lg">Featured</span>
                        @endif
                    </div>
                    
                    <h2 class="text-3xl font-bold mb-4">Project Overview</h2>
                    <div class="prose max-w-none text-gray-700">
                        {!! nl2br(e($project->description)) !!}
                    </div>
                </div>

                <!-- Features -->
                @if($project->features && count($project->features) > 0)
                <div class="mb-8">
                    <h3 class="text-2xl font-bold mb-4">Key Features</h3>
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

                <!-- Project Images -->
                @if($project->images->count() > 0)
                <div class="mb-8">
                    <h3 class="text-2xl font-bold mb-4">Project Gallery</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($project->images as $image)
                        <div class="aspect-w-16 aspect-h-9">
                            <img src="{{ $image->image_url }}" alt="{{ $image->alt_text }}" class="w-full h-64 object-cover rounded-lg">
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <div class="bg-gray-50 rounded-lg p-6 sticky top-8">
                    <h3 class="text-xl font-bold mb-4">Project Details</h3>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="text-sm font-semibold text-gray-600">Location</label>
                            <p class="text-gray-900">{{ $project->location }}</p>
                        </div>
                        
                        @if($project->area)
                        <div>
                            <label class="text-sm font-semibold text-gray-600">Area</label>
                            <p class="text-gray-900">{{ $project->area }}</p>
                        </div>
                        @endif
                        
                        @if($project->price)
                        <div>
                            <label class="text-sm font-semibold text-gray-600">Price</label>
                            <p class="text-gray-900 font-semibold">₹{{ number_format($project->price / 100000, 1) }}L</p>
                        </div>
                        @endif
                        
                        @if($project->start_date)
                        <div>
                            <label class="text-sm font-semibold text-gray-600">Start Date</label>
                            <p class="text-gray-900">{{ $project->start_date->format('M d, Y') }}</p>
                        </div>
                        @endif
                        
                        @if($project->end_date)
                        <div>
                            <label class="text-sm font-semibold text-gray-600">Completion Date</label>
                            <p class="text-gray-900">{{ $project->end_date->format('M d, Y') }}</p>
                        </div>
                        @endif
                    </div>
                    
                    <div class="mt-8">
                        <a href="{{ route('contact') }}?project={{ $project->id }}" class="w-full bg-primary text-white py-3 px-6 rounded-lg font-semibold hover:bg-yellow-600 transition duration-300 text-center block">
                            Get Quote
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Projects -->
@if($relatedProjects->count() > 0)
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center mb-12">Related Projects</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($relatedProjects as $relatedProject)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                <div class="h-48 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80')"></div>
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-2">{{ $relatedProject->title }}</h3>
                    <p class="text-gray-600 mb-4">{{ Str::limit($relatedProject->short_description, 80) }}</p>
                    <a href="{{ route('projects.show', $relatedProject) }}" class="text-primary hover:text-yellow-600 transition duration-300">View Details →</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
