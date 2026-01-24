@extends('layouts.app')

@section('title', 'ব্লগ - গোটিয়া শোমসের আলী উচ্চ বিদ্যালয়')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-white">
        <!-- Hero Section -->
        <section style="margin-top: 3.2rem"
            class="relative py-16 bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-700">
            <div class="absolute inset-0 bg-black/20"></div>
            <div class="relative max-w-4xl px-6 mx-auto text-center">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 mb-3 rounded-full bg-white/10 backdrop-blur-sm">
                    <i class="text-2xl text-yellow-300 fas fa-blog"></i>
                </div>
                <h1 class="mb-2 text-4xl font-black leading-tight text-white md:text-5xl lg:text-6xl">
                    আমাদের <span class="text-yellow-300">গল্প</span>
                </h1>
                <p class="max-w-2xl mx-auto text-lg font-medium leading-relaxed md:text-xl text-blue-50">
                    শিক্ষার্থী, শিক্ষক এবং প্রাক্তন ছাত্র-ছাত্রীদের লেখা এবং গল্প
                </p>
                {{-- <div class="flex items-center justify-center mt-8 space-x-2">
                    <div class="w-16 h-1 bg-yellow-300 rounded-full"></div>
                    <div class="w-3 h-3 bg-white rounded-full"></div>
                    <div class="w-16 h-1 bg-yellow-300 rounded-full"></div>
                </div> --}}
            </div>
        </section>

        <!-- Main Content -->
        <div class="relative">
            <!-- Floating Write Button - Bottom Right -->
            <div class="fixed z-50 p-2 bottom-8 right-8">
                <a href="{{ route('blogs.create') }}"
                    class="inline-flex items-center px-8 py-4 font-bold text-white transition-all duration-300 transform shadow-2xl bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 rounded-2xl hover:shadow-green-500/50 hover:scale-105 hover:-translate-y-1">
                    <i class="mr-3 fas fa-pen-fancy"></i>
                    গল্প লিখুন
                </a>
            </div>

            <!-- Blog Posts Section -->
            <section class="py-16">
                <div class="max-w-6xl px-6 mx-auto">
                    @if ($blogs->count() > 0)
                        <!-- Section Header -->
                        <div class="mb-5 text-center">
                            <h2 class="mb-1 text-3xl font-bold text-gray-900">
                                সাম্প্রতিক <span class="text-indigo-600"> গল্প</span>
                            </h2>
                            <p class="text-lg text-gray-600">
                              আমাদের স্মৃতির হাসি, কান্না এবং ভালবাসার গল্প
                            </p>
                        </div>

                        <!-- Blog Grid -->
                        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                            @foreach ($blogs as $blog)
                                <article
                                    class="overflow-hidden transition-all duration-300 bg-white border border-gray-100 shadow-lg group rounded-2xl hover:shadow-xl hover:-translate-y-2">
                                    <!-- Card Header -->
                                    <div class="p-6">
                                        <!-- Author & Date -->
                                        {{-- <div class="flex items-center justify-between mb-3">
                                            <div class="flex items-center justify-between space-x-3">
                                                {{-- <div
                                                    class="flex items-center justify-center w-10 h-10 rounded-full bg-gradient-to-br from-indigo-500 to-purple-600">
                                                    <i class="text-sm text-white fas fa-user"></i>
                                                </div> --}}
                                        {{-- <div> --}}
                                        {{-- <span class="text-sm font-semibold text-gray-900">
                                                        {{ $blog->writer_name }}</span>
                                                    <span class="text-xs text-gray-500">
                                                        {{ $blog->created_at->diffForHumans() }}</span> --}}
                                        {{-- </div> --}}
                                        {{-- </div> --}}
                                        {{-- <div class="flex items-center space-x-1">
                                                <i class="text-sm text-gray-400 fas fa-eye"></i>
                                                <span class="text-xs text-gray-500">{{ rand(50, 500) }}</span>
                                            </div> --}}
                                        {{-- </div> --}}

                                        <!-- Title -->
                                        <h3
                                            class="mb-2 text-xl font-bold leading-tight text-gray-900 transition-colors duration-300 group-hover:text-indigo-600">
                                            <a href="{{ route('blogs.show', $blog) }}" class="hover:underline">
                                                {{ Str::limit($blog->title, 60) }} -
                                                <span class="font-normal text-gray-500">{{ $blog->writer_name }}</span>
                                            </a>
                                        </h3>

                                        <!-- Excerpt -->
                                        <p class="mb-4 text-sm leading-relaxed text-gray-600 line-clamp-3">
                                            {!! Str::limit(strip_tags($blog->story), 250) !!}
                                        </p>

                                        <!-- Tags -->
                                        <div class="flex items-center justify-between mb-0 spa1ce-x-2">
                                            {{-- <span
                                                class="inline-flex items-center px-2 py-1 text-xs font-medium text-indigo-700 bg-indigo-100 rounded-full">
                                                <span class="text-xs text-gray-500">
                                                        {{ $blog->created_at->diffForHumans() }}</span>
                                            </span> --}}
                                            <span
                                                class="inline-flex items-center px-2 py-1 text-xs font-medium text-green-700 bg-green-100 rounded-full">
                                                <i class="mr-1 fas fa-check-circle"></i>
                                                {{ $blog->created_at->diffForHumans() }}
                                            </span>
                                            <span></span>
                                            <a href="{{ route('blogs.show', $blog) }}"
                                                class="inline-flex items-center px-4 py-2 text-sm font-semibold text-indigo-600 transition-all duration-300 hover:text-indigo-700 bg-indigo-50 hover:bg-indigo-100 rounded-xl">
                                                <span>বিস্তারিত পড়ুন</span>
                                                <i class="ml-2 fas fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Card Footer -->
                                    {{-- <div class="px-6 pb-6">
                                        <div class="flex items-center justify-between">
                                            <a href="{{ route('blogs.show', $blog) }}"
                                                class="inline-flex items-center px-4 py-2 text-sm font-semibold text-indigo-600 transition-all duration-300 hover:text-indigo-700 bg-indigo-50 hover:bg-indigo-100 rounded-xl">
                                                <span>বিস্তারিত পড়ুন</span>
                                                <i class="ml-2 fas fa-arrow-right"></i>
                                            </a>
                                            <div class="flex items-center text-xs text-gray-500">
                                                <i class="mr-1 fas fa-calendar"></i>
                                                {{ $blog->created_at->diffForHumans() }}
                                            </div>
                                        </div>
                                    </div> --}}
                                </article>
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        <div class="flex justify-center mt-12">
                            {{ $blogs->links() }}
                        </div>
                    @else
                        <!-- Empty State -->
                        <div class="py-20 text-center">
                            <div
                                class="flex items-center justify-center w-24 h-24 mx-auto mb-6 rounded-full bg-gradient-to-br from-indigo-100 to-purple-100">
                                <i class="text-4xl text-indigo-400 fas fa-book-open"></i>
                            </div>
                            <h3 class="mb-4 text-2xl font-bold text-gray-900">
                                এখনও কোনো <span class="text-indigo-600">ব্লগ</span> নেই
                            </h3>
                            <p class="max-w-md mx-auto mb-8 text-gray-600">
                                আপনিই প্রথম হোন! আপনার গল্প, অভিজ্ঞতা এবং চিন্তাভাবনা শেয়ার করুন।
                            </p>
                            <a href="{{ route('blogs.create') }}"
                                class="inline-flex items-center px-6 py-3 font-semibold text-white transition-colors bg-indigo-600 hover:bg-indigo-700 rounded-xl">
                                <i class="mr-2 fas fa-plus"></i>
                                ব্লগ লিখুন
                            </a>
                        </div>
                    @endif
                </div>
            </section>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
@endpush
