

<?php $__env->startSection('title', 'View Inquiry'); ?>
<?php $__env->startSection('page-title', 'Inquiry Details'); ?>

<?php $__env->startSection('content'); ?>
<div class="bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-start mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900"><?php echo e($inquiry->subject); ?></h1>
            <div class="flex items-center space-x-4 mt-2">
                <span class="px-2 py-1 text-xs font-medium rounded-full
                    <?php if($inquiry->status === 'new'): ?> bg-blue-100 text-blue-800
                    <?php elseif($inquiry->status === 'read'): ?> bg-yellow-100 text-yellow-800
                    <?php elseif($inquiry->status === 'replied'): ?> bg-green-100 text-green-800
                    <?php else: ?> bg-red-100 text-red-800
                    <?php endif; ?>">
                    <?php echo e(ucfirst($inquiry->status)); ?>

                </span>
                <span class="text-sm text-gray-500">
                    <?php echo e($inquiry->created_at->format('M d, Y \a\t g:i A')); ?>

                </span>
            </div>
        </div>
        <div class="flex space-x-2">
            <?php if($inquiry->status === 'new'): ?>
            <form method="POST" action="<?php echo e(route('admin.inquiries.mark-read', $inquiry)); ?>" class="inline">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PATCH'); ?>
                <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition duration-300">
                    Mark as Read
                </button>
            </form>
            <?php endif; ?>
            
            <?php if($inquiry->status === 'read'): ?>
            <form method="POST" action="<?php echo e(route('admin.inquiries.mark-replied', $inquiry)); ?>" class="inline">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PATCH'); ?>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition duration-300">
                    Mark as Replied
                </button>
            </form>
            <?php endif; ?>
            
            <?php if($inquiry->status !== 'closed'): ?>
            <form method="POST" action="<?php echo e(route('admin.inquiries.mark-closed', $inquiry)); ?>" class="inline">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PATCH'); ?>
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-300">
                    Close Inquiry
                </button>
            </form>
            <?php endif; ?>
        </div>
    </div>
    
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div>
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Contact Information</h3>
            <div class="space-y-4">
                <div>
                    <label class="text-sm font-medium text-gray-600">Name</label>
                    <p class="text-gray-900"><?php echo e($inquiry->name); ?></p>
                </div>
                
                <div>
                    <label class="text-sm font-medium text-gray-600">Email</label>
                    <p class="text-gray-900">
                        <a href="mailto:<?php echo e($inquiry->email); ?>" class="text-primary hover:text-yellow-600">
                            <?php echo e($inquiry->email); ?>

                        </a>
                    </p>
                </div>
                
                <?php if($inquiry->phone): ?>
                <div>
                    <label class="text-sm font-medium text-gray-600">Phone</label>
                    <p class="text-gray-900">
                        <a href="tel:<?php echo e($inquiry->phone); ?>" class="text-primary hover:text-yellow-600">
                            <?php echo e($inquiry->phone); ?>

                        </a>
                    </p>
                </div>
                <?php endif; ?>
                
                <div>
                    <label class="text-sm font-medium text-gray-600">Inquiry Date</label>
                    <p class="text-gray-900"><?php echo e($inquiry->created_at->format('M d, Y \a\t g:i A')); ?></p>
                </div>
                
                <?php if($inquiry->updated_at != $inquiry->created_at): ?>
                <div>
                    <label class="text-sm font-medium text-gray-600">Last Updated</label>
                    <p class="text-gray-900"><?php echo e($inquiry->updated_at->format('M d, Y \a\t g:i A')); ?></p>
                </div>
                <?php endif; ?>
            </div>
        </div>
        
        <div>
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
            <div class="space-y-3">
                <a href="mailto:<?php echo e($inquiry->email); ?>?subject=Re: <?php echo e($inquiry->subject); ?>" 
                   class="block w-full bg-primary text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition duration-300 text-center">
                    Reply via Email
                </a>
                
                <?php if($inquiry->phone): ?>
                <a href="tel:<?php echo e($inquiry->phone); ?>" 
                   class="block w-full bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition duration-300 text-center">
                    Call Customer
                </a>
                <?php endif; ?>
                
                <button onclick="copyInquiryInfo()" 
                        class="block w-full bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition duration-300">
                    Copy Inquiry Info
                </button>
            </div>
        </div>
    </div>
    
    <div class="mt-8">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Message</h3>
        <div class="bg-gray-50 rounded-lg p-6">
            <div class="prose max-w-none text-gray-700">
                <?php echo nl2br(e($inquiry->message)); ?>

            </div>
        </div>
    </div>
    
    <?php if($inquiry->project_id): ?>
    <div class="mt-8">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Related Project</h3>
        <div class="bg-blue-50 rounded-lg p-4">
            <p class="text-sm text-blue-800">
                This inquiry is related to a specific project. 
                <a href="<?php echo e(route('admin.projects.show', $inquiry->project_id)); ?>" class="font-medium underline hover:text-blue-600">
                    View Project Details
                </a>
            </p>
        </div>
    </div>
    <?php endif; ?>
</div>

<div class="mt-6 flex justify-between">
    <a href="<?php echo e(route('admin.inquiries.index')); ?>" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400 transition duration-300">
        Back to Inquiries
    </a>
    
    <form method="POST" action="<?php echo e(route('admin.inquiries.destroy', $inquiry)); ?>" class="inline" onsubmit="return confirm('Are you sure you want to delete this inquiry?')">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-300">
            Delete Inquiry
        </button>
    </form>
</div>

<script>
function copyInquiryInfo() {
    const info = `Name: <?php echo e($inquiry->name); ?>

Email: <?php echo e($inquiry->email); ?>

Phone: <?php echo e($inquiry->phone ?? 'N/A'); ?>

Subject: <?php echo e($inquiry->subject); ?>

Date: <?php echo e($inquiry->created_at->format('M d, Y \a\t g:i A')); ?>

Status: <?php echo e(ucfirst($inquiry->status)); ?>


Message:
<?php echo e($inquiry->message); ?>`;
    
    navigator.clipboard.writeText(info).then(function() {
        alert('Inquiry information copied to clipboard!');
    }, function(err) {
        console.error('Could not copy text: ', err);
    });
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\GurukrupaMarketing\resources\views/admin/inquiries/show.blade.php ENDPATH**/ ?>