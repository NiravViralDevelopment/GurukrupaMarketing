

<?php $__env->startSection('title', 'View Project'); ?>
<?php $__env->startSection('page-title', 'Project Details'); ?>

<?php $__env->startSection('content'); ?>
<div class="bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-start mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900"><?php echo e($project->title); ?></h1>
            <div class="flex items-center space-x-4 mt-2">
                <span class="px-2 py-1 text-xs font-medium rounded-full
                    <?php if($project->category === 'new_launch'): ?> bg-blue-100 text-blue-800
                    <?php elseif($project->category === 'ongoing'): ?> bg-yellow-100 text-yellow-800
                    <?php else: ?> bg-green-100 text-green-800
                    <?php endif; ?>">
                    <?php echo e(ucfirst(str_replace('_', ' ', $project->category))); ?>

                </span>
                <?php if($project->is_featured): ?>
                <span class="px-2 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800">Featured</span>
                <?php endif; ?>
                <?php if($project->is_active): ?>
                <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">Active</span>
                <?php else: ?>
                <span class="px-2 py-1 text-xs font-medium rounded-full bg-red-100 text-red-800">Inactive</span>
                <?php endif; ?>
            </div>
        </div>
        <div class="flex space-x-2">
            <a href="<?php echo e(route('admin.projects.edit', $project)); ?>" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition duration-300">
                Edit Project
            </a>
        </div>
    </div>
    
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div>
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Project Information</h3>
            <div class="space-y-4">
                <div>
                    <label class="text-sm font-medium text-gray-600">Location</label>
                    <p class="text-gray-900"><?php echo e($project->location); ?></p>
                </div>
                
                <?php if($project->area): ?>
                <div>
                    <label class="text-sm font-medium text-gray-600">Area</label>
                    <p class="text-gray-900"><?php echo e($project->area); ?></p>
                </div>
                <?php endif; ?>
                
                <?php if($project->price): ?>
                <div>
                    <label class="text-sm font-medium text-gray-600">Price</label>
                    <p class="text-gray-900 font-semibold">₹<?php echo e(number_format($project->price / 100000, 1)); ?>L</p>
                </div>
                <?php endif; ?>
                
                <?php if($project->start_date): ?>
                <div>
                    <label class="text-sm font-medium text-gray-600">Start Date</label>
                    <p class="text-gray-900"><?php echo e($project->start_date->format('M d, Y')); ?></p>
                </div>
                <?php endif; ?>
                
                <?php if($project->end_date): ?>
                <div>
                    <label class="text-sm font-medium text-gray-600">End Date</label>
                    <p class="text-gray-900"><?php echo e($project->end_date->format('M d, Y')); ?></p>
                </div>
                <?php endif; ?>
            </div>
        </div>
        
        <div>
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Project Images</h3>
            <?php if($project->images->count() > 0): ?>
            <div class="grid grid-cols-2 gap-4">
                <?php $__currentLoopData = $project->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="relative">
                    <img src="<?php echo e($image->image_url); ?>" alt="<?php echo e($image->alt_text); ?>" class="w-full h-32 object-cover rounded-lg">
                    <?php if($image->is_primary): ?>
                    <span class="absolute top-2 left-2 bg-primary text-white px-2 py-1 text-xs rounded">Primary</span>
                    <?php endif; ?>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php else: ?>
            <p class="text-gray-500">No images uploaded yet.</p>
            <?php endif; ?>
        </div>
    </div>
    
    <div class="mt-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Project Brochure</h3>
        <?php if($project->brochure && !empty($project->brochure)): ?>
        <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
            <div class="flex items-center space-x-4">
                <!-- PDF Icon -->
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                        <svg class="w-8 h-8 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
                
                <div class="flex-1">
                    <p class="text-sm font-medium text-gray-900"><?php echo e($project->brochure); ?></p>
                    <p class="text-sm text-gray-500">PDF Document</p>
                    <p class="text-xs text-gray-400">Size: <?php echo e(number_format(filesize(public_path('project/brochure/' . $project->brochure)) / 1024, 1)); ?> KB</p>
                </div>
                
                <div class="flex space-x-2">
                    <a href="<?php echo e($project->brochure_url); ?>" target="_blank" 
                       class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300 flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        <span>View</span>
                    </a>
                    <a href="<?php echo e($project->brochure_url); ?>" download="<?php echo e($project->brochure); ?>" 
                       class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition duration-300 flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <span>Download</span>
                    </a>
                </div>
            </div>
        </div>
        <?php else: ?>
        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-yellow-800">No Brochure</h3>
                    <div class="mt-2 text-sm text-yellow-700">
                        <p>This project doesn't have a brochure uploaded yet.</p>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
    
    <?php if($project->short_description): ?>
    <div class="mt-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-2">Short Description</h3>
        <p class="text-gray-700"><?php echo e($project->short_description); ?></p>
    </div>
    <?php endif; ?>
    
    <div class="mt-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-2">Description</h3>
        <div class="prose max-w-none text-gray-700">
            <?php echo nl2br(e($project->description)); ?>

        </div>
    </div>
    
    <?php if($project->features && count($project->features) > 0): ?>
    <div class="mt-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Key Features</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <?php $__currentLoopData = $project->features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="flex items-center">
                <svg class="w-5 h-5 text-primary mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
                <span><?php echo e($feature); ?></span>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <?php endif; ?>
    
    <?php if($project->meta_title || $project->meta_description): ?>
    <div class="mt-6 border-t pt-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">SEO Information</h3>
        <div class="space-y-4">
            <?php if($project->meta_title): ?>
            <div>
                <label class="text-sm font-medium text-gray-600">Meta Title</label>
                <p class="text-gray-900"><?php echo e($project->meta_title); ?></p>
            </div>
            <?php endif; ?>
            
            <?php if($project->meta_description): ?>
            <div>
                <label class="text-sm font-medium text-gray-600">Meta Description</label>
                <p class="text-gray-900"><?php echo e($project->meta_description); ?></p>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>
</div>

<div class="mt-6">
    <a href="<?php echo e(route('admin.projects.index')); ?>" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400 transition duration-300">
        Back to Projects
    </a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Working\GurukrupaMarketing\resources\views/admin/projects/show.blade.php ENDPATH**/ ?>