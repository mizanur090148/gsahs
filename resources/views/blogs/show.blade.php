@extends('layouts.app')

@section('title', $blog->title . ' - গোটিয়া শোমসের আলী উচ্চ বিদ্যালয়')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-white">
        <!-- Hero Section -->
        <section class="relative py-16 bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-700">
            <div class="absolute inset-0 bg-black/20"></div>
            <div class="relative max-w-4xl px-6 mx-auto text-center">
                <h1 class="mb-4 text-4xl font-bold text-white md:text-5xl">
                    {{ $blog->title }}
                </h1>
                <div class="flex items-center justify-center space-x-4 text-blue-100">
                    <div class="flex items-center">
                        <i class="mr-2 fas fa-user"></i>
                        <span>{{ $blog->writer_name }}</span>
                    </div>
                    <div class="flex items-center">
                        <i class="mr-2 fas fa-calendar"></i>
                        <span>{{ $blog->created_at->format('d M, Y') }}</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Blog Content -->
        <section class="py-16">
            <div class="max-w-4xl px-6 mx-auto">
                <article class="p-8 bg-white border border-gray-100 shadow-lg rounded-2xl">
                    <!-- Blog Meta -->
                    <div class="flex items-center justify-between mb-8 pb-6 border-b border-gray-200">
                        <div class="flex items-center space-x-4">
                            <div class="flex items-center justify-center w-12 h-12 bg-blue-100 rounded-full">
                                <i class="text-blue-600 fas fa-user"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900">{{ $blog->writer_name }}</h3>
                                <p class="text-sm text-gray-500">{{ $blog->created_at->format('F j, Y \a\t g:i A') }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Blog Content -->
                    <div class="prose prose-lg max-w-none">
                        <div class="text-gray-700 leading-relaxed whitespace-pre-line">
                            {!! nl2br(e($blog->story)) !!}
                        </div>
                    </div>

                    <!-- Tags/Topics (if needed in future) -->
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <span
                                    class="inline-flex items-center px-3 py-1 text-sm font-medium text-green-700 bg-green-100 rounded-full">
                                    <i class="mr-2 fas fa-check-circle"></i>
                                    অনুমোদিত
                                </span>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Navigation -->
                <div class="flex items-center justify-between mt-8">
                    <a href="{{ route('blogs.index') }}"
                        class="flex items-center px-6 py-3 font-semibold text-gray-600 transition-colors bg-gray-100 rounded-lg hover:bg-gray-200">
                        <i class="mr-2 fas fa-arrow-left"></i>
                        সব ব্লগ দেখুন
                    </a>

                    <a href="{{ route('blogs.create') }}"
                        class="flex items-center px-6 py-3 font-semibold text-white transition-colors bg-blue-600 rounded-lg hover:bg-blue-700">
                        <i class="mr-2 fas fa-pen-fancy"></i>
                        ব্লগ লিখুন
                    </a>
                </div>

                <!-- Related Blogs Section (Optional - can be added later) -->
                {{-- <div class="mt-16">
                <h3 class="mb-8 text-2xl font-bold text-center text-gray-900">আরও ব্লগ</h3>
                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($relatedBlogs ?? [] as $relatedBlog)
                        <div class="p-6 bg-white border border-gray-100 shadow-lg rounded-xl hover:shadow-xl transition-shadow">
                            <h4 class="mb-2 text-lg font-semibold text-gray-900">
                                <a href="{{ route('blogs.show', $relatedBlog) }}" class="hover:text-blue-600">
                                    {{ $relatedBlog->title }}
                                </a>
                            </h4>
                            <p class="text-sm text-gray-600">{{ Str::limit($relatedBlog->story, 100) }}</p>
                            <div class="mt-4 text-sm text-gray-500">
                                {{ $relatedBlog->writer_name }} • {{ $relatedBlog->created_at->diffForHumans() }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div> --}}
            </div>
        </section>
    </div>
@endsection

@push('styles')
    <style>
        .prose {
            color: #374151;
        }

        .prose p {
            margin-bottom: 1rem;
        }

        .prose p:last-child {
            margin-bottom: 0;
        }
    </style>
@endpush
