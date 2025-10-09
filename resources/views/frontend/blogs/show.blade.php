@extends('layouts.app')

@section('title', $blog->title . ' - ' . ($settings['site_name'] ?? 'Gurukrupa Real Estate'))
@section('description', $blog->excerpt ?: Str::limit(strip_tags($blog->content), 160))

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-primary to-yellow-600 text-white py-20">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="flex items-center text-sm mb-4">
                <a href="{{ route('blogs.index') }}" class="hover:text-yellow-300 transition duration-300">Blog</a>
                <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span>{{ $blog->published_at ? $blog->published_at->format('M d, Y') : $blog->created_at->format('M d, Y') }}</span>
            </div>
            
            <h1 class="text-3xl md:text-5xl font-bold mb-6">{{ $blog->title }}</h1>
            
            @if($blog->excerpt)
            <p class="text-xl opacity-90">{{ $blog->excerpt }}</p>
            @endif
        </div>
    </div>
</section>

<!-- Featured Image -->
@if($blog->featured_image)
<section class="py-8 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <img src="{{ $blog->featured_image_url }}" alt="{{ $blog->title }}" class="w-full h-64 md:h-96 object-cover rounded-lg shadow-lg">
        </div>
    </div>
</section>
@endif

<!-- Blog Content -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-3">
                    <article class="prose prose-lg max-w-none">
                        <div class="text-gray-700 leading-relaxed">
                            {!! nl2br(e($blog->content)) !!}
                        </div>
                    </article>
                    
                    <!-- Tags -->
                    @if($blog->tags && count($blog->tags) > 0)
                    <div class="mt-8 pt-8 border-t border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Tags</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($blog->tags as $tag)
                            <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm hover:bg-primary hover:text-white transition duration-300">
                                {{ $tag }}
                            </span>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    
                    <!-- Share Buttons -->
                    <div class="mt-8 pt-8 border-t border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Share this article</h3>
                        <div class="flex space-x-4">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" 
                               target="_blank" 
                               class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300 flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                                Facebook
                            </a>
                            
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($blog->title) }}" 
                               target="_blank" 
                               class="bg-blue-400 text-white px-4 py-2 rounded-lg hover:bg-blue-500 transition duration-300 flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                </svg>
                                Twitter
                            </a>
                            
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->fullUrl()) }}" 
                               target="_blank" 
                               class="bg-blue-700 text-white px-4 py-2 rounded-lg hover:bg-blue-800 transition duration-300 flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                </svg>
                                LinkedIn
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <div class="sticky top-8">
                        <!-- Author Info -->
                        <div class="bg-gray-50 rounded-lg p-6 mb-8">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">About the Author</h3>
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center text-white font-semibold">
                                    GR
                                </div>
                                <div class="ml-3">
                                    <h4 class="font-semibold text-gray-900">Gurukrupa Team</h4>
                                    <p class="text-sm text-gray-600">Real Estate Experts</p>
                                </div>
                            </div>
                            <p class="text-sm text-gray-600">
                                Our team of real estate professionals brings years of experience in the industry to provide you with valuable insights and expert advice.
                            </p>
                        </div>
                        
                        <!-- Related Posts -->
                        <div class="bg-gray-50 rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Related Articles</h3>
                            <div class="space-y-4">
                                @php
                                    $relatedBlogs = \App\Models\Blog::where('id', '!=', $blog->id)
                                        ->where('status', 'published')
                                        ->latest()
                                        ->limit(3)
                                        ->get();
                                @endphp
                                
                                @if($relatedBlogs->count() > 0)
                                    @foreach($relatedBlogs as $relatedBlog)
                                    <div class="flex space-x-3">
                                        @if($relatedBlog->featured_image)
                                        <img src="{{ $relatedBlog->featured_image_url }}" alt="{{ $relatedBlog->title }}" class="w-16 h-16 object-cover rounded">
                                        @else
                                        <div class="w-16 h-16 bg-gray-200 rounded flex items-center justify-center">
                                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                            </svg>
                                        </div>
                                        @endif
                                        <div class="flex-1">
                                            <h4 class="text-sm font-semibold text-gray-900 hover:text-primary transition duration-300">
                                                <a href="{{ route('blogs.show', $relatedBlog) }}">{{ Str::limit($relatedBlog->title, 50) }}</a>
                                            </h4>
                                            <p class="text-xs text-gray-500 mt-1">
                                                {{ $relatedBlog->published_at ? $relatedBlog->published_at->format('M d, Y') : $relatedBlog->created_at->format('M d, Y') }}
                                            </p>
                                        </div>
                                    </div>
                                    @endforeach
                                @else
                                    <p class="text-sm text-gray-500">No related articles found.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Stay Updated</h2>
            <p class="text-lg text-gray-600 mb-8">Subscribe to our newsletter for more insights like this.</p>
            
            <form class="max-w-md mx-auto flex gap-4">
                <input type="email" placeholder="Enter your email" class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary">
                <button type="submit" class="bg-primary text-white px-6 py-3 rounded-lg font-semibold hover:bg-yellow-600 transition duration-300">
                    Subscribe
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
