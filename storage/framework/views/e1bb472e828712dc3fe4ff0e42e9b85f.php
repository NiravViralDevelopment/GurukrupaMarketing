

<?php $__env->startSection('title', 'Home - Gurukrupa Real Estate'); ?>
<?php $__env->startSection('description', 'Leading real estate developer specializing in premium residential and commercial projects.'); ?>

<?php $__env->startSection('content'); ?>
<!-- Hero Section -->
<section class="relative h-screen bg-cover bg-center bg-no-repeat" style="background-image: url('https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1973&q=80')">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="relative z-10 flex items-center justify-center h-full">
        <div class="text-center text-white px-4">
            <h1 class="text-5xl md:text-7xl font-bold mb-6">Building Dreams</h1>
            <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto">Creating exceptional residential and commercial spaces that define modern living and business excellence.</p>
            <div class="space-x-4">
                <a href="<?php echo e(route('projects.index')); ?>" class="bg-primary text-white px-8 py-3 rounded-lg text-lg font-semibold hover:bg-yellow-600 transition duration-300 inline-block">Explore Projects</a>
                <a href="<?php echo e(route('contact')); ?>" class="border-2 border-white text-white px-8 py-3 rounded-lg text-lg font-semibold hover:bg-white hover:text-gray-900 transition duration-300 inline-block">Get Quote</a>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Who We Are</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Gurukrupa Real Estate is a leading developer with over two decades of experience in creating exceptional residential and commercial properties. We are committed to delivering quality, innovation, and customer satisfaction in every project.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="bg-primary w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">Quality Construction</h3>
                <p class="text-gray-600">We use premium materials and follow strict quality standards to ensure lasting value.</p>
            </div>
            
            <div class="text-center">
                <div class="bg-primary w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">Innovation</h3>
                <p class="text-gray-600">We embrace modern technology and sustainable practices in all our developments.</p>
            </div>
            
            <div class="text-center">
                <div class="bg-primary w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">Customer Focus</h3>
                <p class="text-gray-600">Your satisfaction is our priority, and we work closely with you throughout the process.</p>
            </div>
        </div>
    </div>
</section>

<!-- Featured Projects -->
<section class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Featured Projects</h2>
            <p class="text-xl text-gray-600">Discover our latest and most prestigious developments</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php $__currentLoopData = $featuredProjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                <div class="h-64 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80')">
                    <div class="bg-primary text-white px-3 py-1 inline-block m-4 rounded">
                        <?php echo e(ucfirst(str_replace('_', ' ', $project->category))); ?>

                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2"><?php echo e($project->title); ?></h3>
                    <p class="text-gray-600 mb-4"><?php echo e($project->short_description); ?></p>
                    <div class="flex justify-between items-center">
                        <span class="text-primary font-semibold"><?php echo e($project->location); ?></span>
                        <a href="<?php echo e(route('projects.show', $project)); ?>" class="text-primary hover:text-yellow-600 transition duration-300">View Details →</a>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        
        <div class="text-center mt-12">
            <a href="<?php echo e(route('projects.index')); ?>" class="bg-primary text-white px-8 py-3 rounded-lg text-lg font-semibold hover:bg-yellow-600 transition duration-300">View All Projects</a>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-20 bg-primary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center text-white">
            <div>
                <div class="text-5xl font-bold mb-2"><?php echo e($stats['total_projects']); ?>+</div>
                <div class="text-xl">Projects Completed</div>
            </div>
            <div>
                <div class="text-5xl font-bold mb-2"><?php echo e($stats['completed_projects']); ?>+</div>
                <div class="text-xl">Happy Customers</div>
            </div>
            <div>
                <div class="text-5xl font-bold mb-2"><?php echo e($stats['ongoing_projects']); ?>+</div>
                <div class="text-xl">Ongoing Projects</div>
            </div>
        </div>
    </div>
</section>

<!-- Latest News -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Latest News</h2>
            <p class="text-xl text-gray-600">Stay updated with our latest news and insights</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php $__currentLoopData = $latestBlogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <article class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                <div class="h-48 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80')"></div>
                <div class="p-6">
                    <div class="text-sm text-gray-500 mb-2"><?php echo e($blog->published_at->format('M d, Y')); ?></div>
                    <h3 class="text-xl font-semibold mb-2"><?php echo e($blog->title); ?></h3>
                    <p class="text-gray-600 mb-4"><?php echo e(Str::limit($blog->excerpt, 100)); ?></p>
                    <a href="<?php echo e(route('blogs.show', $blog)); ?>" class="text-primary hover:text-yellow-600 transition duration-300">Read More →</a>
                </div>
            </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        
        <div class="text-center mt-12">
            <a href="<?php echo e(route('blogs.index')); ?>" class="bg-primary text-white px-8 py-3 rounded-lg text-lg font-semibold hover:bg-yellow-600 transition duration-300">View All News</a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gray-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl font-bold mb-4">Ready to Start Your Project?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto">Get in touch with us today and let's discuss how we can bring your vision to life.</p>
        <a href="<?php echo e(route('contact')); ?>" class="bg-primary text-white px-8 py-3 rounded-lg text-lg font-semibold hover:bg-yellow-600 transition duration-300">Contact Us Today</a>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\GurukrupaMarketing\resources\views/frontend/home.blade.php ENDPATH**/ ?>