@extends('layouts.app')

@section('title', 'Projects - Gurukrupa Real Estate')
@section('description', 'Explore our portfolio of residential and commercial projects.')

@section('content')
<!-- Hero Section -->
<section class="bg-gray-900 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-5xl font-bold mb-4">Our Projects</h1>
        <p class="text-xl text-gray-300">Discover our portfolio of exceptional residential and commercial developments</p>
    </div>
</section>

<!-- Filter Section -->
<section class="py-8 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('projects.index') }}" class="px-6 py-2 rounded-lg {{ !request('category') ? 'bg-primary text-white' : 'bg-white text-gray-700 hover:bg-gray-100' }} transition duration-300">
                All Projects
            </a>
            @foreach($categories as $category)
            <a href="{{ route('projects.index', ['category' => $category->category]) }}" class="px-6 py-2 rounded-lg {{ request('category') == $category->category ? 'bg-primary text-white' : 'bg-white text-gray-700 hover:bg-gray-100' }} transition duration-300">
                {{ ucfirst(str_replace('_', ' ', $category->category)) }} ({{ $category->count }})
            </a>
            @endforeach
        </div>
    </div>
</section>

<!-- Projects Grid -->
<section class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($projects->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($projects as $project)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                <div class="h-64 bg-cover bg-center relative" style="background-image: url('https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80')">
                    <div class="absolute top-4 left-4">
                        <span class="bg-primary text-white px-3 py-1 rounded text-sm">
                            {{ ucfirst(str_replace('_', ' ', $project->category)) }}
                        </span>
                    </div>
                    @if($project->is_featured)
                    <div class="absolute top-4 right-4">
                        <span class="bg-yellow-500 text-white px-3 py-1 rounded text-sm">Featured</span>
                    </div>
                    @endif
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2">{{ $project->title }}</h3>
                    <p class="text-gray-600 mb-4">{{ Str::limit($project->short_description, 100) }}</p>
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-primary font-semibold">{{ $project->location }}</span>
                        @if($project->price)
                        <span class="text-gray-700 font-semibold">₹{{ number_format($project->price / 100000, 1) }}L</span>
                        @endif
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">{{ $project->area }}</span>
                        <a href="{{ route('projects.show', $project) }}" class="text-primary hover:text-yellow-600 transition duration-300 font-semibold">View Details →</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Pagination -->
        <div class="mt-12">
            {{ $projects->links() }}
        </div>
        @else
        <div class="text-center py-20">
            <div class="text-gray-400 mb-4">
                <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-700 mb-2">No Projects Found</h3>
            <p class="text-gray-500">We're working on adding more projects. Please check back soon!</p>
        </div>
        @endif
    </div>
</section>
@endsection
