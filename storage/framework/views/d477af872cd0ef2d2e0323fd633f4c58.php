<?php $__env->startSection('title', 'Admin Dashboard'); ?>
<?php $__env->startSection('page-title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <!-- Hero Welcome Section -->
    <div class="relative overflow-hidden bg-gradient-to-br from-primary via-yellow-500 to-yellow-600 rounded-2xl shadow-xl">
        <div class="absolute inset-0 bg-black/10"></div>
        <div class="relative px-8 py-12">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                <div class="text-white">
                    <h1 class="text-4xl font-bold mb-2">Welcome to Admin Dashboard</h1>
                    <p class="text-xl text-white/90 mb-4">Manage your real estate business efficiently</p>
                    <div class="flex items-center space-x-6 text-white/80">
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                            </svg>
                            <span><?php echo e(now()->format('l, F j, Y')); ?></span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span>System Online</span>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row gap-3">
                    <a href="<?php echo e(route('admin.projects.create')); ?>" 
                       class="inline-flex items-center justify-center px-6 py-3 bg-white text-primary font-semibold rounded-xl hover:bg-gray-50 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        New Project
                    </a>
                    <a href="<?php echo e(route('admin.blogs.create')); ?>" 
                       class="inline-flex items-center justify-center px-6 py-3 bg-white/20 backdrop-blur-sm text-white font-semibold rounded-xl hover:bg-white/30 transition-all duration-300 border border-white/30">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                        </svg>
                        New Blog
                    </a>
                </div>
            </div>
        </div>
        <!-- Decorative elements -->
        <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -translate-y-16 translate-x-16"></div>
        <div class="absolute bottom-0 left-0 w-24 h-24 bg-white/10 rounded-full translate-y-12 -translate-x-12"></div>
    </div>

    <!-- Enhanced Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Total Projects Card -->
        <div class="group bg-white rounded-2xl shadow-lg border border-gray-100 p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
        <div class="flex items-center">
                    <div class="p-4 rounded-2xl bg-gradient-to-br from-blue-500 to-blue-600 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
            </div>
            <div class="ml-4">
                        <p class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Total Projects</p>
                        <p class="text-3xl font-bold text-gray-900 mt-1"><?php echo e($stats['total_projects']); ?></p>
                    </div>
                </div>
                <div class="text-right">
                    <div class="w-3 h-3 bg-blue-500 rounded-full animate-pulse"></div>
            </div>
        </div>
            <div class="mt-4 flex items-center justify-between">
                <div class="flex items-center text-sm text-gray-500">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    All projects
                </div>
                <a href="<?php echo e(route('admin.projects.index')); ?>" class="text-blue-600 hover:text-blue-800 text-sm font-medium">View All →</a>
            </div>
    </div>

        <!-- Active Projects Card -->
        <div class="group bg-white rounded-2xl shadow-lg border border-gray-100 p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
        <div class="flex items-center">
                    <div class="p-4 rounded-2xl bg-gradient-to-br from-green-500 to-green-600 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div class="ml-4">
                        <p class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Active Projects</p>
                        <p class="text-3xl font-bold text-gray-900 mt-1"><?php echo e($stats['active_projects']); ?></p>
                    </div>
                </div>
                <div class="text-right">
                    <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
            </div>
        </div>
            <div class="mt-4 flex items-center justify-between">
                <div class="flex items-center text-sm text-gray-500">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    Currently active
                </div>
                <a href="<?php echo e(route('admin.projects.index')); ?>?status=active" class="text-green-600 hover:text-green-800 text-sm font-medium">View Active →</a>
            </div>
    </div>

        <!-- Blog Posts Card -->
        <div class="group bg-white rounded-2xl shadow-lg border border-gray-100 p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
        <div class="flex items-center">
                    <div class="p-4 rounded-2xl bg-gradient-to-br from-yellow-500 to-yellow-600 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                </svg>
            </div>
            <div class="ml-4">
                        <p class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Blog Posts</p>
                        <p class="text-3xl font-bold text-gray-900 mt-1"><?php echo e($stats['total_blogs']); ?></p>
                    </div>
                </div>
                <div class="text-right">
                    <div class="w-3 h-3 bg-yellow-500 rounded-full animate-pulse"></div>
                </div>
            </div>
            <div class="mt-4 flex items-center justify-between">
                <div class="flex items-center text-sm text-gray-500">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    <?php echo e($stats['published_blogs']); ?> published
                </div>
                <a href="<?php echo e(route('admin.blogs.index')); ?>" class="text-yellow-600 hover:text-yellow-800 text-sm font-medium">View All →</a>
            </div>
        </div>
        
        <!-- New Inquiries Card -->
        <div class="group bg-white rounded-2xl shadow-lg border border-gray-100 p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="p-4 rounded-2xl bg-gradient-to-br from-red-500 to-red-600 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-semibold text-gray-600 uppercase tracking-wide">New Inquiries</p>
                        <p class="text-3xl font-bold text-gray-900 mt-1"><?php echo e($stats['new_inquiries']); ?></p>
                    </div>
                </div>
                <div class="text-right">
                    <div class="w-3 h-3 bg-red-500 rounded-full animate-pulse"></div>
                </div>
            </div>
            <div class="mt-4 flex items-center justify-between">
                <div class="flex items-center text-sm text-gray-500">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    Require attention
                </div>
                <a href="<?php echo e(route('admin.inquiries.index')); ?>?status=new" class="text-red-600 hover:text-red-800 text-sm font-medium">View New →</a>
            </div>
        </div>
    </div>

    <!-- Quick Actions & Recent Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Quick Actions Panel -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-gray-900">Quick Actions</h3>
                    <div class="p-2 bg-gradient-to-br from-primary to-yellow-600 rounded-xl">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                </div>
                <div class="space-y-3">
                    <a href="<?php echo e(route('admin.projects.create')); ?>" 
                       class="flex items-center p-4 bg-gradient-to-r from-blue-50 to-blue-100 rounded-xl hover:from-blue-100 hover:to-blue-200 transition-all duration-300 group">
                        <div class="p-3 bg-blue-500 rounded-xl group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="font-semibold text-gray-900">Add New Project</p>
                            <p class="text-sm text-gray-600">Create a new real estate project</p>
                        </div>
                    </a>
                    
                    <a href="<?php echo e(route('admin.blogs.create')); ?>" 
                       class="flex items-center p-4 bg-gradient-to-r from-yellow-50 to-yellow-100 rounded-xl hover:from-yellow-100 hover:to-yellow-200 transition-all duration-300 group">
                        <div class="p-3 bg-yellow-500 rounded-xl group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="font-semibold text-gray-900">Write Blog Post</p>
                            <p class="text-sm text-gray-600">Create engaging content</p>
                        </div>
                    </a>
                    
                    <a href="<?php echo e(route('admin.inquiries.index')); ?>" 
                       class="flex items-center p-4 bg-gradient-to-r from-red-50 to-red-100 rounded-xl hover:from-red-100 hover:to-red-200 transition-all duration-300 group">
                        <div class="p-3 bg-red-500 rounded-xl group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
            </div>
            <div class="ml-4">
                            <p class="font-semibold text-gray-900">View Inquiries</p>
                            <p class="text-sm text-gray-600">Manage customer messages</p>
                        </div>
                    </a>
                    
                    <a href="<?php echo e(route('admin.settings.index')); ?>" 
                       class="flex items-center p-4 bg-gradient-to-r from-gray-50 to-gray-100 rounded-xl hover:from-gray-100 hover:to-gray-200 transition-all duration-300 group">
                        <div class="p-3 bg-gray-500 rounded-xl group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="font-semibold text-gray-900">Settings</p>
                            <p class="text-sm text-gray-600">Configure your system</p>
            </div>
                    </a>
        </div>
    </div>
</div>

        <!-- Recent Activity -->
        <div class="lg:col-span-2">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Recent Inquiries -->
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100">
                    <div class="px-6 py-4 border-b border-gray-100">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-bold text-gray-900">Recent Inquiries</h3>
                            <div class="flex items-center space-x-2">
                                <div class="w-2 h-2 bg-red-500 rounded-full animate-pulse"></div>
                                <span class="text-sm text-gray-500"><?php echo e($stats['new_inquiries']); ?> new</span>
                            </div>
                        </div>
        </div>
        <div class="p-6">
            <?php if($recent_inquiries->count() > 0): ?>
            <div class="space-y-4">
                <?php $__currentLoopData = $recent_inquiries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inquiry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="group flex items-center justify-between p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-all duration-300">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                        <div class="h-12 w-12 rounded-full bg-gradient-to-br from-primary to-yellow-600 flex items-center justify-center text-white font-bold">
                                            <?php echo e($inquiry->name[0]); ?>

                                        </div>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <p class="font-semibold text-gray-900 truncate"><?php echo e($inquiry->name); ?></p>
                                        <p class="text-sm text-gray-600 truncate"><?php echo e($inquiry->email); ?></p>
                                        <p class="text-xs text-gray-500 mt-1"><?php echo e(Str::limit($inquiry->message, 40)); ?></p>
                                    </div>
                    </div>
                                <div class="flex items-center space-x-3">
                                    <span class="px-3 py-1 text-xs font-semibold rounded-full
                            <?php if($inquiry->status === 'new'): ?> bg-red-100 text-red-800
                            <?php elseif($inquiry->status === 'read'): ?> bg-yellow-100 text-yellow-800
                            <?php elseif($inquiry->status === 'replied'): ?> bg-green-100 text-green-800
                            <?php else: ?> bg-gray-100 text-gray-800
                            <?php endif; ?>">
                            <?php echo e(ucfirst($inquiry->status)); ?>

                        </span>
                                    <a href="<?php echo e(route('admin.inquiries.show', $inquiry)); ?>" 
                                       class="p-2 text-gray-400 hover:text-primary transition-colors duration-300">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
                        <div class="mt-6">
                            <a href="<?php echo e(route('admin.inquiries.index')); ?>" 
                               class="inline-flex items-center text-primary hover:text-yellow-600 font-semibold transition-colors duration-300">
                                View all inquiries
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
            </div>
            <?php else: ?>
                        <div class="text-center py-8">
                            <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <p class="text-gray-500">No inquiries yet</p>
                        </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Recent Projects -->
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100">
                    <div class="px-6 py-4 border-b border-gray-100">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-bold text-gray-900">Recent Projects</h3>
                            <div class="flex items-center space-x-2">
                                <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                                <span class="text-sm text-gray-500"><?php echo e($stats['active_projects']); ?> active</span>
                            </div>
                        </div>
        </div>
        <div class="p-6">
            <?php if($recent_projects->count() > 0): ?>
            <div class="space-y-4">
                <?php $__currentLoopData = $recent_projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="group flex items-center justify-between p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-all duration-300">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                        <?php if($project->images->count() > 0): ?>
                                        <img src="<?php echo e(asset('storage/' . $project->images->first()->image_path)); ?>" 
                                             alt="<?php echo e($project->title); ?>" 
                                             class="h-12 w-12 rounded-xl object-cover">
                                        <?php else: ?>
                                        <div class="h-12 w-12 rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center">
                                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                            </svg>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <p class="font-semibold text-gray-900 truncate"><?php echo e($project->title); ?></p>
                                        <p class="text-sm text-gray-600 truncate"><?php echo e($project->location); ?></p>
                                        <p class="text-xs text-gray-500 mt-1"><?php echo e($project->created_at->format('M d, Y')); ?></p>
                                    </div>
                    </div>
                                <div class="flex items-center space-x-3">
                                    <span class="px-3 py-1 text-xs font-semibold rounded-full
                            <?php if($project->category === 'new_launch'): ?> bg-blue-100 text-blue-800
                            <?php elseif($project->category === 'ongoing'): ?> bg-yellow-100 text-yellow-800
                            <?php else: ?> bg-green-100 text-green-800
                            <?php endif; ?>">
                            <?php echo e(ucfirst(str_replace('_', ' ', $project->category))); ?>

                        </span>
                                    <a href="<?php echo e(route('admin.projects.show', $project)); ?>" 
                                       class="p-2 text-gray-400 hover:text-primary transition-colors duration-300">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
                        <div class="mt-6">
                            <a href="<?php echo e(route('admin.projects.index')); ?>" 
                               class="inline-flex items-center text-primary hover:text-yellow-600 font-semibold transition-colors duration-300">
                                View all projects
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
            </div>
            <?php else: ?>
                        <div class="text-center py-8">
                            <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                            <p class="text-gray-500">No projects yet</p>
                        </div>
            <?php endif; ?>
        </div>
    </div>
</div>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
    // Auto-refresh dashboard data every 30 seconds
    setInterval(function() {
        // You can add AJAX calls here to refresh stats
        console.log('Dashboard auto-refresh...');
    }, 30000);
    
    // Add some interactive animations
    document.addEventListener('DOMContentLoaded', function() {
        // Animate stats cards on load
        const cards = document.querySelectorAll('.group');
        cards.forEach((card, index) => {
            setTimeout(() => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'all 0.6s ease';
                
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, 100);
            }, index * 100);
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\GurukrupaMarketing\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>