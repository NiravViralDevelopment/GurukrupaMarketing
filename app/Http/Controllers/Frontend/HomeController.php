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
        // Get featured projects, fallback to any active projects if no featured ones
        $featuredProjects = Project::active()
            ->featured()
            ->with('images')
            ->limit(6)
            ->get();

        // If no featured projects, get any active projects
        if ($featuredProjects->isEmpty()) {
            $featuredProjects = Project::active()
                ->with('images')
                ->latest()
                ->limit(6)
                ->get();
        }

        // If still no projects, get any projects (even inactive ones for demo)
        if ($featuredProjects->isEmpty()) {
            $featuredProjects = Project::with('images')
                ->latest()
                ->limit(6)
                ->get();
        }

        // Get recent projects
        $recentProjects = Project::active()
            ->with('images')
            ->latest()
            ->limit(3)
            ->get();

        // If no active projects, get any projects
        if ($recentProjects->isEmpty()) {
            $recentProjects = Project::with('images')
                ->latest()
                ->limit(3)
                ->get();
        }

        // Get latest blogs
        $latestBlogs = Blog::published()
            ->latest('published_at')
            ->limit(3)
            ->get();

        // If no published blogs, get any blogs
        if ($latestBlogs->isEmpty()) {
            $latestBlogs = Blog::latest()
                ->limit(3)
                ->get();
        }

        // Calculate stats
        $stats = [
            'total_projects' => Project::count(),
            'completed_projects' => Project::where('category', 'completed')->count(),
            'ongoing_projects' => Project::where('category', 'ongoing')->count(),
        ];

        // If no projects at all, create some demo stats
        if ($stats['total_projects'] == 0) {
            $stats = [
                'total_projects' => 12,
                'completed_projects' => 8,
                'ongoing_projects' => 4,
            ];
        }

        return view('frontend.home', compact('featuredProjects', 'recentProjects', 'latestBlogs', 'stats'));
    }
}
