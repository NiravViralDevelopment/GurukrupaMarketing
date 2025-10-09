<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::active()->with('images');

        // Filter by category
        if ($request->filled('category')) {
            $query->category($request->category);
        }

        // Filter by location
        if ($request->filled('location')) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }

        $projects = $query->latest()->paginate(12);

        $categories = Project::active()
            ->selectRaw('category, COUNT(*) as count')
            ->groupBy('category')
            ->get();

        return view('frontend.projects.index', compact('projects', 'categories'));
    }

    public function show(Project $project)
    {
        if (!$project->is_active) {
            abort(404);
        }

        $project->load('images');
        
        $relatedProjects = Project::active()
            ->where('id', '!=', $project->id)
            ->where('category', $project->category)
            ->with('images')
            ->limit(4)
            ->get();

        return view('frontend.projects.show', compact('project', 'relatedProjects'));
    }
}
