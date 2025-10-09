<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Project;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProjects = Project::active()
            ->featured()
            ->with('images')
            ->limit(6)
            ->get();

        $recentProjects = Project::active()
            ->with('images')
            ->latest()
            ->limit(3)
            ->get();

        $latestBlogs = Blog::published()
            ->latest('published_at')
            ->limit(3)
            ->get();

        $stats = [
            'total_projects' => Project::active()->count(),
            'completed_projects' => Project::active()->category('completed')->count(),
            'ongoing_projects' => Project::active()->category('ongoing')->count(),
        ];

        return view('frontend.home', compact('featuredProjects', 'recentProjects', 'latestBlogs', 'stats'));
    }
}
