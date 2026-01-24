@extends('layouts.app')

@section('title', 'প্রাক্তন ছাত্র-ছাত্রীদের তালিকা')

@section('content')
    <section class="py-16 bg-gradient-to-br from-white to-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 text-gradient">
                    প্রাক্তন ছাত্র-ছাত্রীদের তালিকা
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-purple-500 to-blue-500 mx-auto mt-4 rounded-full"></div>
            </div>

            <!-- Search Filters -->
            <form method="GET" action="{{ route('alumni.index') }}" class="grid md:grid-cols-2 gap-6 mb-8">
                <div>
                    <label class="block text-gray-700 font-semibold mb-2 flex items-center">
                        <i class="fas fa-search text-blue-600 mr-2"></i> নাম দিয়ে খুঁজুন
                    </label>
                    <input type="text" name="name" value="{{ request('name') }}" class="form-input w-full"
                        placeholder="যেমন: মোহাম্মদ আব্দুল করিম">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2 flex items-center">
                        <i class="fas fa-graduation-cap text-green-600 mr-2"></i> ব্যাচ/সাল
                    </label>
                    <select name="batch" class="form-input w-full">
                        <option value="">বছর নির্বাচন করুন</option>
                        @for ($year = 2025; $year >= 1964; $year--)
                            <option value="{{ $year }}" {{ request('batch') == $year ? 'selected' : '' }}>
                                {{ $year }}</option>
                        @endfor
                    </select>
                </div>

                <div class="md:col-span-2">
                    <button type="submit"
                        class="bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-300">
                        <i class="fas fa-search mr-2"></i> খুঁজুন
                    </button>
                </div>
            </form>

            <!-- Alumni Cards -->
            <div class="grid md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($alumni as $alumnus)
                    <div class="alumni-card group relative overflow-hidden rounded-lg bg-white shadow-md
         hover:shadow-lg transition-all duration-200
         transform hover:-translate-y-0.5 max-w-sm mx-auto"
                        data-name="{{ strtolower($alumnus->name) }}" data-batch="{{ $alumnus->batch }}">
                        <!-- Card Header -->
                        <div class="relative h-36 overflow-hidden">
                            <img @if ($alumnus->photo) src="{{ asset('storage/' . $alumnus->photo) }}" @else  src="{{ asset('/assets/images/student.jpeg') }}" @endif
                                alt="{{ $alumnus->name }}"
                                class="w-20 h-20 object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <div class="absolute bottom-4 left-4">
                                <span
                                    class="inline-block bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                    ব্যাচ {{ $alumnus->batch }}
                                </span>
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors">
                                {{ $alumnus->name }}
                            </h3>

                            <div class="space-y-2 text-sm text-gray-600">
                                <div class="flex items-center">
                                    <i class="fas fa-user-tie mr-2 text-blue-500"></i>
                                    <span>{{ $alumnus->profession ?? 'পেশা উল্লেখ নেই' }}</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-phone mr-2 text-green-500"></i>
                                    <span>{{ $alumnus->phone }}</span>
                                </div>
                                @if ($alumnus->email)
                                    <div class="flex items-center">
                                        <i class="fas fa-envelope mr-2 text-purple-500"></i>
                                        <span class="truncate">{{ $alumnus->email }}</span>
                                    </div>
                                @endif
                            </div>

                            <div class="mt-4 pt-4 border-t border-gray-100">
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-gray-500">
                                        <i class="fas fa-t-shirt mr-1"></i>
                                        গেঞ্জি: {{ $alumnus->tshirt }}
                                    </span>
                                    <span class="text-sm text-gray-500">
                                        <i class="fas fa-tint mr-1"></i>
                                        {{ $alumnus->blood }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if ($alumni->isEmpty())
                <div class="text-center py-12">
                    <i class="fas fa-users text-gray-300 text-6xl mb-4"></i>
                    <h3 class="text-2xl font-bold text-gray-700 mb-2">কোনো প্রাক্তন শিক্ষার্থী পাওয়া যায়নি</h3>
                    <p class="text-gray-600">আপনার অনুসন্ধানের সাথে মিল রেখে কোনো ফলাফল পাওয়া যায়নি</p>
                </div>
            @endif

            <!-- Pagination -->
            @if ($alumni && $alumni->hasPages())
                <div class="mt-12">
                    {{ $alumni->links() }}
                </div>
            @endif
        </div>
    </section>
@endsection
