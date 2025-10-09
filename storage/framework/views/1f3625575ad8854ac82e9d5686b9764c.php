

<?php $__env->startSection('title', 'Project Management'); ?>
<?php $__env->startSection('page-title', 'Projects'); ?>

<?php $__env->startSection('content'); ?>
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-900">Project Management</h2>
    <a href="<?php echo e(route('admin.projects.create')); ?>" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition duration-300">
        Add New Project
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="overflow-x-auto">
        <table id="projectsTable" class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/3">Project</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/6">Location</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/6">Category</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/6">Price</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/6">Status</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/6">Created</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/12">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <!-- Data will be loaded via DataTables AJAX -->
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
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
#projectsTable {
    border-collapse: separate;
    border-spacing: 0;
}

#projectsTable thead th {
    background-color: #f9fafb;
    border-bottom: 1px solid #e5e7eb;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    font-size: 12px;
    color: #6b7280;
    padding: 12px 16px;
}

#projectsTable tbody td {
    padding: 12px 16px;
    border-bottom: 1px solid #e5e7eb;
    vertical-align: middle;
}

#projectsTable tbody tr:hover {
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
    $('#projectsTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "<?php echo e(route('admin.projects.index')); ?>",
            type: 'GET'
        },
        columns: [
            {
                data: 'title',
                name: 'title',
                render: function(data, type, row) {
                    let imageHtml = '';
                    if (row.image_url) {
                        imageHtml = '<div class="flex-shrink-0 h-8 w-8">' +
                            '<img class="h-8 w-8 rounded object-cover" src="' + row.image_url + '" alt="' + data + '">' +
                        '</div>';
                    } else {
                        imageHtml = '<div class="flex-shrink-0 h-8 w-8 bg-gray-200 rounded flex items-center justify-center">' +
                            '<svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">' +
                                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>' +
                            '</svg>' +
                        '</div>';
                    }
                    
                    return '<div class="flex items-center">' +
                        imageHtml +
                        '<div class="ml-2 min-w-0 flex-1">' +
                            '<div class="text-sm font-medium text-gray-900 truncate">' + data + '</div>' +
                            '<div class="text-xs text-gray-500 truncate">' + row.short_description + '</div>' +
                        '</div>' +
                    '</div>';
                }
            },
            {
                data: 'location',
                name: 'location',
                render: function(data, type, row) {
                    return '<div class="text-sm text-gray-900 truncate">' + data + '</div>';
                }
            },
            {
                data: 'category',
                name: 'category',
                render: function(data, type, row) {
                    let categoryClass = '';
                    let categoryText = data.charAt(0).toUpperCase() + data.slice(1).replace('_', ' ');
                    
                    switch(data) {
                        case 'new_launch':
                            categoryClass = 'bg-blue-100 text-blue-800';
                            break;
                        case 'ongoing':
                            categoryClass = 'bg-yellow-100 text-yellow-800';
                            break;
                        case 'completed':
                            categoryClass = 'bg-green-100 text-green-800';
                            break;
                        default:
                            categoryClass = 'bg-gray-100 text-gray-800';
                    }
                    
                    return '<span class="px-2 py-1 text-xs font-medium rounded-full ' + categoryClass + '">' + categoryText + '</span>';
                }
            },
            {
                data: 'price',
                name: 'price',
                render: function(data, type, row) {
                    if (data) {
                        return '<span class="text-sm text-gray-900">₹' + (data / 100000).toFixed(1) + 'L</span>';
                    } else {
                        return '<span class="text-sm text-gray-500">N/A</span>';
                    }
                }
            },
            {
                data: 'is_active',
                name: 'is_active',
                render: function(data, type, row) {
                    let statusHtml = '';
                    
                    if (data) {
                        statusHtml += '<span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">Active</span>';
                    } else {
                        statusHtml += '<span class="px-2 py-1 text-xs font-medium rounded-full bg-red-100 text-red-800">Inactive</span>';
                    }
                    
                    if (row.is_featured) {
                        statusHtml += ' <span class="px-2 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800">Featured</span>';
                    }
                    
                    return '<div class="flex flex-col space-y-1">' + statusHtml + '</div>';
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
                    return '<div class="flex items-center space-x-1">' +
                        '<a href="' + data.view + '" class="text-primary hover:text-yellow-600" title="View">' +
                            '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">' +
                                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>' +
                                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>' +
                            '</svg>' +
                        '</a>' +
                        '<a href="' + data.edit + '" class="text-blue-600 hover:text-blue-900" title="Edit">' +
                            '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">' +
                                '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>' +
                            '</svg>' +
                        '</a>' +
                        '<form method="POST" action="' + data.delete + '" class="inline" onsubmit="return confirm(\'Are you sure you want to delete this project?\')">' +
                            '<?php echo csrf_field(); ?>' +
                            '<?php echo method_field("DELETE"); ?>' +
                            '<button type="submit" class="text-red-600 hover:text-red-900" title="Delete">' +
                                '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">' +
                                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>' +
                                '</svg>' +
                            '</button>' +
                        '</form>' +
                    '</div>';
                }
            }
        ],
        order: [[5, 'desc']], // Sort by created_at desc by default
        pageLength: 10,
        lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
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
            { width: "35%", targets: 0 },
            { width: "15%", targets: 1 },
            { width: "12%", targets: 2 },
            { width: "10%", targets: 3 },
            { width: "12%", targets: 4 },
            { width: "10%", targets: 5 },
            { width: "6%", targets: 6 }
        ]
    });
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Working\GurukrupaMarketing\resources\views/admin/projects/index.blade.php ENDPATH**/ ?>