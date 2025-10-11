<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo $__env->yieldContent('title', 'Gurukrupa Real Estate'); ?></title>
    <meta name="description" content="<?php echo $__env->yieldContent('description', 'Leading real estate developer specializing in premium residential and commercial projects.'); ?>">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#D4AF37',
                        secondary: '#1a1a1a',
                    }
                }
            }
        }
    </script>
</head>
<body class="font-sans antialiased bg-white">
    <div class="min-h-screen">
        <!-- Navigation -->
        <nav class="bg-white shadow-lg sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <a href="<?php echo e(route('home')); ?>" class="flex-shrink-0">
                            <h1 class="text-2xl font-bold text-primary">Gurukrupa</h1>
                        </a>
                    </div>
                    
                    <div class="hidden md:flex items-center space-x-8">
                        <a href="<?php echo e(route('home')); ?>" class="text-gray-700 hover:text-primary transition duration-300 <?php echo e(request()->routeIs('home') ? 'text-primary font-semibold' : ''); ?>">Home</a>
                        <a href="<?php echo e(route('about')); ?>" class="text-gray-700 hover:text-primary transition duration-300 <?php echo e(request()->routeIs('about') ? 'text-primary font-semibold' : ''); ?>">About</a>
                        <a href="<?php echo e(route('projects.index')); ?>" class="text-gray-700 hover:text-primary transition duration-300 <?php echo e(request()->routeIs('projects.*') ? 'text-primary font-semibold' : ''); ?>">Projects</a>
                        <a href="<?php echo e(route('blogs.index')); ?>" class="text-gray-700 hover:text-primary transition duration-300 <?php echo e(request()->routeIs('blogs.*') ? 'text-primary font-semibold' : ''); ?>">Blog</a>
                        <a href="<?php echo e(route('contact')); ?>" class="text-gray-700 hover:text-primary transition duration-300 <?php echo e(request()->routeIs('contact') ? 'text-primary font-semibold' : ''); ?>">Contact</a>
                        <a href="<?php echo e(route('contact')); ?>" class="bg-primary text-white px-6 py-2 rounded-lg hover:bg-yellow-600 transition duration-300">Get Quote</a>
                    </div>
                    
                    <!-- Mobile menu button -->
                    <div class="md:hidden flex items-center">
                        <button type="button" class="text-gray-700 hover:text-primary focus:outline-none focus:text-primary" onclick="toggleMobileMenu()">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Mobile menu -->
            <div id="mobile-menu" class="md:hidden hidden bg-white border-t">
                <div class="px-2 pt-2 pb-3 space-y-1">
                    <a href="<?php echo e(route('home')); ?>" class="block px-3 py-2 text-gray-700 hover:text-primary">Home</a>
                    <a href="<?php echo e(route('about')); ?>" class="block px-3 py-2 text-gray-700 hover:text-primary">About</a>
                    <a href="<?php echo e(route('projects.index')); ?>" class="block px-3 py-2 text-gray-700 hover:text-primary">Projects</a>
                    <a href="<?php echo e(route('blogs.index')); ?>" class="block px-3 py-2 text-gray-700 hover:text-primary">Blog</a>
                    <a href="<?php echo e(route('contact')); ?>" class="block px-3 py-2 text-gray-700 hover:text-primary">Contact</a>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main>
            <?php echo $__env->yieldContent('content'); ?>
        </main>

        <!-- WhatsApp Floating Button -->
        <?php
            $settings = \App\Models\Setting::getAll();
            $whatsappNumber = $settings['contact_phone'] ?? '919876543210';
            $whatsappNumber = preg_replace('/[^0-9]/', '', $whatsappNumber);
            $whatsappMessage = urlencode('Hi Gurukrupa Real Estate, I am interested in your properties. Please provide more information.');
        ?>
        <div class="fixed bottom-6 right-6 z-50">
            <a href="https://wa.me/<?php echo e($whatsappNumber); ?>?text=<?php echo e($whatsappMessage); ?>" 
               target="_blank" 
               class="bg-green-500 hover:bg-green-600 text-white w-14 h-14 flex items-center justify-center rounded-full shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-110 group">
                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 448 512">
                    <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/>
                </svg>
                <div class="absolute right-16 top-1/2 transform -translate-y-1/2 bg-gray-900 text-white px-3 py-2 rounded-lg text-sm whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    Chat with us on WhatsApp
                </div>
            </a>
        </div>

        <!-- Footer -->
        <footer class="bg-gray-900 text-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div class="col-span-1 md:col-span-2">
                        <h3 class="text-2xl font-bold text-primary mb-4">Gurukrupa Real Estate</h3>
                        <p class="text-gray-300 mb-4">Leading real estate developer specializing in premium residential and commercial projects with a commitment to quality and innovation.</p>
                        <div class="flex space-x-4">
                            <a href="#" class="text-gray-300 hover:text-primary transition duration-300">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                </svg>
                            </a>
                            <a href="#" class="text-gray-300 hover:text-primary transition duration-300">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                                </svg>
                            </a>
                            <a href="#" class="text-gray-300 hover:text-primary transition duration-300">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.746-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001 12.017.001z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    
                    <div>
                        <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                        <ul class="space-y-2">
                            <li><a href="<?php echo e(route('home')); ?>" class="text-gray-300 hover:text-primary transition duration-300">Home</a></li>
                            <li><a href="<?php echo e(route('about')); ?>" class="text-gray-300 hover:text-primary transition duration-300">About</a></li>
                            <li><a href="<?php echo e(route('projects.index')); ?>" class="text-gray-300 hover:text-primary transition duration-300">Projects</a></li>
                            <li><a href="<?php echo e(route('blogs.index')); ?>" class="text-gray-300 hover:text-primary transition duration-300">Blog</a></li>
                        </ul>
                    </div>
                    
                    <div>
                        <h4 class="text-lg font-semibold mb-4">Contact Info</h4>
                        <div class="space-y-2 text-gray-300">
                            <p>123 Business District</p>
                            <p>Mumbai, Maharashtra 400001</p>
                            <p>Phone: +91 9876543210</p>
                            <p>Email: info@gurukrupa.com</p>
                        </div>
                    </div>
                </div>
                
                <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-300">
                    <p>&copy; <?php echo e(date('Y')); ?> Gurukrupa Real Estate. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }
    </script>
</body>
</html>
<?php /**PATH C:\wamp64\www\GurukrupaMarketing\resources\views/layouts/app.blade.php ENDPATH**/ ?>