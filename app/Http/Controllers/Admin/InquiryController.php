<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Models\Project;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function index(Request $request)
    {
        $query = Inquiry::with('project');

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('subject', 'like', "%{$search}%")
                  ->orWhere('message', 'like', "%{$search}%");
            });
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by project
        if ($request->filled('project_id')) {
            $query->where('project_id', $request->project_id);
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
        
        if (in_array($sortBy, ['name', 'email', 'status', 'created_at'])) {
            $query->orderBy($sortBy, $sortOrder);
        } else {
            $query->latest();
        }

        $inquiries = $query->paginate(15)->withQueryString();
        $projects = Project::select('id', 'title')->get();

        return view('admin.inquiries.index', compact('inquiries', 'projects'));
    }

    public function show(Inquiry $inquiry)
    {
        $inquiry->load('project');
        return view('admin.inquiries.show', compact('inquiry'));
    }

    public function markAsRead(Inquiry $inquiry)
    {
        $inquiry->markAsRead();
        
        return redirect()->back()
            ->with('success', 'Inquiry marked as read.');
    }

    public function markAsReplied(Inquiry $inquiry)
    {
        $inquiry->markAsReplied();
        
        return redirect()->back()
            ->with('success', 'Inquiry marked as replied.');
    }

    public function markAsClosed(Inquiry $inquiry)
    {
        $inquiry->markAsClosed();
        
        return redirect()->back()
            ->with('success', 'Inquiry marked as closed.');
    }

    public function destroy(Inquiry $inquiry)
    {
        $inquiry->delete();
        
        return redirect()->route('admin.inquiries.index')
            ->with('success', 'Inquiry deleted successfully.');
    }

}
