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
               class="bg-green-500 hover:bg-green-600 text-white p-4 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-110 group">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
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
<?php /**PATH E:\Working\GurukrupaMarketing\resources\views/layouts/app.blade.php ENDPATH**/ ?>