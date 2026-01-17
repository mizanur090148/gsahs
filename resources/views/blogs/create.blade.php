@extends('layouts.app')

@section('title', 'ব্লগ লিখুন - গোটিয়া শোমসের আলী উচ্চ বিদ্যালয়')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-white py-16">
        <div class="max-w-4xl px-6 mx-auto">
            <!-- Header -->
            <div class="mb-8 text-center">
                <h1 class="mb-4 text-4xl font-bold text-gray-900 md:text-5xl">
                    <i class="mr-3 text-blue-600 fas fa-pen-fancy"></i>
                    আপনার ব্লগ লিখুন
                </h1>
                <p class="text-xl text-gray-600">
                    আপনার গল্প, অভিজ্ঞতা এবং চিন্তাভাবনা শেয়ার করুন
                </p>
                <div class="w-24 h-1 mx-auto mt-4 rounded-full bg-gradient-to-r from-blue-500 to-purple-500"></div>
            </div>

            <!-- Success Message -->
            @if (session('success'))
                <div class="mb-6">
                    <div
                        class="flex items-center justify-center max-w-2xl px-6 py-4 mx-auto text-green-800 transition-all duration-500 bg-green-100 border border-green-300 shadow-lg rounded-xl">
                        <i class="mr-3 text-2xl text-green-600 fas fa-check-circle"></i>
                        <span class="font-semibold text-center">
                            {{ session('success') }}
                        </span>
                    </div>
                </div>
            @endif

            <!-- Form -->
            <div class="p-8 bg-white border border-gray-100 shadow-lg rounded-2xl">
                <form action="{{ route('blogs.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Title -->
                    <div>
                        <label class="block mb-2 text-lg font-semibold text-gray-700">
                            <i class="mr-2 text-blue-600 fas fa-heading"></i>
                            ব্লগের শিরোনাম <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="title" value="{{ old('title') }}"
                            class="w-full px-4 py-3 text-lg border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            placeholder="আপনার ব্লগের একটি আকর্ষণীয় শিরোনাম লিখুন">
                        @error('title')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Writer Name -->
                    <div>
                        <label class="block mb-2 text-lg font-semibold text-gray-700">
                            <i class="mr-2 text-green-600 fas fa-user"></i>
                            লেখকের নাম <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="writer_name" value="{{ old('writer_name') }}"
                            class="w-full px-4 py-3 text-lg border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                            placeholder="আপনার পূর্ণ নাম">
                        @error('writer_name')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Story -->
                    <div>
                        <label class="block mb-2 text-lg font-semibold text-gray-700">
                            <i class="mr-2 text-purple-600 fas fa-book-open"></i>
                            আপনার গল্প <span class="text-red-500">*</span>
                        </label>
                        <textarea name="story" rows="12"
                            class="w-full px-4 py-3 text-lg border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent resize-vertical"
                            placeholder="আপনার গল্প, অভিজ্ঞতা বা চিন্তাভাবনা বিস্তারিত লিখুন...">{{ old('story') }}</textarea>
                        @error('story')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Guidelines -->
                    <div class="p-4 border border-blue-200 rounded-lg bg-blue-50">
                        <h4 class="mb-2 font-semibold text-blue-800">
                            <i class="mr-2 fas fa-info-circle"></i>
                            লেখার নির্দেশনা:
                        </h4>
                        <ul class="text-sm text-blue-700 space-y-1">
                            <li>• আপনার লেখা সবার জন্য অনুপ্রেরণাদায়ক এবং শিক্ষামূলক হওয়া উচিত</li>
                            <li>• অশ্লীল, আপত্তিকর বা অপমানজনক কোনো কথা ব্যবহার করবেন না</li>
                            <li>• ব্লগ জমা দেওয়ার পর অ্যাডমিন অনুমোদনের জন্য অপেক্ষা করুন</li>
                            <li>• অনুমোদিত হলে আপনার ব্লগ সবাই দেখতে পাবে</li>
                        </ul>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-center pt-6">
                        <button type="submit"
                            class="px-12 py-4 text-xl font-bold text-white transition-all duration-300 transform shadow-lg bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 rounded-xl hover:shadow-xl hover:scale-105">
                            <i class="mr-3 fas fa-paper-plane"></i>
                            ব্লগ জমা দিন
                        </button>
                    </div>
                </form>
            </div>

            <!-- Back to Blogs -->
            <div class="mt-8 text-center">
                <a href="{{ route('blogs.index') }}"
                    class="inline-flex items-center px-6 py-3 font-semibold text-gray-600 transition-colors hover:text-gray-800">
                    <i class="mr-2 fas fa-arrow-left"></i>
                    ব্লগ দেখুন
                </a>
            </div>
        </div>
    </div>
@endsection
