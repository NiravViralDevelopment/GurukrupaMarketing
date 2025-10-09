

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