

<?php $__env->startSection('title', 'Blog - ' . ($settings['site_name'] ?? 'Gurukrupa Real Estate')); ?>
<?php $__env->startSection('description', 'Read our latest blog posts about real estate trends, home buying tips, and construction insights from Gurukrupa Real Estate.'); ?>

<?php $__env->startSection('content'); ?>
<!-- Hero Section -->
<section class="bg-gradient-to-r from-primary to-yellow-600 text-white py-20">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">Our Blog</h1>
            <p class="text-xl md:text-2xl mb-8">Insights, Tips & Trends in Real Estate</p>
            <p class="text-lg opacity-90">Stay updated with the latest real estate news, home buying guides, and industry insights from our experts.</p>
        </div>
    </div>
</section>

<!-- Blog Posts -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <?php if($blogs->count() > 0): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <?php if($blog->featured_image): ?>
                    <div class="relative">
                        <img src="<?php echo e($blog->featured_image_url); ?>" alt="<?php echo e($blog->title); ?>" class="w-full h-48 object-cover">
                        <?php if($blog->is_featured): ?>
                        <div class="absolute top-4 left-4">
                            <span class="bg-primary text-white px-3 py-1 rounded-full text-sm font-medium">Featured</span>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                    
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-3">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <?php echo e($blog->published_at ? $blog->published_at->format('M d, Y') : $blog->created_at->format('M d, Y')); ?>

                        </div>
                        
                        <h2 class="text-xl font-bold text-gray-900 mb-3 hover:text-primary transition duration-300">
                            <a href="<?php echo e(route('blogs.show', $blog)); ?>"><?php echo e($blog->title); ?></a>
                        </h2>
                        
                        <?php if($blog->excerpt): ?>
                        <p class="text-gray-600 mb-4"><?php echo e(Str::limit($blog->excerpt, 120)); ?></p>
                        <?php endif; ?>
                        
                        <div class="flex items-center justify-between">
                            <a href="<?php echo e(route('blogs.show', $blog)); ?>" class="text-primary font-semibold hover:text-yellow-600 transition duration-300">
                                Read More
                                <svg class="w-4 h-4 inline ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                            
                            <div class="flex items-center text-sm text-gray-500">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                <?php echo e($blog->views_count ?? 0); ?> views
                            </div>
                        </div>
                    </div>
                </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            
            <!-- Pagination -->
            <div class="mt-12">
                <?php echo e($blogs->links()); ?>

            </div>
            <?php else: ?>
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">No blog posts yet</h3>
                <p class="mt-1 text-sm text-gray-500">We're working on creating amazing content for you. Check back soon!</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Stay Updated</h2>
            <p class="text-lg text-gray-600 mb-8">Subscribe to our newsletter for the latest real estate insights and project updates.</p>
            
            <form class="max-w-md mx-auto flex gap-4">
                <input type="email" placeholder="Enter your email" class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary">
                <button type="submit" class="bg-primary text-white px-6 py-3 rounded-lg font-semibold hover:bg-yellow-600 transition duration-300">
                    Subscribe
                </button>
            </form>
        </div>
    </div>
</section>

<!-- Categories Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Explore by Category</h2>
                <p class="text-lg text-gray-600">Find content that interests you most</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-gradient-to-br from-primary to-yellow-600 text-white p-6 rounded-lg text-center hover:shadow-lg transition duration-300">
                    <svg class="w-12 h-12 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                    <h3 class="text-lg font-semibold mb-2">Home Buying</h3>
                    <p class="text-sm opacity-90">Tips and guides for first-time buyers</p>
                </div>
                
                <div class="bg-gradient-to-br from-blue-500 to-blue-700 text-white p-6 rounded-lg text-center hover:shadow-lg transition duration-300">
                    <svg class="w-12 h-12 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                    <h3 class="text-lg font-semibold mb-2">Market Trends</h3>
                    <p class="text-sm opacity-90">Latest real estate market analysis</p>
                </div>
                
                <div class="bg-gradient-to-br from-green-500 to-green-700 text-white p-6 rounded-lg text-center hover:shadow-lg transition duration-300">
                    <svg class="w-12 h-12 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                    <h3 class="text-lg font-semibold mb-2">Investment</h3>
                    <p class="text-sm opacity-90">Real estate investment strategies</p>
                </div>
                
                <div class="bg-gradient-to-br from-purple-500 to-purple-700 text-white p-6 rounded-lg text-center hover:shadow-lg transition duration-300">
                    <svg class="w-12 h-12 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                    </svg>
                    <h3 class="text-lg font-semibold mb-2">Interior Design</h3>
                    <p class="text-sm opacity-90">Home decoration and design ideas</p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\GurukrupaMarketing\resources\views/frontend/blogs/index.blade.php ENDPATH**/ ?>