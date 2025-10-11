@extends('layouts.app')

@section('title', 'Projects - Gurukrupa Real Estate')
@section('description', 'Explore our portfolio of residential and commercial projects.')

@section('content')
<!-- Hero Section -->
<section class="relative h-96 bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 overflow-hidden">
    <div class="absolute inset-0 bg-black/30"></div>
    <div class="relative z-10 flex items-center justify-center h-full">
        <div class="text-center text-white px-4 max-w-4xl mx-auto">
            <div class="mb-6">
                <div class="inline-block bg-white/20 backdrop-blur-sm rounded-full px-6 py-2 mb-6">
                    <span class="text-sm font-semibold tracking-wider uppercase">Portfolio</span>
                </div>
            </div>
            <h1 class="text-5xl md:text-7xl font-bold mb-6 leading-tight">
                Our <span class="bg-gradient-to-r from-primary to-yellow-400 bg-clip-text text-transparent">Projects</span>
            </h1>
            <p class="text-xl md:text-2xl text-white/90 max-w-3xl mx-auto leading-relaxed">
                Discover our portfolio of exceptional residential and commercial developments that redefine modern living
            </p>
        </div>
    </div>
    
    <!-- Decorative elements -->
    <div class="absolute top-0 right-0 w-32 h-32 bg-primary/10 rounded-full -translate-y-16 translate-x-16"></div>
    <div class="absolute bottom-0 left-0 w-24 h-24 bg-primary/10 rounded-full translate-y-12 -translate-x-12"></div>
</section>

<!-- Filter Section -->
<section class="py-12 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-2">Filter by Category</h2>
            <p class="text-gray-600">Explore our projects by category</p>
        </div>
        <div class="flex flex-wrap justify-center gap-3">
            <a href="{{ route('projects.index') }}" 
               class="group px-6 py-3 rounded-2xl font-semibold transition-all duration-300 transform hover:-translate-y-1 {{ !request('category') ? 'bg-primary text-white shadow-lg shadow-primary/25' : 'bg-gray-100 text-gray-700 hover:bg-primary hover:text-white hover:shadow-lg hover:shadow-primary/25' }}">
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                All Projects
                </span>
            </a>
            @foreach($categories as $category)
            <a href="{{ route('projects.index', ['category' => $category->category]) }}" 
               class="group px-6 py-3 rounded-2xl font-semibold transition-all duration-300 transform hover:-translate-y-1 {{ request('category') == $category->category ? 'bg-primary text-white shadow-lg shadow-primary/25' : 'bg-gray-100 text-gray-700 hover:bg-primary hover:text-white hover:shadow-lg hover:shadow-primary/25' }}">
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                    {{ ucfirst(str_replace('_', ' ', $category->category)) }}
                    <span class="ml-2 bg-white/20 text-xs px-2 py-1 rounded-full">{{ $category->count }}</span>
                </span>
            </a>
            @endforeach
        </div>
    </div>
</section>

<!-- Projects Grid -->
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($projects->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($projects as $project)
            <div class="group bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3">
                @php
                    // Use fallback images based on project category for reliable display
                    $fallbackImages = [
                        'new_launch' => 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                        'ongoing' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                        'completed' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
                    ];
                    $projectImage = $fallbackImages[$project->category] ?? $fallbackImages['new_launch'];
                @endphp
                <div class="aspect-[4/3] bg-cover bg-center relative overflow-hidden" 
                     style="background-image: url('{{ $projectImage }}')">
                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                    
                    <!-- Category Badge -->
                    <div class="absolute top-6 left-6">
                        <span class="bg-primary text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg">
                            {{ ucfirst(str_replace('_', ' ', $project->category)) }}
                        </span>
                    </div>
                    
                    <!-- Featured Badge -->
                    @if($project->is_featured)
                    <div class="absolute top-6 right-6">
                        <span class="bg-yellow-500 text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            Featured
                        </span>
                    </div>
                    @endif
                    
                    <!-- Hover Overlay -->
                    <div class="absolute inset-0 bg-primary/90 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <a href="{{ route('projects.show', $project) }}" 
                           class="bg-white text-primary px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition-colors duration-300 transform hover:scale-105">
                            View Project
                        </a>
                    </div>
                </div>
                
                <div class="p-8">
                    <h3 class="text-2xl font-bold mb-3 text-gray-900 group-hover:text-primary transition-colors duration-300">
                        {{ $project->title }}
                    </h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        {{ Str::limit($project->short_description, 120) }}
                    </p>
                    
                    <!-- Project Details -->
                    <div class="space-y-4 mb-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2 text-gray-500">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span class="font-medium">{{ $project->location }}</span>
                            </div>
                        @if($project->price)
                            <span class="text-primary font-bold text-lg">₹{{ number_format($project->price / 100000, 1) }}L</span>
                        @endif
                    </div>
                        
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2 text-gray-500">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path>
                                </svg>
                                <span class="font-medium">{{ $project->area }}</span>
                            </div>
                            <div class="flex items-center space-x-2 text-gray-500">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span class="font-medium">{{ $project->created_at->format('M Y') }}</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Action Button -->
                    <a href="{{ route('projects.show', $project) }}" 
                       class="group/btn w-full bg-primary text-white py-3 rounded-2xl font-semibold hover:bg-yellow-600 transition-all duration-300 flex items-center justify-center transform hover:scale-105">
                        <span>View Details</span>
                        <svg class="w-5 h-5 ml-2 group-hover/btn:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Pagination -->
        <div class="mt-16">
            <div class="flex justify-center">
            {{ $projects->links() }}
            </div>
        </div>
        @else
        <div class="text-center py-24">
            <div class="w-32 h-32 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-8">
                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
            </div>
            <h3 class="text-3xl font-bold text-gray-700 mb-4">No Projects Found</h3>
            <p class="text-xl text-gray-500 mb-8 max-w-md mx-auto">We're working on adding more amazing projects. Please check back soon!</p>
            <a href="{{ route('contact') }}" 
               class="inline-flex items-center bg-primary text-white px-8 py-3 rounded-2xl font-semibold hover:bg-yellow-600 transition-all duration-300">
                <span>Get Notified</span>
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div>
        @endif
    </div>
</section>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add smooth animations to project cards
    const projectCards = document.querySelectorAll('.group');
    
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }, index * 100);
            }
        });
    }, observerOptions);
    
    projectCards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'all 0.6s ease';
        observer.observe(card);
    });
});
</script>
@endpush
@endsection
