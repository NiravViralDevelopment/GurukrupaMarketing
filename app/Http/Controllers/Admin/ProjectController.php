<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::with('images');

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('short_description', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%")
                  ->orWhere('area', 'like', "%{$search}%");
            });
        }

        // Filter by category
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Filter by status (active/inactive)
        if ($request->filled('status')) {
            $query->where('is_active', $request->status === 'active');
        }

        // Filter by featured
        if ($request->filled('featured')) {
            $query->where('is_featured', $request->featured === 'yes');
        }

        // Filter by price range
        if ($request->filled('price_min')) {
            $query->where('price', '>=', $request->price_min);
        }

        if ($request->filled('price_max')) {
            $query->where('price', '<=', $request->price_max);
        }

        // Filter by date range
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        // Sort functionality
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');
        
        if (in_array($sortBy, ['title', 'category', 'location', 'price', 'created_at'])) {
            $query->orderBy($sortBy, $sortOrder);
        } else {
            $query->latest();
        }

        $projects = $query->paginate(10)->withQueryString();

        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'short_description' => 'nullable|string|max:500',
            'category' => 'required|in:new_launch,ongoing,completed',
            'location' => 'required|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after:start_date',
            'area' => 'nullable|string|max:100',
            'price' => 'nullable|numeric|min:0',
            'features' => 'nullable|array',
            'map_lat' => 'nullable|numeric',
            'map_lng' => 'nullable|numeric',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $project = Project::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'short_description' => $request->short_description,
            'category' => $request->category,
            'location' => $request->location,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'area' => $request->area,
            'price' => $request->price,
            'features' => $request->features,
            'map_lat' => $request->map_lat,
            'map_lng' => $request->map_lng,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'is_featured' => $request->boolean('is_featured'),
            'is_active' => $request->boolean('is_active'),
        ]);

        // Handle image uploads
        if ($request->hasFile('images')) {
            // Create projects directory in public folder if it doesn't exist
            $publicPath = public_path('projects');
            if (!file_exists($publicPath)) {
                mkdir($publicPath, 0755, true);
            }
            
            foreach ($request->file('images') as $index => $image) {
                // Generate unique filename
                $filename = time() . '_' . $index . '.' . $image->getClientOriginalExtension();
                $path = 'projects/' . $filename;
                
                // Move file to public/projects directory
                $image->move($publicPath, $filename);
                
                ProjectImage::create([
                    'project_id' => $project->id,
                    'image_path' => $path,
                    'alt_text' => $request->input('alt_text.' . $index),
                    'is_primary' => $index === 0,
                    'sort_order' => $index,
                ]);
            }
        }

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project created successfully.');
    }

    public function show(Project $project)
    {
        $project->load('images');
        return view('admin.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $project->load('images');
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'short_description' => 'nullable|string|max:500',
            'category' => 'required|in:new_launch,ongoing,completed',
            'location' => 'required|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after:start_date',
            'area' => 'nullable|string|max:100',
            'price' => 'nullable|numeric|min:0',
            'features' => 'nullable|array',
            'map_lat' => 'nullable|numeric',
            'map_lng' => 'nullable|numeric',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $project->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'short_description' => $request->short_description,
            'category' => $request->category,
            'location' => $request->location,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'area' => $request->area,
            'price' => $request->price,
            'features' => $request->features,
            'map_lat' => $request->map_lat,
            'map_lng' => $request->map_lng,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'is_featured' => $request->boolean('is_featured'),
            'is_active' => $request->boolean('is_active'),
        ]);

        // Handle new image uploads
        if ($request->hasFile('images')) {
            // Create projects directory in public folder if it doesn't exist
            $publicPath = public_path('projects');
            if (!file_exists($publicPath)) {
                mkdir($publicPath, 0755, true);
            }
            
            foreach ($request->file('images') as $index => $image) {
                // Generate unique filename
                $filename = time() . '_' . $index . '.' . $image->getClientOriginalExtension();
                $path = 'projects/' . $filename;
                
                // Move file to public/projects directory
                $image->move($publicPath, $filename);
                
                ProjectImage::create([
                    'project_id' => $project->id,
                    'image_path' => $path,
                    'alt_text' => $request->input('alt_text.' . $index),
                    'is_primary' => false,
                    'sort_order' => $project->images()->count() + $index,
                ]);
            }
        }

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        // Delete associated images
        foreach ($project->images as $image) {
            $imagePath = public_path($image->image_path);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        
        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project deleted successfully.');
    }

    public function deleteImage(ProjectImage $image)
    {
        $imagePath = public_path($image->image_path);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $image->delete();

        return response()->json(['success' => true]);
    }
}
