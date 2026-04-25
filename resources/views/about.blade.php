@extends('layouts.app')

@section('title', 'পরিচিতি - গোটিয়া শোমসের আলী উচ্চ বিদ্যালয়')
@section('description', 'গোটিয়া শোমসের আলী উচ্চ বিদ্যালয়ের পরিচিতি এবং বিস্তারিত তথ্য')

@section('content')
    <!-- Hero Section -->
    <div class="relative py-20 mt-20 overflow-hidden bg-gradient-to-br from-purple-700 via-pink-600 to-red-600">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute transform -rotate-45 bg-white w-96 h-96 -top-48 -left-48 rounded-3xl"></div>
            <div class="absolute transform rotate-45 bg-white w-96 h-96 -bottom-48 -right-48 rounded-3xl"></div>
        </div>
        <div class="relative z-10 px-6 mx-auto text-center max-w-7xl">
            <h1 class="mb-4 text-4xl font-bold text-white md:text-5xl">বিদ্যালয় পরিচিতি</h1>
            <p class="text-xl text-white/90">গোটিয়া শোমসের আলী উচ্চ বিদ্যালয়</p>
        </div>
    </div>

    <!-- About Section -->
    <section class="py-16 bg-gray-50">
        <div class="px-6 mx-auto max-w-7xl">
            <div class="overflow-hidden bg-white shadow-lg rounded-3xl">
                <div class="p-8 md:p-12">
                    <!-- School Logo and Name -->
                    <div class="flex flex-col items-center mb-12 text-center">
                        <img src="{{ asset('assets/images/logo.jpeg') }}" alt="School Logo"
                            class="w-32 h-32 mb-6 shadow-xl rounded-2xl">
                        <h2 class="mb-2 text-3xl font-bold text-gray-800">গোটিয়া শোমসের আলী উচ্চ বিদ্যালয়</h2>
                        <p class="text-xl text-gray-600">Gotia Samsher Ali High School</p>
                    </div>

                    <!-- School Information -->
                    <div class="grid gap-6 md:grid-cols-2">
                        <!-- Left Column -->
                        <div class="space-y-4">
                            <div class="flex items-start p-4 transition-all duration-300 rounded-xl hover:bg-purple-50">
                                <div
                                    class="flex items-center justify-center flex-shrink-0 w-10 h-10 mr-4 text-white bg-purple-600 rounded-lg">
                                    <i class="fas fa-id-card"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-700">বিদ্যালয়ের EIIN:</p>
                                    <p class="text-gray-600">-</p>
                                </div>
                            </div>

                            <div class="flex items-start p-4 transition-all duration-300 rounded-xl hover:bg-purple-50">
                                <div
                                    class="flex items-center justify-center flex-shrink-0 w-10 h-10 mr-4 text-white bg-purple-600 rounded-lg">
                                    <i class="fas fa-school"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-700">বিদ্যালয়ের নাম:</p>
                                    <p class="text-gray-600">গোটিয়া শোমসের আলী উচ্চ বিদ্যালয়</p>
                                </div>
                            </div>

                            <div class="flex items-start p-4 transition-all duration-300 rounded-xl hover:bg-purple-50">
                                <div
                                    class="flex items-center justify-center flex-shrink-0 w-10 h-10 mr-4 text-white bg-purple-600 rounded-lg">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-700">গ্রাম:</p>
                                    <p class="text-gray-600">গোটিয়া</p>
                                </div>
                            </div>

                            <div class="flex items-start p-4 transition-all duration-300 rounded-xl hover:bg-purple-50">
                                <div
                                    class="flex items-center justify-center flex-shrink-0 w-10 h-10 mr-4 text-white bg-purple-600 rounded-lg">
                                    <i class="fas fa-building"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-700">ওয়ার্ড:</p>
                                    <p class="text-gray-600">-</p>
                                </div>
                            </div>

                            <div class="flex items-start p-4 transition-all duration-300 rounded-xl hover:bg-purple-50">
                                <div
                                    class="flex items-center justify-center flex-shrink-0 w-10 h-10 mr-4 text-white bg-purple-600 rounded-lg">
                                    <i class="fas fa-location-arrow"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-700">ইউনিয়ন:</p>
                                    <p class="text-gray-600">মেছড়া</p>
                                </div>
                            </div>

                            <div class="flex items-start p-4 transition-all duration-300 rounded-xl hover:bg-purple-50">
                                <div
                                    class="flex items-center justify-center flex-shrink-0 w-10 h-10 mr-4 text-white bg-purple-600 rounded-lg">
                                    <i class="fas fa-mail-bulk"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-700">পোষ্ট অফিস:</p>
                                    <p class="text-gray-600">গোটিয়া</p>
                                </div>
                            </div>

                            <div class="flex items-start p-4 transition-all duration-300 rounded-xl hover:bg-purple-50">
                                <div
                                    class="flex items-center justify-center flex-shrink-0 w-10 h-10 mr-4 text-white bg-purple-600 rounded-lg">
                                    <i class="fas fa-city"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-700">উপজেলা:</p>
                                    <p class="text-gray-600">সিরাজগঞ্জ</p>
                                </div>
                            </div>

                            <div class="flex items-start p-4 transition-all duration-300 rounded-xl hover:bg-purple-50">
                                <div
                                    class="flex items-center justify-center flex-shrink-0 w-10 h-10 mr-4 text-white bg-purple-600 rounded-lg">
                                    <i class="fas fa-map"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-700">জেলা:</p>
                                    <p class="text-gray-600">সিরাজগঞ্জ</p>
                                </div>
                            </div>

                            <div class="flex items-start p-4 transition-all duration-300 rounded-xl hover:bg-purple-50">
                                <div
                                    class="flex items-center justify-center flex-shrink-0 w-10 h-10 mr-4 text-white bg-purple-600 rounded-lg">
                                    <i class="fas fa-shield-alt"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-700">পুলিশ স্টেশন:</p>
                                    <p class="text-gray-600">সিরাজগঞ্জ</p>
                                </div>
                            </div>

                            <div class="flex items-start p-4 transition-all duration-300 rounded-xl hover:bg-purple-50">
                                <div
                                    class="flex items-center justify-center flex-shrink-0 w-10 h-10 mr-4 text-white bg-purple-600 rounded-lg">
                                    <i class="fas fa-flag"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-700">বিভাগ:</p>
                                    <p class="text-gray-600">রাজশাহী</p>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="space-y-4">
                            <div class="flex items-start p-4 transition-all duration-300 rounded-xl hover:bg-pink-50">
                                <div
                                    class="flex items-center justify-center flex-shrink-0 w-10 h-10 mr-4 text-white bg-pink-600 rounded-lg">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-700">ইমেইল:</p>
                                    <p class="text-gray-600">-</p>
                                </div>
                            </div>

                            <div class="flex items-start p-4 transition-all duration-300 rounded-xl hover:bg-pink-50">
                                <div
                                    class="flex items-center justify-center flex-shrink-0 w-10 h-10 mr-4 text-white bg-pink-600 rounded-lg">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-700">টেলিফোন:</p>
                                    <p class="text-gray-600">-</p>
                                </div>
                            </div>

                            <div class="flex items-start p-4 transition-all duration-300 rounded-xl hover:bg-pink-50">
                                <div
                                    class="flex items-center justify-center flex-shrink-0 w-10 h-10 mr-4 text-white bg-pink-600 rounded-lg">
                                    <i class="fas fa-globe"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-700">ওয়েবসাইট:</p>
                                    <p class="text-gray-600">
                                        <a href="http://www.gotiahighschool.com" target="_blank"
                                            class="text-blue-600 hover:underline">www.gotiahighschool.com</a>
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-start p-4 transition-all duration-300 rounded-xl hover:bg-pink-50">
                                <div
                                    class="flex items-center justify-center flex-shrink-0 w-10 h-10 mr-4 text-white bg-pink-600 rounded-lg">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-700">শিক্ষার্থীর সংখ্যা:</p>
                                    <p class="text-gray-600">-</p>
                                </div>
                            </div>

                            <div class="flex items-start p-4 transition-all duration-300 rounded-xl hover:bg-pink-50">
                                <div
                                    class="flex items-center justify-center flex-shrink-0 w-10 h-10 mr-4 text-white bg-pink-600 rounded-lg">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-700">বিদ্যালয়ের শিফট:</p>
                                    <p class="text-gray-600">এক শিফট</p>
                                </div>
                            </div>

                            <div class="flex items-start p-4 transition-all duration-300 rounded-xl hover:bg-pink-50">
                                <div
                                    class="flex items-center justify-center flex-shrink-0 w-10 h-10 mr-4 text-white bg-pink-600 rounded-lg">
                                    <i class="fas fa-user-graduate"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-700">বিদ্যালয়ের ধরণ:</p>
                                    <p class="text-gray-600">সহশিক্ষা</p>
                                </div>
                            </div>

                            <div class="flex items-start p-4 transition-all duration-300 rounded-xl hover:bg-pink-50">
                                <div
                                    class="flex items-center justify-center flex-shrink-0 w-10 h-10 mr-4 text-white bg-pink-600 rounded-lg">
                                    <i class="fas fa-ruler-combined"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-700">মোট জমির পরিমাণ:</p>
                                    <p class="text-gray-600">-</p>
                                </div>
                            </div>

                            <div class="flex items-start p-4 transition-all duration-300 rounded-xl hover:bg-pink-50">
                                <div
                                    class="flex items-center justify-center flex-shrink-0 w-10 h-10 mr-4 text-white bg-pink-600 rounded-lg">
                                    <i class="fas fa-door-open"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-700">মোট শ্রেণী কক্ষ:</p>
                                    <p class="text-gray-600">-</p>
                                </div>
                            </div>

                            <div class="flex items-start p-4 transition-all duration-300 rounded-xl hover:bg-pink-50">
                                <div
                                    class="flex items-center justify-center flex-shrink-0 w-10 h-10 mr-4 text-white bg-pink-600 rounded-lg">
                                    <i class="fas fa-laptop"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-700">আইসিটি ল্যাব:</p>
                                    <p class="text-gray-600">-</p>
                                </div>
                            </div>

                            <div class="flex items-start p-4 transition-all duration-300 rounded-xl hover:bg-pink-50">
                                <div
                                    class="flex items-center justify-center flex-shrink-0 w-10 h-10 mr-4 text-white bg-pink-600 rounded-lg">
                                    <i class="fas fa-book"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-700">পাঠাগারের জন্য কক্ষ:</p>
                                    <p class="text-gray-600">-</p>
                                </div>
                            </div>

                            <div class="flex items-start p-4 transition-all duration-300 rounded-xl hover:bg-pink-50">
                                <div
                                    class="flex items-center justify-center flex-shrink-0 w-10 h-10 mr-4 text-white bg-pink-600 rounded-lg">
                                    <i class="fas fa-building"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-700">ভবন সংখ্যা:</p>
                                    <p class="text-gray-600">-</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Section -->
                    <div class="p-6 mt-12 text-center bg-gradient-to-r from-purple-100 to-pink-100 rounded-2xl">
                        <h3 class="mb-4 text-2xl font-bold text-gray-800">আরও তথ্যের জন্য যোগাযোগ করুন</h3>
                        <div class="flex flex-wrap justify-center gap-4">
                            <a href="{{ route('home') }}#contact"
                                class="inline-flex items-center px-6 py-3 font-semibold text-white transition-all duration-300 shadow-lg bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 rounded-xl hover:shadow-xl hover:scale-105">
                                <i class="mr-2 fas fa-phone"></i> যোগাযোগ করুন
                            </a>
                            <a href="{{ route('home') }}"
                                class="inline-flex items-center px-6 py-3 font-semibold text-gray-700 transition-all duration-300 bg-white shadow-lg hover:bg-gray-50 rounded-xl hover:shadow-xl hover:scale-105">
                                <i class="mr-2 fas fa-home"></i> হোম পেজে ফিরে যান
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
