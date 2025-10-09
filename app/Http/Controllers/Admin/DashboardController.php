<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Inquiry;
use App\Models\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_projects' => Project::count(),
            'active_projects' => Project::where('is_active', true)->count(),
            'total_blogs' => Blog::count(),
            'published_blogs' => Blog::where('status', 'published')->count(),
            'total_inquiries' => Inquiry::count(),
            'new_inquiries' => Inquiry::where('status', 'new')->count(),
        ];

        $recent_inquiries = Inquiry::with('project')
            ->latest()
            ->limit(5)
            ->get();

        $recent_projects = Project::latest()
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recent_inquiries', 'recent_projects'));
    }
}
