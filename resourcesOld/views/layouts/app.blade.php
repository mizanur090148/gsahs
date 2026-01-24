<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('uploads/1759054600_favicon.png') }}" type="image/png">

    <!-- Dynamic Title -->
    <title>@yield('title', 'গোটিয়া শোমসের আলী উচ্চ বিদ্যালয় - পুনর্মিলনী-২০২৬')</title>

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
        <div class="container px-6 mx-auto">
            <div class="flex items-center justify-between py-2">
                <!-- Logo -->
                <div class="flex items-center space-x-4">
                    <a href="{{ route('home') }}" class="flex items-center space-x-2">
                        <img src="{{ asset('assets/images/logo.jpeg') }}" alt="Logo"
                            class="w-auto h-16 shadow-lg md:h-20">
                    </a>
                </div>
                <!-- Desktop Navigation -->
                <nav class="items-center hidden space-x-2 lg:flex">
                    <a href="{{ route('home') }}"
                        class="flex items-center px-4 py-2 space-x-2 font-medium text-white transition-all duration-300 rounded-xl hover:bg-white/10">
                        <i class="text-orange-400 fas fa-home"></i>
                        <span>হোম</span>
                    </a>
                    <a href="{{ route('home') }}#registration"
                        class="flex items-center px-4 py-2 space-x-2 font-medium text-white transition-all duration-300 rounded-xl hover:bg-white/10">
                        <i class="text-orange-400 fas fa-user-plus"></i>
                        <span>নিবন্ধন</span>
                    </a>
                    <a href="{{ route('registered-students.index') }}"
                        class="flex items-center px-4 py-2 space-x-2 font-medium text-white transition-all duration-300 rounded-xl hover:bg-white/10">
                        <i class="text-orange-400 fas fa-users"></i>
                        <span>নিবন্ধনকৃত শিক্ষার্থী</span>
                    </a>
                    <a href="{{ route('home') }}#events"
                        class="flex items-center px-4 py-2 space-x-2 font-medium text-white transition-all duration-300 rounded-xl hover:bg-white/10">
                        <i class="text-orange-400 fas fa-calendar"></i>
                        <span>কার্যক্রম</span>
                    </a>
                    <a href="{{ route('galary') }}"
                        class="flex items-center px-4 py-2 space-x-2 font-medium text-white transition-all duration-300 rounded-xl hover:bg-white/10">
                        <i class="text-orange-400 fas fa-images"></i>
                        <span>গ্যালারি</span>
                    </a>
                    <a href="{{ route('blogs.index') }}"
                        class="flex items-center px-4 py-2 space-x-2 font-medium text-white transition-all duration-300 rounded-xl hover:bg-white/10">
                        <i class="text-orange-400 fas fa-blog"></i>
                        <span>গল্প</span>
                    </a>
                </nav>
                <!-- Action Buttons (Desktop) -->
                <div class="items-center hidden space-x-4 lg:flex">
                    <a href="{{ route('home') }}#contact"
                        class="inline-flex items-center px-5 py-2 font-semibold text-white transition-all duration-300 shadow-lg bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 rounded-xl hover:shadow-xl hover:scale-105">
                        <i class="mr-2 fas fa-phone"></i> যোগাযোগ
                    </a>
                    <a onclick="showDonationModal()"
                        class="inline-flex items-center px-5 py-2 font-semibold text-white transition-all duration-300 shadow-lg cursor-pointer bg-gradient-to-r from-orange-500 via-red-500 to-pink-600 hover:from-orange-600 hover:via-red-600 hover:to-pink-700 rounded-xl hover:shadow-xl hover:scale-105">
                        <i class="mr-2 fa-solid fa-hand-holding-dollar"></i> ডোনেশন
                    </a>
                </div>
                <!-- Mobile Hamburger -->
                <button id="menu-btn" class="text-2xl text-white lg:hidden focus:outline-none">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div id="mobile-menu"
            class="flex flex-col hidden px-6 py-4 space-y-3 text-white transition-all duration-300 lg:hidden bg-black/90">
            <a href="{{ route('home') }}" class="flex items-center py-2 space-x-2 border-b border-gray-700">
                <i class="text-orange-400 fas fa-home"></i><span>হোম</span>
            </a>
            <a href="{{ route('home') }}#registration"
                class="flex items-center py-2 space-x-2 border-b border-gray-700">
                <i class="text-orange-400 fas fa-user-plus"></i><span>নিবন্ধন</span>
            </a>
            <a href="{{ route('registered-students.index') }}"
                class="flex items-center py-2 space-x-2 border-b border-gray-700">
                <i class="text-orange-400 fas fa-users"></i><span>নিবন্ধনকৃত শিক্ষার্থী</span>
            </a>

            <a href="{{ route('home') }}#events" class="flex items-center py-2 space-x-2 border-b border-gray-700">
                <i class="text-orange-400 fas fa-calendar"></i><span>কার্যক্রম</span>
            </a>

            <a href="{{ route('galary') }}" class="flex items-center py-2 space-x-2 border-b border-gray-700">
                <i class="text-orange-400 fas fa-images"></i>
                <span>গ্যালারি</span>
            </a>

            <a href="{{ route('blogs.index') }}" class="flex items-center py-2 space-x-2 border-b border-gray-700">
                <i class="text-orange-400 fas fa-blog"></i>
                <span>গল্প</span>
            </a>
            <a href="{{ route('home') }}#contact"
                class="inline-flex items-center px-5 py-2 font-semibold text-white shadow-lg bg-gradient-to-r from-purple-600 to-pink-600 rounded-xl hover:scale-105">
                <i class="mr-2 fas fa-phone"></i> যোগাযোগ
            </a>
            <a onclick="showDonationModal()"
                class="inline-flex items-center px-5 py-2 font-semibold text-white shadow-lg cursor-pointer bg-gradient-to-r from-orange-500 via-red-500 to-pink-600 rounded-xl hover:scale-105">
                <i class="mr-2 fa-solid fa-hand-holding-dollar"></i> ডোনেশন
            </a>
        </div>
    </header>

    <a href="#top" id="scrollTopBtn" title="Go to top"
        class="fixed z-50 px-3 py-2 text-white transition-opacity shadow-2xl opacity-0 pointer-events-none bottom-5 right-5 bg-gradient-to-br from-purple-600 to-pink-600 rounded-2xl">
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
    <footer class="pt-12 pb-10 text-white bg-gray-900">
        <div class="px-6 mx-auto max-w-7xl">
            <div class="grid gap-8 text-center md:grid-cols-3">
                <!-- Column 1: Logo & Intro -->
                <div class="md:col-span-2 sm:col-span-2 lg:col-span-2">
                    <a href="{{ route('home') }}">
                        <div class="flex items-center space-x-3 xs:flex-col">
                            <div class="w-16 h-16 bg-gradient-to-br">
                                <img src="{{ asset('assets/images/logo.jpeg') }}" alt="Logo" class="w-12 h-12">
                            </div>
                            <div>
                                <h3 class="mb-2 font-bold">গোটিয়া শোমসের আলী উচ্চ বিদ্যালয়</h3>
                                <p class="text-sm text-gray-400">গ্র্যান্ড পুনর্মিলনী-২০২৬</p>
                            </div>
                        </div>
                    </a>
                    <p class="text-sm text-gray-400">
                        আমাদের বিদ্যালয়ের সকল প্রাক্তন ও বর্তমান শিক্ষার্থীদের একসাথে নিয়ে আসার প্রচেষ্টা।
                    </p>
                </div>

                <!-- Column 3: Contact Info -->
                <div>
                    <h4 class="mb-2 font-bold">যোগাযোগের তথ্য</h4>
                    <ul class="space-y-2 text-sm">
                        <li class="text-gray-400"><i class="mr-2 fas fa-phone"></i>01610333033, 01327168909,
                            01309128414</li>
                        <li class="text-gray-400"><i class="mr-2 fas fa-envelope"></i>reunion.gsahs@gmail.com</li>
                        <li class="text-gray-400"><i class="mr-2 fas fa-map-marker-alt"></i>গোটিয়া, মেছড়া, সিরাজগঞ্জ
                        </li>
                    </ul>
                </div>

                <!-- Column 4: Social & Payment -->
                <div class="text-center">
                    <h4 class="mb-3 font-bold">অন্যান্য লিঙ্ক</h4>
                    <div class="flex justify-center mb-6 space-x-4">
                        <a href="https://www.messenger.com/cm/AbZUvg5ZnQxbPVDZ/?send_source=cm%3Acopy_invite_link"
                            target="_blank"
                            class="flex items-center justify-center w-10 h-10 transition-colors bg-blue-600 rounded-full hover:bg-blue-700">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://youtube.com/watch?si=Z0AGqWXwvH8kdKbh&v=8BtstMBzC38&feature=youtu.be"
                            target="_blank"
                            class="flex items-center justify-center w-10 h-10 transition-colors bg-red-600 rounded-full hover:bg-blue-500">
                            <i class="fa-brands fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Bottom Footer -->
            <div class="pt-8 mt-8 text-center border-t border-gray-800">
                <p class="text-sm text-gray-400">
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
