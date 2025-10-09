@extends('layouts.admin')

@section('title', 'Inquiry Management')
@section('page-title', 'Customer Inquiries')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-900">Customer Inquiries</h2>
</div>

<!-- Search and Filter Section -->
<div class="bg-white rounded-lg shadow p-6 mb-6">
    <form id="filterForm" class="space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Status Filter -->
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select id="status" name="status" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    <option value="">All Status</option>
                    <option value="new">New</option>
                    <option value="read">Read</option>
                    <option value="replied">Replied</option>
                    <option value="closed">Closed</option>
                </select>
            </div>

            <!-- Project Filter -->
            <div>
                <label for="project_id" class="block text-sm font-medium text-gray-700 mb-1">Project</label>
                <select id="project_id" name="project_id" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    <option value="">All Projects</option>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Date From -->
            <div>
                <label for="date_from" class="block text-sm font-medium text-gray-700 mb-1">Date From</label>
                <input type="date" 
                       id="date_from" 
                       name="date_from" 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
            </div>

            <!-- Date To -->
            <div>
                <label for="date_to" class="block text-sm font-medium text-gray-700 mb-1">Date To</label>
                <input type="date" 
                       id="date_to" 
                       name="date_to" 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
            </div>
        </div>

        <div class="flex justify-between items-center">
            <div class="flex space-x-2">
                <button type="button" id="applyFilters" class="bg-primary text-white px-6 py-2 rounded-lg hover:bg-yellow-600 transition duration-300 flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    Apply Filters
                </button>
                <button type="button" id="clearFilters" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition duration-300 flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                    Clear Filters
                </button>
            </div>
        </div>
    </form>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table id="inquiriesTable" class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subject</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <!-- Data will be loaded via DataTables AJAX -->
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
<style>
/* Custom DataTables Styling */
.dataTables_wrapper {
    font-family: inherit;
}

.dataTables_wrapper .dataTables_length,
.dataTables_wrapper .dataTables_filter,
.dataTables_wrapper .dataTables_info,
.dataTables_wrapper .dataTables_processing,
.dataTables_wrapper .dataTables_paginate {
    color: #374151;
    font-size: 14px;
}

.dataTables_wrapper .dataTables_length select,
.dataTables_wrapper .dataTables_filter input {
    border: 1px solid #d1d5db;
    border-radius: 0.375rem;
    padding: 0.5rem;
    font-size: 14px;
    background-color: white;
}

.dataTables_wrapper .dataTables_length select:focus,
.dataTables_wrapper .dataTables_filter input:focus {
    outline: none;
    border-color: #D4AF37;
    box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1);
}

.dataTables_wrapper .dataTables_paginate .paginate_button {
    color: #374151 !important;
    border: 1px solid #d1d5db;
    border-radius: 0.375rem;
    padding: 0.5rem 0.75rem;
    margin: 0 0.125rem;
    background: white;
    cursor: pointer;
}

.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
    background: #f9fafb;
    border-color: #9ca3af;
}

.dataTables_wrapper .dataTables_paginate .paginate_button.current {
    background: #D4AF37 !important;
    color: white !important;
    border-color: #D4AF37 !important;
}

.dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
    color: #9ca3af !important;
    background: #f9fafb !important;
    border-color: #e5e7eb !important;
    cursor: not-allowed;
}

/* Table styling */
#inquiriesTable {
    border-collapse: separate;
    border-spacing: 0;
}

#inquiriesTable thead th {
    background-color: #f9fafb;
    border-bottom: 1px solid #e5e7eb;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    font-size: 12px;
    color: #6b7280;
    padding: 12px 24px;
}

#inquiriesTable tbody td {
    padding: 16px 24px;
    border-bottom: 1px solid #e5e7eb;
    vertical-align: middle;
}

#inquiriesTable tbody tr:hover {
    background-color: #f9fafb;
}

/* Search and length controls layout */
.dataTables_wrapper .dataTables_length,
.dataTables_wrapper .dataTables_filter {
    margin-bottom: 1rem;
}

.dataTables_wrapper .dataTables_length {
    float: left;
}

.dataTables_wrapper .dataTables_filter {
    float: right;
    text-align: right;
}

.dataTables_wrapper .dataTables_filter input {
    margin-left: 0.5rem;
    width: 250px;
}

/* Info and pagination */
.dataTables_wrapper .dataTables_info {
    float: left;
    margin-top: 1rem;
    color: #6b7280;
}

.dataTables_wrapper .dataTables_paginate {
    float: right;
    margin-top: 1rem;
}

/* Clear floats */
.dataTables_wrapper:after {
    content: "";
    display: table;
    clear: both;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter {
        float: none;
        text-align: left;
        margin-bottom: 1rem;
    }
    
    .dataTables_wrapper .dataTables_filter input {
        width: 100%;
        margin-left: 0;
        margin-top: 0.5rem;
    }
    
    .dataTables_wrapper .dataTables_info,
    .dataTables_wrapper .dataTables_paginate {
        float: none;
        text-align: center;
        margin-top: 1rem;
    }
}
</style>

<script>
$(document).ready(function() {
    var table = $('#inquiriesTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('admin.inquiries.index') }}",
            type: 'GET',
            data: function(d) {
                // Add custom filter parameters
                d.status = $('#status').val();
                d.project_id = $('#project_id').val();
                d.date_from = $('#date_from').val();
                d.date_to = $('#date_to').val();
            }
        },
        columns: [
            {
                data: 'name',
                name: 'name',
                render: function(data, type, row) {
                    return '<div class="text-sm font-medium text-gray-900">' + data + '</div>';
                }
            },
            {
                data: 'email',
                name: 'email',
                render: function(data, type, row) {
                    return '<div class="text-sm text-gray-900">' + data + '</div>';
                }
            },
            {
                data: 'phone',
                name: 'phone',
                render: function(data, type, row) {
                    return '<div class="text-sm text-gray-900">' + data + '</div>';
                }
            },
            {
                data: 'subject',
                name: 'subject',
                render: function(data, type, row) {
                    return '<div class="text-sm text-gray-900">' + data + '</div>';
                }
            },
            {
                data: 'status',
                name: 'status',
                render: function(data, type, row) {
                    let statusClass = '';
                    let statusText = data.charAt(0).toUpperCase() + data.slice(1);
                    
                    switch(data) {
                        case 'new':
                            statusClass = 'bg-blue-100 text-blue-800';
                            break;
                        case 'read':
                            statusClass = 'bg-yellow-100 text-yellow-800';
                            break;
                        case 'replied':
                            statusClass = 'bg-green-100 text-green-800';
                            break;
                        case 'closed':
                            statusClass = 'bg-red-100 text-red-800';
                            break;
                        default:
                            statusClass = 'bg-gray-100 text-gray-800';
                    }
                    
                    return '<span class="px-2 py-1 text-xs font-medium rounded-full ' + statusClass + '">' + statusText + '</span>';
                }
            },
            {
                data: 'created_at',
                name: 'created_at',
                render: function(data, type, row) {
                    return '<span class="text-sm text-gray-900">' + data + '</span>';
                }
            },
            {
                data: 'actions',
                name: 'actions',
                orderable: false,
                searchable: false,
                render: function(data, type, row) {
                    let actions = '<div class="flex items-center space-x-2">';
                    
                    // View button
                    actions += '<a href="' + data.view + '" class="text-primary hover:text-yellow-600" title="View">';
                    actions += '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">';
                    actions += '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>';
                    actions += '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>';
                    actions += '</svg></a>';
                    
                    // Mark as Read button
                    if (data.mark_read) {
                        actions += '<form method="POST" action="' + data.mark_read + '" class="inline">';
                        actions += '@csrf';
                        actions += '@method("PATCH")';
                        actions += '<button type="submit" class="text-yellow-600 hover:text-yellow-900" title="Mark as Read">';
                        actions += '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">';
                        actions += '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>';
                        actions += '</svg></button></form>';
                    }
                    
                    // Mark as Replied button
                    if (data.mark_replied) {
                        actions += '<form method="POST" action="' + data.mark_replied + '" class="inline">';
                        actions += '@csrf';
                        actions += '@method("PATCH")';
                        actions += '<button type="submit" class="text-green-600 hover:text-green-900" title="Mark as Replied">';
                        actions += '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">';
                        actions += '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path>';
                        actions += '</svg></button></form>';
                    }
                    
                    // Mark as Closed button
                    if (data.mark_closed) {
                        actions += '<form method="POST" action="' + data.mark_closed + '" class="inline">';
                        actions += '@csrf';
                        actions += '@method("PATCH")';
                        actions += '<button type="submit" class="text-red-600 hover:text-red-900" title="Close Inquiry">';
                        actions += '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">';
                        actions += '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>';
                        actions += '</svg></button></form>';
                    }
                    
                    // Delete button
                    actions += '<form method="POST" action="' + data.delete + '" class="inline" onsubmit="return confirm(\'Are you sure you want to delete this inquiry?\')">';
                    actions += '@csrf';
                    actions += '@method("DELETE")';
                    actions += '<button type="submit" class="text-red-600 hover:text-red-900" title="Delete">';
                    actions += '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">';
                    actions += '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>';
                    actions += '</svg></button></form>';
                    
                    actions += '</div>';
                    return actions;
                }
            }
        ],
        order: [[5, 'desc']], // Sort by created_at desc by default
        pageLength: 15,
        lengthMenu: [[10, 15, 25, 50, 100], [10, 15, 25, 50, 100]],
        language: {
            processing: "Loading...",
            search: "Search:",
            lengthMenu: "Show _MENU_ entries",
            info: "Showing _START_ to _END_ of _TOTAL_ entries",
            infoEmpty: "Showing 0 to 0 of 0 entries",
            infoFiltered: "(filtered from _MAX_ total entries)",
            paginate: {
                first: "First",
                last: "Last",
                next: "Next",
                previous: "Previous"
            }
        },
        dom: 'lfrtip',
        responsive: true,
        autoWidth: false,
        columnDefs: [
            { width: "15%", targets: 0 },
            { width: "20%", targets: 1 },
            { width: "15%", targets: 2 },
            { width: "20%", targets: 3 },
            { width: "10%", targets: 4 },
            { width: "10%", targets: 5 },
            { width: "10%", targets: 6 }
        ]
    });

    // Apply filters button
    $('#applyFilters').click(function() {
        table.ajax.reload();
    });

    // Clear filters button
    $('#clearFilters').click(function() {
        $('#status').val('');
        $('#project_id').val('');
        $('#date_from').val('');
        $('#date_to').val('');
        table.ajax.reload();
    });
});
</script>
@endpush