@extends('layouts.admin')

@section('title', 'Inquiry Management')
@section('page-title', 'Customer Inquiries')

@section('content')
<div class="space-y-6">
    <!-- Hero Header Section -->
    <div class="relative overflow-hidden bg-gradient-to-br from-primary via-yellow-500 to-yellow-600 rounded-2xl shadow-xl">
        <div class="absolute inset-0 bg-black/10"></div>
        <div class="relative px-8 py-12">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                <div class="text-white">
                    <h1 class="text-4xl font-bold mb-2">Customer Inquiries</h1>
                    <p class="text-xl text-white/90 mb-4">Manage and respond to customer inquiries efficiently</p>
                    <div class="flex items-center space-x-6 text-white/80">
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                            </svg>
                            <span id="totalInquiries">Loading...</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                            </svg>
                            <span id="newInquiries">Loading...</span>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row gap-3">
                    <button onclick="exportInquiries()" 
                            class="inline-flex items-center justify-center px-6 py-3 bg-white text-primary font-semibold rounded-xl hover:bg-gray-50 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Export Inquiries
                    </button>
                    <button onclick="markAllAsRead()" 
                            class="inline-flex items-center justify-center px-6 py-3 bg-white/20 backdrop-blur-sm text-white font-semibold rounded-xl hover:bg-white/30 transition-all duration-300 border border-white/30">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Mark All Read
                    </button>
                </div>
            </div>
        </div>
        <!-- Decorative elements -->
        <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -translate-y-16 translate-x-16"></div>
        <div class="absolute bottom-0 left-0 w-24 h-24 bg-white/10 rounded-full translate-y-12 -translate-x-12"></div>
    </div>

    <!-- Enhanced Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Total Inquiries Card -->
        <div class="group bg-white rounded-2xl shadow-lg border border-gray-100 p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="p-4 rounded-2xl bg-gradient-to-br from-blue-500 to-blue-600 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Total Inquiries</p>
                        <p class="text-3xl font-bold text-gray-900 mt-1" id="totalInquiriesCount">0</p>
                    </div>
                </div>
                <div class="text-right">
                    <div class="w-3 h-3 bg-blue-500 rounded-full animate-pulse"></div>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm text-gray-500">
                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
                All customer messages
            </div>
        </div>
        
        <!-- New Inquiries Card -->
        <div class="group bg-white rounded-2xl shadow-lg border border-gray-100 p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="p-4 rounded-2xl bg-gradient-to-br from-red-500 to-red-600 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-semibold text-gray-600 uppercase tracking-wide">New Inquiries</p>
                        <p class="text-3xl font-bold text-gray-900 mt-1" id="newInquiriesCount">0</p>
                    </div>
                </div>
                <div class="text-right">
                    <div class="w-3 h-3 bg-red-500 rounded-full animate-pulse"></div>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm text-gray-500">
                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
                Require attention
            </div>
        </div>
        
        <!-- Read Inquiries Card -->
        <div class="group bg-white rounded-2xl shadow-lg border border-gray-100 p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="p-4 rounded-2xl bg-gradient-to-br from-yellow-500 to-yellow-600 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Read Inquiries</p>
                        <p class="text-3xl font-bold text-gray-900 mt-1" id="readInquiriesCount">0</p>
                    </div>
                </div>
                <div class="text-right">
                    <div class="w-3 h-3 bg-yellow-500 rounded-full animate-pulse"></div>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm text-gray-500">
                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
                Awaiting response
            </div>
        </div>
        
        <!-- Replied Inquiries Card -->
        <div class="group bg-white rounded-2xl shadow-lg border border-gray-100 p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="p-4 rounded-2xl bg-gradient-to-br from-green-500 to-green-600 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Replied</p>
                        <p class="text-3xl font-bold text-gray-900 mt-1" id="repliedInquiriesCount">0</p>
                    </div>
                </div>
                <div class="text-right">
                    <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm text-gray-500">
                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
                Response sent
            </div>
        </div>
</div>

    <!-- Enhanced Filter Section -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center">
                <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                    <i class="fas fa-filter text-primary"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-gray-900">Filter & Search</h3>
                    <p class="text-sm text-gray-600">Find specific inquiries quickly</p>
                </div>
            </div>
            <div class="flex items-center space-x-2">
                <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                <span class="text-sm text-gray-600">Live Search</span>
            </div>
</div>

        <form id="filterForm" class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Status Filter -->
            <div>
                    <label for="status" class="form-label fw-semibold">Status</label>
                    <select id="status" name="status" class="form-select">
                    <option value="">All Status</option>
                        <option value="new">🆕 New</option>
                        <option value="read">👁️ Read</option>
                        <option value="replied">💬 Replied</option>
                        <option value="closed">✅ Closed</option>
                </select>
            </div>

            <!-- Project Filter -->
            <div>
                    <label for="project_id" class="form-label fw-semibold">Project</label>
                    <select id="project_id" name="project_id" class="form-select">
                    <option value="">All Projects</option>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->title }}</option>
                    @endforeach
                </select>
        </div>

            <!-- Date From -->
            <div>
                    <label for="date_from" class="form-label fw-semibold">Date From</label>
                    <input type="date" id="date_from" name="date_from" class="form-control">
            </div>

            <!-- Date To -->
            <div>
                    <label for="date_to" class="form-label fw-semibold">Date To</label>
                    <input type="date" id="date_to" name="date_to" class="form-control">
            </div>
        </div>

            <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                <div class="flex flex-wrap gap-3">
                    <button type="button" id="applyFilters" class="btn btn-primary">
                        <i class="fas fa-search me-2"></i>Apply Filters
                    </button>
                    <button type="button" id="clearFilters" class="btn btn-outline-secondary">
                        <i class="fas fa-times me-2"></i>Clear Filters
                </button>
                    <button type="button" id="quickFilters" class="btn btn-outline-info">
                        <i class="fas fa-bolt me-2"></i>Quick Filters
                </button>
            </div>
                <div class="flex items-center space-x-2 text-sm text-gray-500">
                    <i class="fas fa-info-circle"></i>
                    <span>Use filters to narrow down your search results</span>
                </div>
        </div>
    </form>
</div>

    <!-- Enhanced Inquiries Table -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="px-8 py-6 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-xl font-bold text-gray-900">All Inquiries</h3>
                    <p class="text-sm text-gray-600 mt-1">Manage and respond to customer inquiries</p>
                </div>
                <div class="flex items-center space-x-2 text-sm text-gray-500">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>Last updated: {{ now()->format('M d, Y h:i A') }}</span>
                </div>
            </div>
</div>

        <div class="overflow-x-auto">
            <table id="inquiriesTable" class="min-w-full divide-y divide-gray-100">
                <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                    <tr>
                        <th class="px-8 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span>Customer</span>
                            </div>
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                <span>Contact</span>
                            </div>
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <span>Subject</span>
                            </div>
                        </th>
                        <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            <div class="flex items-center justify-center space-x-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>Status</span>
                            </div>
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span>Date</span>
                            </div>
                        </th>
                        <th class="px-8 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            <div class="flex items-center justify-center space-x-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                                </svg>
                                <span>Actions</span>
                            </div>
                        </th>
            </tr>
        </thead>
                <tbody class="bg-white divide-y divide-gray-100">
            <!-- Data will be loaded via DataTables AJAX -->
        </tbody>
    </table>
        </div>
    </div>
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
                    return '<div class="flex items-center space-x-3">' +
                        '<div class="flex-shrink-0">' +
                        '<div class="h-10 w-10 rounded-full bg-gradient-to-br from-primary to-yellow-600 flex items-center justify-center text-white font-semibold text-sm">' +
                        data.charAt(0).toUpperCase() +
                        '</div>' +
                        '</div>' +
                        '<div class="min-w-0 flex-1">' +
                        '<div class="text-sm font-bold text-gray-900 truncate">' + data + '</div>' +
                        '<div class="text-xs text-gray-500">Customer</div>' +
                        '</div>' +
                        '</div>';
                }
            },
            {
                data: 'email',
                name: 'email',
                render: function(data, type, row) {
                    return '<div class="space-y-1">' +
                        '<div class="text-sm font-medium text-gray-900">' + data + '</div>' +
                        '<div class="text-xs text-gray-500">' + (row.phone || 'No phone') + '</div>' +
                        '</div>';
                }
            },
            {
                data: 'subject',
                name: 'subject',
                render: function(data, type, row) {
                    return '<div class="max-w-xs">' +
                        '<div class="text-sm font-semibold text-gray-900 truncate">' + data + '</div>' +
                        '<div class="text-xs text-gray-500 mt-1">Click to view details</div>' +
                        '</div>';
                }
            },
            {
                data: 'status',
                name: 'status',
                render: function(data, type, row) {
                    let statusClass = '';
                    let statusIcon = '';
                    let statusText = data.charAt(0).toUpperCase() + data.slice(1);
                    
                    switch(data) {
                        case 'new':
                            statusClass = 'bg-red-100 text-red-800 border-red-200';
                            statusIcon = '🆕';
                            break;
                        case 'read':
                            statusClass = 'bg-yellow-100 text-yellow-800 border-yellow-200';
                            statusIcon = '👁️';
                            break;
                        case 'replied':
                            statusClass = 'bg-green-100 text-green-800 border-green-200';
                            statusIcon = '💬';
                            break;
                        case 'closed':
                            statusClass = 'bg-gray-100 text-gray-800 border-gray-200';
                            statusIcon = '✅';
                            break;
                        default:
                            statusClass = 'bg-gray-100 text-gray-800 border-gray-200';
                            statusIcon = '❓';
                    }
                    
                    return '<span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold border ' + statusClass + '">' +
                        '<span class="mr-1">' + statusIcon + '</span>' +
                        statusText +
                        '</span>';
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
                    let actions = '<div class="flex items-center justify-center space-x-2">';
                    
                    // View button
                    actions += '<a href="' + data.view + '" class="inline-flex items-center p-2 text-gray-400 hover:text-blue-600 hover:bg-blue-50 rounded-xl transition-all duration-200 group" title="View Details">';
                    actions += '<svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">';
                    actions += '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>';
                    actions += '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>';
                    actions += '</svg></a>';
                    
                    // Mark as Read button
                    if (data.mark_read) {
                        actions += '<form method="POST" action="' + data.mark_read + '" class="inline">';
                        actions += '<input type="hidden" name="_token" value="{{ csrf_token() }}">';
                        actions += '<input type="hidden" name="_method" value="PATCH">';
                        actions += '<button type="submit" class="inline-flex items-center p-2 text-gray-400 hover:text-yellow-600 hover:bg-yellow-50 rounded-xl transition-all duration-200 group" title="Mark as Read">';
                        actions += '<svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">';
                        actions += '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>';
                        actions += '</svg></button></form>';
                    }
                    
                    // Mark as Replied button
                    if (data.mark_replied) {
                        actions += '<form method="POST" action="' + data.mark_replied + '" class="inline">';
                        actions += '<input type="hidden" name="_token" value="{{ csrf_token() }}">';
                        actions += '<input type="hidden" name="_method" value="PATCH">';
                        actions += '<button type="submit" class="inline-flex items-center p-2 text-gray-400 hover:text-green-600 hover:bg-green-50 rounded-xl transition-all duration-200 group" title="Mark as Replied">';
                        actions += '<svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">';
                        actions += '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path>';
                        actions += '</svg></button></form>';
                    }
                    
                    // Mark as Closed button
                    if (data.mark_closed) {
                        actions += '<form method="POST" action="' + data.mark_closed + '" class="inline">';
                        actions += '<input type="hidden" name="_token" value="{{ csrf_token() }}">';
                        actions += '<input type="hidden" name="_method" value="PATCH">';
                        actions += '<button type="submit" class="inline-flex items-center p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-xl transition-all duration-200 group" title="Close Inquiry">';
                        actions += '<svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">';
                        actions += '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>';
                        actions += '</svg></button></form>';
                    }
                    
                    // Delete button
                    actions += '<form method="POST" action="' + data.delete + '" class="inline" onsubmit="return confirm(\'Are you sure you want to delete this inquiry?\')">';
                    actions += '<input type="hidden" name="_token" value="{{ csrf_token() }}">';
                    actions += '<input type="hidden" name="_method" value="DELETE">';
                    actions += '<button type="submit" class="inline-flex items-center p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-xl transition-all duration-200 group" title="Delete Inquiry">';
                    actions += '<svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">';
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
            { width: "20%", targets: 0 }, // Customer
            { width: "25%", targets: 1 }, // Contact
            { width: "25%", targets: 2 }, // Subject
            { width: "10%", targets: 3 }, // Status
            { width: "10%", targets: 4 }, // Date
            { width: "10%", targets: 5, orderable: false } // Actions
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

    // Quick filters button
    $('#quickFilters').click(function() {
        // Show quick filter options
        showQuickFilters();
    });

    // Load initial statistics
    loadStatistics();
});

// Additional JavaScript functions
function loadStatistics() {
    // Load inquiry statistics
    fetch('{{ route("admin.inquiries.index") }}?stats=1')
        .then(response => response.json())
        .then(data => {
            if (data.stats) {
                document.getElementById('totalInquiriesCount').textContent = data.stats.total || 0;
                document.getElementById('newInquiriesCount').textContent = data.stats.new || 0;
                document.getElementById('readInquiriesCount').textContent = data.stats.read || 0;
                document.getElementById('repliedInquiriesCount').textContent = data.stats.replied || 0;
                
                // Update header stats
                document.getElementById('totalInquiries').textContent = (data.stats.total || 0) + ' Total';
                document.getElementById('newInquiries').textContent = (data.stats.new || 0) + ' New';
            }
        })
        .catch(error => {
            console.error('Error loading statistics:', error);
        });
}

function exportInquiries() {
    // Create a simple CSV export
    const table = document.getElementById('inquiriesTable');
    const rows = table.querySelectorAll('tbody tr');
    let csv = 'Name,Email,Phone,Subject,Status,Date\n';
    
    rows.forEach(row => {
        const cells = row.querySelectorAll('td');
        if (cells.length > 0) {
            const name = cells[0].textContent || '';
            const email = cells[1].textContent || '';
            const subject = cells[2].textContent || '';
            const status = cells[3].textContent || '';
            const date = cells[4].textContent || '';
            csv += `"${name}","${email}","","${subject}","${status}","${date}"\n`;
        }
    });
    
    // Download CSV
    const blob = new Blob([csv], { type: 'text/csv' });
    const url = window.URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = 'inquiries-export-' + new Date().toISOString().split('T')[0] + '.csv';
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    window.URL.revokeObjectURL(url);
}

function markAllAsRead() {
    if (confirm('Are you sure you want to mark all new inquiries as read?')) {
        fetch('{{ route("admin.inquiries.index") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                action: 'mark_all_read'
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showNotification('All inquiries marked as read!', 'success');
                // Reload the table
                $('#inquiriesTable').DataTable().ajax.reload();
                // Reload statistics
                loadStatistics();
            } else {
                showNotification('Failed to mark inquiries as read', 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('An error occurred', 'error');
        });
    }
}

function showQuickFilters() {
    // Create quick filter modal or dropdown
    const quickFilters = `
        <div class="absolute top-full right-0 mt-2 w-64 bg-white rounded-lg shadow-lg border border-gray-200 z-50 p-4">
            <h4 class="font-semibold text-gray-900 mb-3">Quick Filters</h4>
            <div class="space-y-2">
                <button onclick="applyQuickFilter('new')" class="w-full text-left px-3 py-2 text-sm text-red-600 hover:bg-red-50 rounded-lg">
                    🆕 New Inquiries (${document.getElementById('newInquiriesCount').textContent})
                </button>
                <button onclick="applyQuickFilter('read')" class="w-full text-left px-3 py-2 text-sm text-yellow-600 hover:bg-yellow-50 rounded-lg">
                    👁️ Read Inquiries (${document.getElementById('readInquiriesCount').textContent})
                </button>
                <button onclick="applyQuickFilter('replied')" class="w-full text-left px-3 py-2 text-sm text-green-600 hover:bg-green-50 rounded-lg">
                    💬 Replied Inquiries (${document.getElementById('repliedInquiriesCount').textContent})
                </button>
                <button onclick="applyQuickFilter('today')" class="w-full text-left px-3 py-2 text-sm text-blue-600 hover:bg-blue-50 rounded-lg">
                    📅 Today's Inquiries
                </button>
                <button onclick="applyQuickFilter('week')" class="w-full text-left px-3 py-2 text-sm text-purple-600 hover:bg-purple-50 rounded-lg">
                    📊 This Week
                </button>
            </div>
        </div>
    `;
    
    // Remove existing quick filter dropdown
    const existing = document.getElementById('quickFilterDropdown');
    if (existing) {
        existing.remove();
    }
    
    // Add new dropdown
    const button = document.getElementById('quickFilters');
    const dropdown = document.createElement('div');
    dropdown.id = 'quickFilterDropdown';
    dropdown.innerHTML = quickFilters;
    dropdown.className = 'relative';
    button.parentNode.appendChild(dropdown);
    
    // Close dropdown when clicking outside
    setTimeout(() => {
        document.addEventListener('click', function closeDropdown(e) {
            if (!dropdown.contains(e.target) && e.target !== button) {
                dropdown.remove();
                document.removeEventListener('click', closeDropdown);
            }
        });
    }, 100);
}

function applyQuickFilter(filter) {
    // Remove quick filter dropdown
    const dropdown = document.getElementById('quickFilterDropdown');
    if (dropdown) {
        dropdown.remove();
    }
    
    // Apply the filter
    switch(filter) {
        case 'new':
            $('#status').val('new');
            break;
        case 'read':
            $('#status').val('read');
            break;
        case 'replied':
            $('#status').val('replied');
            break;
        case 'today':
            const today = new Date().toISOString().split('T')[0];
            $('#date_from').val(today);
            $('#date_to').val(today);
            break;
        case 'week':
            const weekAgo = new Date();
            weekAgo.setDate(weekAgo.getDate() - 7);
            $('#date_from').val(weekAgo.toISOString().split('T')[0]);
            $('#date_to').val(new Date().toISOString().split('T')[0]);
            break;
    }
    
    // Apply the filter
    $('#inquiriesTable').DataTable().ajax.reload();
}

function showNotification(message, type) {
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 z-50 p-4 rounded-lg shadow-lg transition-all duration-300 transform translate-x-full ${
        type === 'success' ? 'bg-green-500 text-white' : 'bg-red-500 text-white'
    }`;
    notification.textContent = message;
    
    document.body.appendChild(notification);
    
    // Animate in
    setTimeout(() => {
        notification.classList.remove('translate-x-full');
    }, 100);
    
    // Remove after 3 seconds
    setTimeout(() => {
        notification.classList.add('translate-x-full');
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 300);
    }, 3000);
}

// Add keyboard shortcuts
document.addEventListener('keydown', function(e) {
    // Ctrl/Cmd + E for export
    if ((e.ctrlKey || e.metaKey) && e.key === 'e') {
        e.preventDefault();
        exportInquiries();
    }
    
    // Ctrl/Cmd + R for mark all read
    if ((e.ctrlKey || e.metaKey) && e.key === 'r') {
        e.preventDefault();
        markAllAsRead();
    }
});
</script>
@endpush