<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Models\Project;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function index()
    {
        $inquiries = Inquiry::with('project')
            ->latest()
            ->paginate(15);

        return view('admin.inquiries.index', compact('inquiries'));
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

    public function filter(Request $request)
    {
        $query = Inquiry::with('project');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('project_id')) {
            $query->where('project_id', $request->project_id);
        }

        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $inquiries = $query->latest()->paginate(15);
        $projects = Project::select('id', 'title')->get();

        return view('admin.inquiries.index', compact('inquiries', 'projects'));
    }
}
