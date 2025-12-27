<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('uploads/1759054600_favicon.png') }}" type="image/png">

    <!-- Dynamic Title -->
    <title>@yield('title', 'গোটিয়া শোমসের আলী উচ্চ বিদ্যালয় - পুনর্মিলনী ২০২৬')</title>

    <!-- Dynamic Meta Description -->
    <meta name="description" content="@yield('description', 'আমাদের বিদ্যালয়ের সকল প্রাক্তন ও বর্তমান শিক্ষার্থীদের একসাথে নিয়ে আসার প্রচেষ্টা।')">

    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/datatables/datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/datatables/buttons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/datatables/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.output.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

    @stack('styles')
</head>

<body class="bg-gray-50">
    <!-- Navigation -->
    <header class="fixed top-0 left-0 right-0 z-50 glass-nav bg-black/40 backdrop-blur-lg"
        style="background-color: #3d484b;">
        <div class="container mx-auto px-6">
            <div class="flex items-center justify-between py-2">
                <!-- Logo -->
                <div class="flex items-center space-x-4">
                    <a href="{{ route('home') }}" class="flex items-center space-x-2">
                        <img src="{{ asset('assets/images/logo.jpeg') }}" alt="Logo"
                            class="w-auto h-16 md:h-20 shadow-lg">
                    </a>
                </div>
                <!-- Desktop Navigation -->
                <nav class="hidden lg:flex items-center space-x-2">
                    <a href="{{ route('home') }}"
                        class="flex items-center space-x-2 px-4 py-2 rounded-xl font-medium text-white hover:bg-white/10 transition-all duration-300">
                        <i class="fas fa-home text-orange-400"></i>
                        <span>হোম</span>
                    </a>
                    <a href="{{ route('home') }}#registration"
                        class="flex items-center space-x-2 px-4 py-2 rounded-xl font-medium text-white hover:bg-white/10 transition-all duration-300">
                        <i class="fas fa-user-plus text-orange-400"></i>
                        <span>নিবন্ধন</span>
                    </a>
                    <a href="{{ route('registered-students.index') }}"
                        class="flex items-center space-x-2 px-4 py-2 rounded-xl font-medium text-white hover:bg-white/10 transition-all duration-300">
                        <i class="fas fa-users text-orange-400"></i>
                        <span>নিবন্ধনকৃত শিক্ষার্থী</span>
                    </a>
                    <a href="{{ route('alumni.index') }}"
                        class="flex items-center space-x-2 px-4 py-2 rounded-xl font-medium text-white hover:bg-white/10 transition-all duration-300">
                        <i class="fas fa-users text-orange-400"></i>
                        <span>প্রাক্তন ছাত্র/ছাত্রী</span>
                    </a>
                    <a href="{{ route('home') }}#events"
                        class="flex items-center space-x-2 px-4 py-2 rounded-xl font-medium text-white hover:bg-white/10 transition-all duration-300">
                        <i class="fas fa-calendar text-orange-400"></i>
                        <span>কার্যক্রম</span>
                    </a>
                </nav>
                <!-- Action Buttons (Desktop) -->
                <div class="hidden lg:flex items-center space-x-4">
                    <a href="{{ route('home') }}#contact"
                        class="bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white px-5 py-2 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105 inline-flex items-center">
                        <i class="fas fa-phone mr-2"></i> যোগাযোগ
                    </a>
                    <a onclick="showDonationModal()"
                        class="bg-gradient-to-r from-orange-500 via-red-500 to-pink-600 hover:from-orange-600 hover:via-red-600 hover:to-pink-700 text-white px-5 py-2 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105 inline-flex items-center cursor-pointer">
                        <i class="fa-solid fa-hand-holding-dollar mr-2"></i> ডোনেশন
                    </a>
                </div>
                <!-- Mobile Hamburger -->
                <button id="menu-btn" class="lg:hidden text-white text-2xl focus:outline-none">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div id="mobile-menu"
            class="lg:hidden hidden flex flex-col bg-black/90 text-white px-6 py-4 space-y-3 transition-all duration-300">
            <a href="{{ route('home') }}" class="flex items-center space-x-2 py-2 border-b border-gray-700">
                <i class="fas fa-home text-orange-400"></i><span>হোম</span>
            </a>
            <a href="{{ route('home') }}#registration"
                class="flex items-center space-x-2 py-2 border-b border-gray-700">
                <i class="fas fa-user-plus text-orange-400"></i><span>নিবন্ধন</span>
            </a>
            <a href="{{ route('alumni.index') }}" class="flex items-center space-x-2 py-2 border-b border-gray-700">
                <i class="fas fa-users text-orange-400"></i><span>নিবন্ধনকৃত শিক্ষার্থী</span>
            </a>

            <a href="{{ route('alumni.index') }}" rel="noopener noreferrer"
                class="flex items-center space-x-2 py-2 border-b border-gray-700">
                <i class="fas fa-users text-orange-400"></i>
                <span>নিবন্ধনকৃত শিক্ষার্থী</span>
            </a>

            <a href="{{ route('home') }}#events" class="flex items-center space-x-2 py-2 border-b border-gray-700">
                <i class="fas fa-calendar text-orange-400"></i><span>কার্যক্রম</span>
            </a>
            <a href="{{ route('home') }}#contact"
                class="bg-gradient-to-r from-purple-600 to-pink-600 text-white px-5 py-2 rounded-xl font-semibold shadow-lg hover:scale-105 inline-flex items-center">
                <i class="fas fa-phone mr-2"></i> যোগাযোগ
            </a>
            <a onclick="showDonationModal()"
                class="bg-gradient-to-r from-orange-500 via-red-500 to-pink-600 text-white px-5 py-2 rounded-xl font-semibold shadow-lg hover:scale-105 inline-flex items-center cursor-pointer">
                <i class="fa-solid fa-hand-holding-dollar mr-2"></i> ডোনেশন
            </a>
        </div>
    </header>

    <a href="#top" id="scrollTopBtn" title="Go to top"
        class="fixed bottom-5 right-5 z-50 px-3 py-2 text-white bg-gradient-to-br from-purple-600 to-pink-600 rounded-2xl shadow-2xl transition-opacity opacity-0 pointer-events-none">
        <i class="fas fa-arrow-up"></i>
    </a>

    <div id="top"></div>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    @include('partials.donation-modal')
    @include('partials.rules-modal')

    <!-- Footer -->
    <footer class="bg-gray-900 text-white pt-12 pb-10">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-3 gap-8 text-center">
                <!-- Column 1: Logo & Intro -->
                <div class="md:col-span-2 sm:col-span-2 lg:col-span-2">
                    <a href="{{ route('home') }}">
                        <div class="flex items-center space-x-3 xs:flex-col">
                            <div class="w-16 h-16 bg-gradient-to-br">
                                <img src="{{ asset('assets/images/logo.jpeg') }}" alt="Logo" class="w-12 h-12">
                            </div>
                            <div>
                                <h3 class="font-bold mb-2">গোটিয়া শোমসের আলী উচ্চ বিদ্যালয়</h3>
                                <p class="text-sm text-gray-400">পুনর্মিলনী ২০২৬</p>
                            </div>
                        </div>
                    </a>
                    <p class="text-gray-400 text-sm">
                        আমাদের বিদ্যালয়ের সকল প্রাক্তন ও বর্তমান শিক্ষার্থীদের একসাথে নিয়ে আসার প্রচেষ্টা।
                    </p>
                </div>

                <!-- Column 3: Contact Info -->
                <div>
                    <h4 class="font-bold mb-2">যোগাযোগের তথ্য</h4>
                    <ul class="space-y-2 text-sm">
                        <li class="text-gray-400"><i class="fas fa-phone mr-2"></i>01610333033</li>
                        <li class="text-gray-400"><i class="fas fa-envelope mr-2"></i>reunion.gsahs@gmail.com</li>
                        <li class="text-gray-400"><i class="fas fa-map-marker-alt mr-2"></i>গোটিয়া, মেছরা, সিরাজগঞ্জ
                        </li>
                    </ul>
                </div>

                <!-- Column 4: Social & Payment -->
                <div class="text-center">
                    <h4 class="font-bold mb-3">অন্যান্য লিঙ্ক</h4>
                    <div class="flex justify-center space-x-4 mb-6">
                        <a href="#" target="_blank"
                            class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center hover:bg-blue-700 transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-red-600 rounded-full flex items-center justify-center hover:bg-blue-500 transition-colors">
                            <i class="fa-brands fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Bottom Footer -->
            <div class="border-t border-gray-800 mt-8 pt-8 text-center">
                <p class="text-gray-400 text-sm">
                    © ২০২৬ গোটিয়া শোমসের আলী উচ্চ বিদ্যালয় । সকল অধিকার সংরক্ষিত | ডেভেলপ করেছেন পুনর্মিলনী কমিটি
                </p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables/custom.js') }}"></script>
    <script src="{{ asset('assets/js/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>

    <!-- Mobile Menu Toggle -->
    <script>
        document.getElementById("menu-btn").addEventListener("click", function() {
            const menu = document.getElementById("mobile-menu");
            menu.classList.toggle("hidden");
        });
    </script>

    @stack('scripts')
</body>

</html>
