<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index(Request $request)
    {
        // Check if this is a DataTables AJAX request
        if ($request->ajax()) {
            return $this->getDataTablesData($request);
        }

        return view('admin.banners.index');
    }

    public function getDataTablesData(Request $request)
    {
        $query = Banner::query();

        // DataTables server-side processing
        $totalRecords = Banner::count();
        $filteredRecords = $totalRecords;

        // Search functionality
        if ($request->filled('search') && $request->search['value']) {
            $search = $request->search['value'];
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%");
            });
            $filteredRecords = $query->count();
        }

        // Ordering
        if ($request->filled('order')) {
            $orderColumn = $request->order[0]['column'];
            $orderDirection = $request->order[0]['dir'];
            
            $columns = ['title', 'created_at'];
            if (isset($columns[$orderColumn])) {
                $query->orderBy($columns[$orderColumn], $orderDirection);
            }
        } else {
            $query->latest();
        }

        // Pagination
        $start = $request->start ?? 0;
        $length = $request->length ?? 10;
        $banners = $query->skip($start)->take($length)->get();

        $data = [];
        foreach ($banners as $banner) {
            $data[] = [
                'title' => $banner->title,
                'image' => $banner->image,
                'image_url' => $banner->image_url,
                'created_at' => $banner->created_at->format('M d, Y'),
                'actions' => [
                    'view' => route('admin.banners.show', $banner),
                    'edit' => route('admin.banners.edit', $banner),
                    'delete' => route('admin.banners.destroy', $banner)
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
        return view('admin.banners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'title' => $request->title,
        ];

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('banners'), $filename);
            $data['image'] = $filename;
        }

        Banner::create($data);

        return redirect()->route('admin.banners.index')
            ->with('success', 'Banner created successfully.');
    }

    public function show(Banner $banner)
    {
        return view('admin.banners.show', compact('banner'));
    }

    public function edit(Banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'title' => $request->title,
        ];

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($banner->image && file_exists(public_path('banners/' . $banner->image))) {
                unlink(public_path('banners/' . $banner->image));
            }
            
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('banners'), $filename);
            $data['image'] = $filename;
        }

        $banner->update($data);

        return redirect()->route('admin.banners.index')
            ->with('success', 'Banner updated successfully.');
    }

    public function destroy(Banner $banner)
    {
        // Delete image
        if ($banner->image && file_exists(public_path('banners/' . $banner->image))) {
            unlink(public_path('banners/' . $banner->image));
        }
        
        $banner->delete();

        return redirect()->route('admin.banners.index')
            ->with('success', 'Banner deleted successfully.');
    }
}
