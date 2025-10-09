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
        // Check if this is a DataTables AJAX request
        if ($request->ajax()) {
            return $this->getDataTablesData($request);
        }

        $projects = Project::select('id', 'title')->get();
        return view('admin.inquiries.index', compact('projects'));
    }

    public function getDataTablesData(Request $request)
    {
        $query = Inquiry::with('project');

        // DataTables server-side processing
        $totalRecords = Inquiry::count();
        $filteredRecords = $totalRecords;

        // Apply custom filters first
        $this->applyFilters($query, $request);

        // DataTables search functionality
        if ($request->filled('search') && $request->search['value']) {
            $search = $request->search['value'];
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('subject', 'like', "%{$search}%")
                  ->orWhere('message', 'like', "%{$search}%");
            });
            $filteredRecords = $query->count();
        }

        // Ordering
        if ($request->filled('order')) {
            $orderColumn = $request->order[0]['column'];
            $orderDirection = $request->order[0]['dir'];
            
            $columns = ['name', 'email', 'phone', 'subject', 'status', 'created_at'];
            if (isset($columns[$orderColumn])) {
                $query->orderBy($columns[$orderColumn], $orderDirection);
            }
        } else {
            $query->latest();
        }

        // Pagination
        $start = $request->start ?? 0;
        $length = $request->length ?? 10;
        $inquiries = $query->skip($start)->take($length)->get();

        $data = [];
        foreach ($inquiries as $inquiry) {
            $data[] = [
                'name' => $inquiry->name,
                'email' => $inquiry->email,
                'phone' => $inquiry->phone ?? 'N/A',
                'subject' => $inquiry->subject,
                'status' => $inquiry->status,
                'created_at' => $inquiry->created_at->format('M d, Y'),
                'actions' => [
                    'view' => route('admin.inquiries.show', $inquiry),
                    'mark_read' => $inquiry->status === 'new' ? route('admin.inquiries.mark-read', $inquiry) : null,
                    'mark_replied' => $inquiry->status === 'read' ? route('admin.inquiries.mark-replied', $inquiry) : null,
                    'mark_closed' => $inquiry->status !== 'closed' ? route('admin.inquiries.mark-closed', $inquiry) : null,
                    'delete' => route('admin.inquiries.destroy', $inquiry)
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

    private function applyFilters($query, $request)
    {
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
