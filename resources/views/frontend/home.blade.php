@extends('layouts.app')

@section('title', 'Home - Gurukrupa Real Estate')
@section('description', 'Leading real estate developer specializing in premium residential and commercial projects.')

@section('content')
<!-- Hero Section with Project Showcase -->
<section class="relative h-screen overflow-hidden">
    <!-- Background Image Carousel -->
    <div class="absolute inset-0">
        @php
            // Always use fallback images for now to ensure they display
            $heroImages = [
                'https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80',
                'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80',
                'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80'
            ];
        @endphp
        
        @foreach($heroImages as $index => $imageUrl)
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat transition-opacity duration-1000 {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}" 
             style="background-image: url('{{ $imageUrl }}')" 
             id="hero-slide-{{ $index }}">
        </div>
        @endforeach
        
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>
    </div>
    
    <!-- Hero Content -->
    <div class="relative z-10 flex items-center justify-center h-full">
        <div class="text-center text-white px-4 max-w-6xl mx-auto">
            <div class="mb-8">
                <div class="inline-block bg-white/20 backdrop-blur-sm rounded-full px-6 py-2 mb-6">
                    <span class="text-sm font-semibold tracking-wider uppercase">Premium Real Estate Development</span>
                </div>
            </div>
            <h1 class="text-6xl md:text-8xl font-bold mb-6 leading-tight">
                <span class="block">Building</span>
                <span class="block bg-gradient-to-r from-primary to-yellow-400 bg-clip-text text-transparent">Dreams</span>
            </h1>
            <p class="text-xl md:text-2xl mb-12 max-w-4xl mx-auto leading-relaxed text-white/90">
                Creating exceptional residential and commercial spaces that define modern living and business excellence. 
                Experience luxury, innovation, and quality in every project.
            </p>
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                <a href="{{ route('projects.index') }}" 
                   class="group bg-primary text-white px-10 py-4 rounded-2xl text-lg font-semibold hover:bg-yellow-600 transition-all duration-300 shadow-2xl hover:shadow-primary/25 transform hover:-translate-y-1">
                    <span class="flex items-center">
                        Explore Projects
                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </span>
                </a>
                <a href="{{ route('contact') }}" 
                   class="group border-2 border-white/30 backdrop-blur-sm text-white px-10 py-4 rounded-2xl text-lg font-semibold hover:bg-white hover:text-gray-900 transition-all duration-300">
                    <span class="flex items-center">
                        Get Quote
                        <svg class="w-5 h-5 ml-2 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                    </span>
                </a>
            </div>
        </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-10">
        <div class="animate-bounce">
            <svg class="w-6 h-6 text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Who We Are</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Gurukrupa Real Estate is a leading developer with over two decades of experience in creating exceptional residential and commercial properties. We are committed to delivering quality, innovation, and customer satisfaction in every project.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="bg-primary w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">Quality Construction</h3>
                <p class="text-gray-600">We use premium materials and follow strict quality standards to ensure lasting value.</p>
            </div>
            
            <div class="text-center">
                <div class="bg-primary w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">Innovation</h3>
                <p class="text-gray-600">We embrace modern technology and sustainable practices in all our developments.</p>
            </div>
            
            <div class="text-center">
                <div class="bg-primary w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">Customer Focus</h3>
                <p class="text-gray-600">Your satisfaction is our priority, and we work closely with you throughout the process.</p>
            </div>
        </div>
    </div>
</section>

<!-- Featured Projects Showcase -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <div class="inline-block bg-primary/10 rounded-full px-6 py-2 mb-6">
                <span class="text-primary font-semibold text-sm uppercase tracking-wider">Our Portfolio</span>
            </div>
            <h2 class="text-5xl md:text-6xl font-bold text-gray-900 mb-6">Featured Projects</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                Discover our latest and most prestigious developments that redefine modern living and business excellence
            </p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-16">
            @if($featuredProjects->count() > 0)
                @foreach($featuredProjects->take(2) as $index => $project)
            <div class="group relative overflow-hidden rounded-3xl shadow-2xl hover:shadow-3xl transition-all duration-700 transform hover:-translate-y-2">
                @php
                    // Use fallback images based on project category for reliable display
                    $fallbackImages = [
                        'new_launch' => 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                        'ongoing' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                        'completed' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
                    ];
                    $projectImage = $fallbackImages[$project->category] ?? $fallbackImages['new_launch'];
                @endphp
                <div class="aspect-[4/3] bg-cover bg-center transition-transform duration-700 group-hover:scale-110" 
                     style="background-image: url('{{ $projectImage }}')">
                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                    
                    <!-- Category Badge -->
                    <div class="absolute top-6 left-6">
                        <span class="bg-primary text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg">
                            {{ ucfirst(str_replace('_', ' ', $project->category)) }}
                        </span>
                    </div>
                    
                    <!-- Content -->
                    <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
                        <h3 class="text-3xl font-bold mb-3 group-hover:text-primary transition-colors duration-300">
                            {{ $project->title }}
                        </h3>
                        <p class="text-white/90 mb-4 text-lg leading-relaxed">
                            {{ Str::limit($project->short_description, 120) }}
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span class="font-semibold">{{ $project->location }}</span>
                            </div>
                            <a href="{{ route('projects.show', $project) }}" 
                               class="group/btn bg-white text-gray-900 px-6 py-3 rounded-full font-semibold hover:bg-primary hover:text-white transition-all duration-300 transform hover:scale-105 shadow-lg">
                                <span class="flex items-center">
                                    View Details
                                    <svg class="w-4 h-4 ml-2 group-hover/btn:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
                @endforeach
            @else
                <!-- Demo Projects when no real projects exist -->
                <div class="group relative overflow-hidden rounded-3xl shadow-2xl hover:shadow-3xl transition-all duration-700 transform hover:-translate-y-2">
                    <div class="aspect-[4/3] bg-cover bg-center transition-transform duration-700 group-hover:scale-110" 
                         style="background-image: url('https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80')">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                        <div class="absolute top-6 left-6">
                            <span class="bg-primary text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg">
                                New Launch
                            </span>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
                            <h3 class="text-3xl font-bold mb-3 group-hover:text-primary transition-colors duration-300">
                                Luxury Residential Complex
                            </h3>
                            <p class="text-white/90 mb-4 text-lg leading-relaxed">
                                Experience modern living in our premium residential development with world-class amenities and contemporary design.
                            </p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span class="font-semibold">Mumbai, Maharashtra</span>
                                </div>
                                <a href="{{ route('contact') }}" 
                                   class="group/btn bg-white text-gray-900 px-6 py-3 rounded-full font-semibold hover:bg-primary hover:text-white transition-all duration-300 transform hover:scale-105 shadow-lg">
                                    <span class="flex items-center">
                                        Get Details
                                        <svg class="w-4 h-4 ml-2 group-hover/btn:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="group relative overflow-hidden rounded-3xl shadow-2xl hover:shadow-3xl transition-all duration-700 transform hover:-translate-y-2">
                    <div class="aspect-[4/3] bg-cover bg-center transition-transform duration-700 group-hover:scale-110" 
                         style="background-image: url('https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80')">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                        <div class="absolute top-6 left-6">
                            <span class="bg-primary text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg">
                                Ongoing
                            </span>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
                            <h3 class="text-3xl font-bold mb-3 group-hover:text-primary transition-colors duration-300">
                                Commercial Business Park
                            </h3>
                            <p class="text-white/90 mb-4 text-lg leading-relaxed">
                                State-of-the-art commercial development designed for modern businesses with premium office spaces and facilities.
                            </p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span class="font-semibold">Delhi, NCR</span>
                                </div>
                                <a href="{{ route('contact') }}" 
                                   class="group/btn bg-white text-gray-900 px-6 py-3 rounded-full font-semibold hover:bg-primary hover:text-white transition-all duration-300 transform hover:scale-105 shadow-lg">
                                    <span class="flex items-center">
                                        Get Details
                                        <svg class="w-4 h-4 ml-2 group-hover/btn:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        
        <!-- Additional Projects Grid -->
        @if($featuredProjects->count() > 2)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
            @foreach($featuredProjects->skip(2)->take(3) as $project)
            <div class="group bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3">
                @php
                    // Use fallback images based on project category for reliable display
                    $fallbackImages = [
                        'new_launch' => 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                        'ongoing' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                        'completed' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80'
                    ];
                    $projectImage = $fallbackImages[$project->category] ?? $fallbackImages['new_launch'];
                @endphp
                <div class="aspect-[4/3] bg-cover bg-center transition-transform duration-500 group-hover:scale-110" 
                     style="background-image: url('{{ $projectImage }}')">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    <div class="absolute top-4 left-4">
                        <span class="bg-primary text-white px-3 py-1 rounded-full text-xs font-semibold">
                        {{ ucfirst(str_replace('_', ' ', $project->category)) }}
                        </span>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-3 text-gray-900 group-hover:text-primary transition-colors duration-300">
                        {{ $project->title }}
                    </h3>
                    <p class="text-gray-600 mb-4 leading-relaxed">
                        {{ Str::limit($project->short_description, 100) }}
                    </p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2 text-gray-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="text-sm font-medium">{{ $project->location }}</span>
                        </div>
                        <a href="{{ route('projects.show', $project) }}" 
                           class="text-primary hover:text-yellow-600 font-semibold transition-colors duration-300 flex items-center">
                            View Details
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
        
        <div class="text-center">
            <a href="{{ route('projects.index') }}" 
               class="group inline-flex items-center bg-primary text-white px-10 py-4 rounded-2xl text-lg font-semibold hover:bg-yellow-600 transition-all duration-300 shadow-2xl hover:shadow-primary/25 transform hover:-translate-y-1">
                <span>View All Projects</span>
                <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-24 bg-gradient-to-br from-primary via-yellow-500 to-yellow-600 relative overflow-hidden">
    <div class="absolute inset-0 bg-black/10"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-4">Our Achievements</h2>
            <p class="text-xl text-white/90 max-w-2xl mx-auto">Numbers that speak for our commitment to excellence</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center text-white">
            <div class="group">
                <div class="bg-white/20 backdrop-blur-sm rounded-3xl p-8 hover:bg-white/30 transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <div class="text-5xl md:text-6xl font-bold mb-3 counter" data-target="{{ $stats['total_projects'] }}">0</div>
                    <div class="text-xl font-semibold">Projects Completed</div>
                </div>
            </div>
            
            <div class="group">
                <div class="bg-white/20 backdrop-blur-sm rounded-3xl p-8 hover:bg-white/30 transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <div class="text-5xl md:text-6xl font-bold mb-3 counter" data-target="{{ $stats['completed_projects'] }}">0</div>
                    <div class="text-xl font-semibold">Happy Customers</div>
                </div>
            </div>
            
            <div class="group">
                <div class="bg-white/20 backdrop-blur-sm rounded-3xl p-8 hover:bg-white/30 transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
            </div>
                    <div class="text-5xl md:text-6xl font-bold mb-3 counter" data-target="{{ $stats['ongoing_projects'] }}">0</div>
                    <div class="text-xl font-semibold">Ongoing Projects</div>
            </div>
            </div>
        </div>
    </div>
    
    <!-- Decorative elements -->
    <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -translate-y-16 translate-x-16"></div>
    <div class="absolute bottom-0 left-0 w-24 h-24 bg-white/10 rounded-full translate-y-12 -translate-x-12"></div>
</section>

<!-- Latest News -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Latest News</h2>
            <p class="text-xl text-gray-600">Stay updated with our latest news and insights</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($latestBlogs as $blog)
            <article class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                <div class="h-48 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80')"></div>
                <div class="p-6">
                    <div class="text-sm text-gray-500 mb-2">{{ $blog->published_at->format('M d, Y') }}</div>
                    <h3 class="text-xl font-semibold mb-2">{{ $blog->title }}</h3>
                    <p class="text-gray-600 mb-4">{{ Str::limit($blog->excerpt, 100) }}</p>
                    <a href="{{ route('blogs.show', $blog) }}" class="text-primary hover:text-yellow-600 transition duration-300">Read More →</a>
                </div>
            </article>
            @endforeach
        </div>
        
        <div class="text-center mt-12">
            <a href="{{ route('blogs.index') }}" class="bg-primary text-white px-8 py-3 rounded-lg text-lg font-semibold hover:bg-yellow-600 transition duration-300">View All News</a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white relative overflow-hidden">
    <div class="absolute inset-0 bg-black/20"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-5xl md:text-6xl font-bold mb-6">Ready to Start Your Project?</h2>
            <p class="text-xl md:text-2xl mb-12 max-w-3xl mx-auto leading-relaxed text-white/90">
                Get in touch with us today and let's discuss how we can bring your vision to life with our expertise and commitment to excellence.
            </p>
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                <a href="{{ route('contact') }}" 
                   class="group bg-primary text-white px-10 py-4 rounded-2xl text-lg font-semibold hover:bg-yellow-600 transition-all duration-300 shadow-2xl hover:shadow-primary/25 transform hover:-translate-y-1">
                    <span class="flex items-center">
                        Contact Us Today
                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </span>
                </a>
                <a href="{{ route('projects.index') }}" 
                   class="group border-2 border-white/30 backdrop-blur-sm text-white px-10 py-4 rounded-2xl text-lg font-semibold hover:bg-white hover:text-gray-900 transition-all duration-300">
                    <span class="flex items-center">
                        View Our Work
                        <svg class="w-5 h-5 ml-2 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </span>
                </a>
            </div>
        </div>
    </div>
    
    <!-- Decorative elements -->
    <div class="absolute top-0 right-0 w-40 h-40 bg-primary/10 rounded-full -translate-y-20 translate-x-20"></div>
    <div class="absolute bottom-0 left-0 w-32 h-32 bg-primary/10 rounded-full translate-y-16 -translate-x-16"></div>
</section>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Hero Image Carousel
    const slides = document.querySelectorAll('[id^="hero-slide-"]');
    let currentSlide = 0;
    
    if (slides.length > 1) {
        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.style.opacity = i === index ? '1' : '0';
            });
        }
        
        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }
        
        // Auto-advance slides every 5 seconds
        setInterval(nextSlide, 5000);
    }
    
    // Counter Animation
    const counters = document.querySelectorAll('.counter');
    const speed = 200; // The lower the slower
    
    const animateCounter = (counter) => {
        const target = +counter.getAttribute('data-target');
        const count = +counter.innerText;
        const inc = target / speed;
        
        if (count < target) {
            counter.innerText = Math.ceil(count + inc);
            setTimeout(() => animateCounter(counter), 1);
        } else {
            counter.innerText = target;
        }
    };
    
    // Intersection Observer for counter animation
    const observerOptions = {
        threshold: 0.7,
        rootMargin: '0px 0px -100px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                animateCounter(counter);
                observer.unobserve(counter);
            }
        });
    }, observerOptions);
    
    counters.forEach(counter => {
        observer.observe(counter);
    });
    
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Parallax effect for hero section
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const hero = document.querySelector('section');
        if (hero) {
            hero.style.transform = `translateY(${scrolled * 0.5}px)`;
        }
    });
});
</script>
@endpush
@endsection
