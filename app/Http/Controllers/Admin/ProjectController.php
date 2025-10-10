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
        // Check if this is a DataTables AJAX request
        if ($request->ajax()) {
            return $this->getDataTablesData($request);
        }

        return view('admin.projects.index');
    }

    public function getDataTablesData(Request $request)
    {
        $query = Project::with('images');

        // DataTables server-side processing
        $totalRecords = Project::count();
        $filteredRecords = $totalRecords;

        // DataTables search functionality
        if ($request->filled('search') && $request->search['value']) {
            $search = $request->search['value'];
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('short_description', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%")
                  ->orWhere('area', 'like', "%{$search}%");
            });
            $filteredRecords = $query->count();
        }

        // Ordering
        if ($request->filled('order')) {
            $orderColumn = $request->order[0]['column'];
            $orderDirection = $request->order[0]['dir'];
            
            $columns = ['title', 'location', 'category', 'price', 'is_active', 'created_at'];
            if (isset($columns[$orderColumn])) {
                $query->orderBy($columns[$orderColumn], $orderDirection);
            }
        } else {
            $query->latest();
        }

        // Pagination
        $start = $request->start ?? 0;
        $length = $request->length ?? 10;
        $projects = $query->skip($start)->take($length)->get();

        $data = [];
        foreach ($projects as $project) {
            $data[] = [
                'title' => $project->title,
                'short_description' => Str::limit($project->short_description, 40),
                'location' => $project->location,
                'category' => $project->category,
                'price' => $project->price,
                'is_active' => $project->is_active,
                'is_featured' => $project->is_featured,
                'created_at' => $project->created_at->format('M d, Y'),
                'image_url' => $project->images->count() > 0 ? $project->images->first()->image_url : null,
                'actions' => [
                    'view' => route('admin.projects.show', $project),
                    'edit' => route('admin.projects.edit', $project),
                    'delete' => route('admin.projects.destroy', $project)
                ]
            ];
        }

        return response()->json([
            'draw' => intval($request->draw),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $filteredRecords,
            'data' => $data
        ]);
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
            'brochure' => 'nullable|file|mimes:pdf|max:10240', // 10MB max for PDF
        ]);

        $projectData = [
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
        ];

        // Handle brochure upload
        if ($request->hasFile('brochure')) {
            $brochureFile = $request->file('brochure');
            $brochureFilename = time() . '_' . $brochureFile->getClientOriginalName();
            $brochurePath = public_path('project/brochure');
            
            // Create directory if it doesn't exist
            if (!file_exists($brochurePath)) {
                mkdir($brochurePath, 0755, true);
            }
            
            $brochureFile->move($brochurePath, $brochureFilename);
            $projectData['brochure'] = $brochureFilename;
        }

        $project = Project::create($projectData);

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
            'brochure' => 'nullable|file|mimes:pdf|max:10240', // 10MB max for PDF
        ]);

        $projectData = [
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
        ];

        // Handle brochure upload
        if ($request->hasFile('brochure')) {
            // Delete old brochure if exists
            if ($project->brochure && file_exists(public_path('project/brochure/' . $project->brochure))) {
                unlink(public_path('project/brochure/' . $project->brochure));
            }
            
            $brochureFile = $request->file('brochure');
            $brochureFilename = time() . '_' . $brochureFile->getClientOriginalName();
            $brochurePath = public_path('project/brochure');
            
            // Create directory if it doesn't exist
            if (!file_exists($brochurePath)) {
                mkdir($brochurePath, 0755, true);
            }
            
            $brochureFile->move($brochurePath, $brochureFilename);
            $projectData['brochure'] = $brochureFilename;
        }

        $project->update($projectData);

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
        
        // Delete brochure file
        if ($project->brochure && file_exists(public_path('project/brochure/' . $project->brochure))) {
            unlink(public_path('project/brochure/' . $project->brochure));
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
