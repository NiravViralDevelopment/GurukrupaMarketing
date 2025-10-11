<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        // Try to get active projects first, fallback to all projects if none are active
        $query = Project::active()->with('images');
        
        // If no active projects, get all projects
        if ($query->count() == 0) {
            $query = Project::with('images');
        }

        // Filter by category
        if ($request->filled('category')) {
            $query->category($request->category);
        }

        // Filter by location
        if ($request->filled('location')) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }

        $projects = $query->latest()->paginate(12);

        // Get categories from all projects (not just active ones)
        $categories = Project::selectRaw('category, COUNT(*) as count')
            ->groupBy('category')
            ->get();

        return view('frontend.projects.index', compact('projects', 'categories'));
    }

    public function show(Project $project)
    {
        $project->load('images');
        
        // Get related projects (try active first, fallback to all)
        $relatedQuery = Project::active()
            ->where('id', '!=', $project->id)
            ->where('category', $project->category)
            ->with('images');
            
        // If no active related projects, get all related projects
        if ($relatedQuery->count() == 0) {
            $relatedQuery = Project::where('id', '!=', $project->id)
                ->where('category', $project->category)
                ->with('images');
        }
        
        $relatedProjects = $relatedQuery->limit(4)->get();

        return view('frontend.projects.show', compact('project', 'relatedProjects'));
    }
}
