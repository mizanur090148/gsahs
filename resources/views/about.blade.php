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
                    <div class="grid gap-6 text-lg leading-relaxed text-gray-700 md:grid-cols-2">
                        <!-- Left Column -->
                        <div class="space-y-3">
                            <p><span class="font-semibold">বিদ্যালয়ের EIIN: 128414</span> </p>
                            <p><span class="font-semibold">বিদ্যালয়ের নাম:</span> গোটিয়া শোমসের আলী উচ্চ বিদ্যালয়</p>
                            <p><span class="font-semibold">School Name:</span> Gotia Samsher Ali High School</p>
                            <p><span class="font-semibold">গ্রাম:</span> গোটিয়া</p>
                            <p><span class="font-semibold">ওয়ার্ড: ০৬</span> </p>
                            <p><span class="font-semibold">ইউনিয়ন:</span> মেছড়া</p>
                            <p><span class="font-semibold">পোষ্ট অফিস:</span> গোটিয়া</p>
                            <p><span class="font-semibold">উপজেলা:</span> সিরাজগঞ্জ</p>
                            <p><span class="font-semibold">জেলা:</span> সিরাজগঞ্জ</p>
                            <p><span class="font-semibold">পুলিশ স্টেশন:</span> সিরাজগঞ্জ</p>
                            <p><span class="font-semibold">বিভাগ:</span> রাজশাহী</p>
                        </div>

                        <!-- Right Column -->
                        <div class="space-y-3">
                            <p><span class="font-semibold">ই-মেইল:</span> gotiashamsher128414@gmail.com</p>
                            <p><span class="font-semibold">টেলিফোন: 01309-128414</span> </p>
                            <p><span class="font-semibold">website:</span> <a href="http://www.gotiahighschool.com"
                                    target="_blank" class="text-blue-600 hover:underline">www.gotiahighschool.com</a></p>
                            <p><span class="font-semibold">শিক্ষার্থীর সংখ্যা:</span> ১৯০</p>
                            <p><span class="font-semibold">বিদ্যালয়ের শিফট:</span> এক শিফট</p>
                            <p><span class="font-semibold">বিদ্যালয়ের ধরণ:</span> সহশিক্ষা</p>
                            <p><span class="font-semibold">মোট জমির পরিমাণ:</span> ৩.৪০ একর</p>
                            <p><span class="font-semibold">মোট শ্রেণী কক্ষ:</span> ১৪</p>
                            <p><span class="font-semibold">আইসিটি ল্যাব:</span> নাই</p>
                            <p><span class="font-semibold">পাঠাগারের জন্য কক্ষ:</span> ১৩</p>
                            <p><span class="font-semibold">ভবন সংখ্যা:</span> ০২</p>
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
