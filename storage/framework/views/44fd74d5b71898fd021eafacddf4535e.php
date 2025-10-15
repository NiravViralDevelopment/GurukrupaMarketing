<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo $__env->yieldContent('title', 'Admin Dashboard'); ?></title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
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
<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="w-72 bg-gray-900 text-white flex-shrink-0 hidden lg:block">
            <div class="p-6">
                <h2 class="text-2xl font-bold text-primary">Gurukrupa Admin</h2>
            </div>
            
            <nav class="mt-8">
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-800 hover:text-white <?php echo e(request()->routeIs('admin.dashboard') ? 'bg-gray-800 text-white' : ''); ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v6H8V5z"></path>
                    </svg>
                    Dashboard
                </a>
                
                <a href="<?php echo e(route('admin.projects.index')); ?>" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-800 hover:text-white <?php echo e(request()->routeIs('admin.projects.*') ? 'bg-gray-800 text-white' : ''); ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                    Projects
                </a>
                
                <a href="<?php echo e(route('admin.blogs.index')); ?>" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-800 hover:text-white <?php echo e(request()->routeIs('admin.blogs.*') ? 'bg-gray-800 text-white' : ''); ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                    </svg>
                    Blog Posts
                </a>
                
                <a href="<?php echo e(route('admin.banners.index')); ?>" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-800 hover:text-white <?php echo e(request()->routeIs('admin.banners.*') ? 'bg-gray-800 text-white' : ''); ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    Banners
                </a>
                
                <a href="<?php echo e(route('admin.inquiries.index')); ?>" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-800 hover:text-white <?php echo e(request()->routeIs('admin.inquiries.*') ? 'bg-gray-800 text-white' : ''); ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    Inquiries
                </a>
                
                <a href="<?php echo e(route('admin.settings.index')); ?>" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-800 hover:text-white <?php echo e(request()->routeIs('admin.settings.*') ? 'bg-gray-800 text-white' : ''); ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    Settings
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
            <!-- Top Bar -->
            <header class="bg-white shadow-sm border-b flex-shrink-0">
                <div class="flex items-center justify-between px-4 lg:px-6 py-4">
                    <div class="flex items-center">
                        <!-- Mobile menu button -->
                        <button class="lg:hidden mr-4 p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100" onclick="toggleMobileMenu()">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                        <h1 class="text-xl lg:text-2xl font-semibold text-gray-900 truncate"><?php echo $__env->yieldContent('page-title', 'Dashboard'); ?></h1>
                    </div>
                    
                    <div class="flex items-center space-x-2 lg:space-x-4 flex-shrink-0">
                        <span class="text-gray-600 text-sm lg:text-base hidden sm:block">Welcome, <?php echo e(Auth::user()->name); ?></span>
                        <form method="POST" action="<?php echo e(route('logout')); ?>">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="text-gray-600 hover:text-gray-900 text-sm lg:text-base">Logout</button>
                        </form>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 p-6 overflow-auto">
                <?php if(session('success')): ?>
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    <?php echo e(session('success')); ?>

                </div>
                <?php endif; ?>

                <?php if(session('error')): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    <?php echo e(session('error')); ?>

                </div>
                <?php endif; ?>

                <?php echo $__env->yieldContent('content'); ?>
            </main>
        </div>
    </div>

    <!-- Mobile Sidebar Overlay -->
    <div id="mobile-sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden hidden" onclick="toggleMobileMenu()"></div>
    
    <!-- Mobile Sidebar -->
    <div id="mobile-sidebar" class="fixed inset-y-0 left-0 w-72 bg-gray-900 text-white z-50 transform -translate-x-full transition-transform duration-300 ease-in-out lg:hidden">
        <div class="p-6">
            <div class="flex items-center justify-between">
                <h2 class="text-2xl font-bold text-primary">Gurukrupa Admin</h2>
                <button onclick="toggleMobileMenu()" class="text-gray-300 hover:text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
        
        <nav class="mt-8">
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-800 hover:text-white <?php echo e(request()->routeIs('admin.dashboard') ? 'bg-gray-800 text-white' : ''); ?>">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v6H8V5z"></path>
                </svg>
                Dashboard
            </a>
            <a href="<?php echo e(route('admin.projects.index')); ?>" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-800 hover:text-white <?php echo e(request()->routeIs('admin.projects.*') ? 'bg-gray-800 text-white' : ''); ?>">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
                Projects
            </a>
            <a href="<?php echo e(route('admin.blogs.index')); ?>" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-800 hover:text-white <?php echo e(request()->routeIs('admin.blogs.*') ? 'bg-gray-800 text-white' : ''); ?>">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                </svg>
                Blog Posts
            </a>
            <a href="<?php echo e(route('admin.banners.index')); ?>" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-800 hover:text-white <?php echo e(request()->routeIs('admin.banners.*') ? 'bg-gray-800 text-white' : ''); ?>">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                Banners
            </a>
            <a href="<?php echo e(route('admin.inquiries.index')); ?>" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-800 hover:text-white <?php echo e(request()->routeIs('admin.inquiries.*') ? 'bg-gray-800 text-white' : ''); ?>">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                </svg>
                Inquiries
            </a>
            <a href="<?php echo e(route('admin.settings.index')); ?>" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-800 hover:text-white <?php echo e(request()->routeIs('admin.settings.*') ? 'bg-gray-800 text-white' : ''); ?>">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                Settings
            </a>
        </nav>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    
    <?php echo $__env->yieldPushContent('scripts'); ?>
    
    <script>
        function toggleMobileMenu() {
            const mobileSidebar = document.getElementById('mobile-sidebar');
            const overlay = document.getElementById('mobile-sidebar-overlay');
            
            if (mobileSidebar.classList.contains('-translate-x-full')) {
                mobileSidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
            } else {
                mobileSidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            }
        }
        
        // Close mobile menu when clicking on a link
        document.querySelectorAll('#mobile-sidebar a').forEach(link => {
            link.addEventListener('click', () => {
                const mobileSidebar = document.getElementById('mobile-sidebar');
                const overlay = document.getElementById('mobile-sidebar-overlay');
                mobileSidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            });
        });
    </script>
</body>
</html>
<?php /**PATH E:\Working\GurukrupaMarketing\resources\views/layouts/admin.blade.php ENDPATH**/ ?>