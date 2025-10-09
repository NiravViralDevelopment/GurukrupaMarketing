<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Setting;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $settings = Setting::getAll();
        $blogs = Blog::where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->paginate(9);
            
        return view('frontend.blogs.index', compact('blogs', 'settings'));
    }

    public function show(Blog $blog)
    {
        $settings = Setting::getAll();
        
        // Increment view count
        $blog->increment('views_count');
        
        return view('frontend.blogs.show', compact('blog', 'settings'));
    }
}