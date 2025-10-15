

<?php $__env->startSection('title', $project->title . ' - Gurukrupa Real Estate'); ?>
<?php $__env->startSection('description', $project->short_description); ?>

<?php $__env->startSection('content'); ?>
<!-- Hero Section -->
<section class="relative h-96 bg-cover bg-center" 
         style="background-image: url('<?php echo e($project->primaryImage() ? $project->primaryImage()->image_url : ($project->images->first() ? $project->images->first()->image_url : 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80')); ?>')">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="relative z-10 flex items-center justify-center h-full">
        <div class="text-center text-white px-4">
            <h1 class="text-4xl md:text-6xl font-bold mb-4"><?php echo e($project->title); ?></h1>
            <p class="text-xl md:text-2xl"><?php echo e($project->location); ?></p>
        </div>
    </div>
</section>

<!-- Project Details -->
<section class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <div class="mb-8">
                    <div class="flex items-center gap-4 mb-6">
                        <span class="bg-primary text-white px-4 py-2 rounded-lg">
                            <?php echo e(ucfirst(str_replace('_', ' ', $project->category))); ?>

                        </span>
                        <?php if($project->is_featured): ?>
                        <span class="bg-yellow-500 text-white px-4 py-2 rounded-lg">Featured</span>
                        <?php endif; ?>
                    </div>
                    
                    <h2 class="text-3xl font-bold mb-4">Project Overview</h2>
                    <div class="prose max-w-none text-gray-700">
                        <?php echo nl2br(e($project->description)); ?>

                    </div>
                </div>

                <!-- Features -->
                <?php if($project->features && count($project->features) > 0): ?>
                <div class="mb-8">
                    <h3 class="text-2xl font-bold mb-4">Key Features</h3>
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

                <!-- Amenities -->
                <?php if($project->amenities && count($project->amenities) > 0): ?>
                <div class="mb-8">
                    <h3 class="text-2xl font-bold mb-4">Amenities & Facilities</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <?php $__currentLoopData = $project->amenities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amenity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex items-center bg-gray-50 p-3 rounded-lg">
                            <svg class="w-5 h-5 text-primary mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="font-medium"><?php echo e($amenity); ?></span>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Project Gallery -->
                <?php if($project->images->count() > 0): ?>
                <div class="mb-8">
                    <h3 class="text-2xl font-bold mb-4">Project Gallery</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <?php $__currentLoopData = $project->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="aspect-w-16 aspect-h-9">
                            <img src="<?php echo e($image->image_url); ?>" alt="<?php echo e($image->alt_text ?: $project->title); ?>" class="w-full h-64 object-cover rounded-lg hover:scale-105 transition-transform duration-300 cursor-pointer" onclick="openImageModal('<?php echo e($image->image_url); ?>', '<?php echo e($image->alt_text ?: $project->title); ?>')">
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <?php else: ?>
                <div class="mb-8">
                    <h3 class="text-2xl font-bold mb-4">Project Gallery</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="aspect-w-16 aspect-h-9">
                            <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="<?php echo e($project->title); ?>" class="w-full h-64 object-cover rounded-lg">
                        </div>
                        <div class="aspect-w-16 aspect-h-9">
                            <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="<?php echo e($project->title); ?>" class="w-full h-64 object-cover rounded-lg">
                        </div>
                        <div class="aspect-w-16 aspect-h-9">
                            <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="<?php echo e($project->title); ?>" class="w-full h-64 object-cover rounded-lg">
                        </div>
                        <div class="aspect-w-16 aspect-h-9">
                            <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="<?php echo e($project->title); ?>" class="w-full h-64 object-cover rounded-lg">
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <div class="bg-gray-50 rounded-lg p-6 sticky top-8">
                    <h3 class="text-xl font-bold mb-4">Project Details</h3>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="text-sm font-semibold text-gray-600">Location</label>
                            <p class="text-gray-900"><?php echo e($project->location); ?></p>
                        </div>
                        
                        <?php if($project->area): ?>
                        <div>
                            <label class="text-sm font-semibold text-gray-600">Area</label>
                            <p class="text-gray-900"><?php echo e($project->area); ?></p>
                        </div>
                        <?php endif; ?>
                        
                        <?php if($project->price): ?>
                        <div>
                            <label class="text-sm font-semibold text-gray-600">Price</label>
                            <p class="text-gray-900 font-semibold">₹<?php echo e(number_format($project->price / 100000, 1)); ?>L</p>
                        </div>
                        <?php endif; ?>
                        
                        <?php if($project->start_date): ?>
                        <div>
                            <label class="text-sm font-semibold text-gray-600">Start Date</label>
                            <p class="text-gray-900"><?php echo e($project->start_date->format('M d, Y')); ?></p>
                        </div>
                        <?php endif; ?>
                        
                        <?php if($project->end_date): ?>
                        <div>
                            <label class="text-sm font-semibold text-gray-600">Completion Date</label>
                            <p class="text-gray-900"><?php echo e($project->end_date->format('M d, Y')); ?></p>
                        </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="mt-8 space-y-4">
                        <a href="<?php echo e(route('contact')); ?>?project=<?php echo e($project->id); ?>" class="w-full bg-primary text-white py-3 px-6 rounded-lg font-semibold hover:bg-yellow-600 transition duration-300 text-center block">
                            Get Quote
                        </a>
                        
                        <button id="downloadBrochureBtn" class="w-full bg-gray-800 text-white py-3 px-6 rounded-lg font-semibold hover:bg-gray-700 transition duration-300 text-center flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Download Brochure
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Projects -->
<?php if($relatedProjects->count() > 0): ?>
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center mb-12">Related Projects</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php $__currentLoopData = $relatedProjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relatedProject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                <?php
                    // Get the primary image or first image for the related project
                    $relatedProjectImage = $relatedProject->primaryImage() ? $relatedProject->primaryImage()->image_url : 
                                         ($relatedProject->images->first() ? $relatedProject->images->first()->image_url : 
                                         'https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80');
                ?>
                <div class="h-48 bg-cover bg-center" style="background-image: url('<?php echo e($relatedProjectImage); ?>')"></div>
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-2"><?php echo e($relatedProject->title); ?></h3>
                    <p class="text-gray-600 mb-4"><?php echo e(Str::limit($relatedProject->short_description, 80)); ?></p>
                    <a href="<?php echo e(route('projects.show', $relatedProject)); ?>" class="text-primary hover:text-yellow-600 transition duration-300">View Details →</a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Image Modal -->
<div id="imageModal" class="fixed inset-0 bg-black bg-opacity-75 z-50 hidden flex items-center justify-center p-4">
    <div class="relative max-w-4xl max-h-full">
        <button onclick="closeImageModal()" class="absolute top-4 right-4 text-white text-2xl font-bold hover:text-gray-300 z-10">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
        <img id="modalImage" src="" alt="" class="max-w-full max-h-full rounded-lg">
        <p id="modalCaption" class="text-white text-center mt-4 text-lg"></p>
    </div>
</div>

<!-- Brochure Download Modal -->
<div id="brochureModal" class="fixed inset-0 bg-black bg-opacity-75 z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-md w-full mx-4 relative">
        <button onclick="closeBrochureModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 z-10">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
        
        <div class="p-8">
            <div class="text-center mb-6">
                <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Download Brochure</h3>
                <p class="text-gray-600">Please provide your details to download the project brochure</p>
            </div>
            
            <form id="brochureForm" class="space-y-4">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="project_id" value="<?php echo e($project->id); ?>">
                
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Full Name *</label>
                    <input type="text" id="name" name="name" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition duration-300"
                           placeholder="Enter your full name">
                </div>
                
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email Address *</label>
                    <input type="email" id="email" name="email" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition duration-300"
                           placeholder="Enter your email address">
                </div>
                
                <div>
                    <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">Phone Number *</label>
                    <input type="tel" id="phone" name="phone" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition duration-300"
                           placeholder="Enter your phone number">
                </div>
                
                <div class="pt-4">
                    <button type="submit" id="submitBtn" 
                            class="w-full bg-primary text-white py-3 px-6 rounded-lg font-semibold hover:bg-yellow-600 transition duration-300 flex items-center justify-center">
                        <span id="submitText">Download Brochure</span>
                        <svg id="loadingSpinner" class="hidden w-5 h-5 ml-2 animate-spin" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </button>
                </div>
            </form>
            
            <div id="successMessage" class="hidden text-center mt-6 p-4 bg-green-50 border border-green-200 rounded-lg">
                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <h4 class="text-lg font-semibold text-green-800 mb-2">Thank You!</h4>
                <p class="text-green-700 mb-4">Your details have been recorded. The brochure will download automatically.</p>
                <button onclick="closeBrochureModal()" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
// Simple, bulletproof brochure modal implementation
function openBrochureModal() {
    console.log('Opening brochure modal');
    const modal = document.getElementById('brochureModal');
    if (modal) {
        modal.style.display = 'flex';
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
        
        // Reset form
        const form = document.getElementById('brochureForm');
        const successMsg = document.getElementById('successMessage');
        if (form) {
            form.reset();
            form.style.display = 'block';
        }
        if (successMsg) {
            successMsg.style.display = 'none';
        }
    } else {
        console.error('Brochure modal not found');
    }
}

function closeBrochureModal() {
    console.log('Closing brochure modal');
    const modal = document.getElementById('brochureModal');
    if (modal) {
        modal.style.display = 'none';
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }
}

function openImageModal(imageSrc, imageAlt) {
    const modal = document.getElementById('imageModal');
    const modalImage = document.getElementById('modalImage');
    const modalCaption = document.getElementById('modalCaption');
    if (modal && modalImage && modalCaption) {
        modalImage.src = imageSrc;
        modalCaption.textContent = imageAlt;
        modal.style.display = 'flex';
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }
}

function closeImageModal() {
    const modal = document.getElementById('imageModal');
    if (modal) {
        modal.style.display = 'none';
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }
}

// Wait for page to load
document.addEventListener('DOMContentLoaded', function() {
    console.log('Page loaded, setting up brochure modal');
    
    // Get elements
    const downloadBtn = document.getElementById('downloadBrochureBtn');
    const brochureModal = document.getElementById('brochureModal');
    const brochureForm = document.getElementById('brochureForm');
    const imageModal = document.getElementById('imageModal');
    
    // Set up download button
    if (downloadBtn) {
        downloadBtn.addEventListener('click', function(e) {
            e.preventDefault();
            console.log('Download brochure button clicked');
            openBrochureModal();
        });
        console.log('Download button event listener added');
    } else {
        console.error('Download button not found');
    }
    
    // Set up modal close on outside click
    if (brochureModal) {
        brochureModal.addEventListener('click', function(e) {
            if (e.target === this) {
                closeBrochureModal();
            }
        });
    }
    
    if (imageModal) {
        imageModal.addEventListener('click', function(e) {
            if (e.target === this) {
                closeImageModal();
            }
        });
    }
    
    // Set up form submission
    if (brochureForm) {
        brochureForm.addEventListener('submit', function(e) {
            e.preventDefault();
            console.log('Form submitted');
            
            const submitBtn = document.getElementById('submitBtn');
            const submitText = document.getElementById('submitText');
            const loadingSpinner = document.getElementById('loadingSpinner');
            
            // Show loading state
            if (submitBtn) submitBtn.disabled = true;
            if (submitText) submitText.textContent = 'Processing...';
            if (loadingSpinner) loadingSpinner.style.display = 'inline';
            
            // Get form data
            const formData = new FormData(this);
            
            // Submit form
            fetch('<?php echo e(route("brochure.request")); ?>', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                console.log('Response received:', data);
                if (data.success) {
                    // Show success message
                    const form = document.getElementById('brochureForm');
                    const successMsg = document.getElementById('successMessage');
                    if (form) form.style.display = 'none';
                    if (successMsg) successMsg.style.display = 'block';
                    
                    // Download brochure if available
                    if (data.download_url) {
                        window.open(data.download_url, '_blank');
                    }
                } else {
                    alert(data.message || 'An error occurred. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
            })
            .finally(() => {
                // Reset button state
                if (submitBtn) submitBtn.disabled = false;
                if (submitText) submitText.textContent = 'Download Brochure';
                if (loadingSpinner) loadingSpinner.style.display = 'none';
            });
        });
    }
    
    // Make functions globally available
    window.openBrochureModal = openBrochureModal;
    window.closeBrochureModal = closeBrochureModal;
    window.openImageModal = openImageModal;
    window.closeImageModal = closeImageModal;
    
    console.log('Brochure modal setup complete');
});
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Working\GurukrupaMarketing\resources\views/frontend/projects/show.blade.php ENDPATH**/ ?>