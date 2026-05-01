@extends('layouts.app')

@section('title', 'ডোনেশন তালিকা - গোটিয়া শোমসের আলী উচ্চ বিদ্যালয়')

@section('content')
    <div style="padding-top: 8rem" class="min-h-screen py-24 bg-gradient-to-br from-gray-50 to-white">
        <div class="px-6 mx-auto max-w-7xl">
            <!-- Header Section -->
            <div class="mb-4 text-center">
                <h2 class="mb-3 text-4xl font-bold text-gray-900 md:text-5xl">
                    ডোনেশনের তালিকা
                </h2>
                {{-- <p class="text-xl text-gray-600">আপনার ডোনেশনের মাধ্যমে শিক্ষা প্রতিষ্ঠানকে এগিয়ে নিয়ে যান</p> --}}
                <div class="w-32 h-1 mx-auto mt-4 rounded-full bg-gradient-to-r from-green-500 to-emerald-500"></div>
            </div>

            <!-- Success Message -->
            @if (session('success'))
                <div class="p-4 mb-8 text-green-800 bg-green-100 border-l-4 border-green-500 rounded-lg shadow-md">
                    <div class="flex items-center">
                        <i class="mr-3 text-2xl fas fa-check-circle"></i>
                        <p class="font-semibold">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            <!-- Add Donation Button -->
            <div class="text-right">
                <a href="{{ route('donate.index') }}"
                    class="inline-flex items-center px-6 py-2 font-semibold text-white transition-all duration-300 shadow-lg bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 rounded-xl hover:shadow-xl hover:scale-105">
                    <i class="mr-2 fas fa-plus-circle"></i> ডোনেট করুন
                </a>
            </div>

            <!-- Donations Table -->
            <div class="overflow-hidden bg-white shadow-xl rounded-2xl">
                <div class="p-6 border-b border-gray-200 bg-gradient-to-r from-green-50 to-emerald-50">
                    <h2 class="text-2xl font-bold text-gray-800">
                        <i class="mr-3 text-green-600 fas fa-list"></i>
                        ডোনেশনের তালিকা
                    </h2>
                </div>

                <div class="p-6">
                    @if ($donations->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="border-b-2 border-gray-200 bg-gradient-to-r from-gray-50 to-gray-100">
                                        <th class="px-6 py-4 text-sm font-bold text-left text-gray-700 uppercase whitespace-nowrap">#</th>
                                        <th class="px-6 py-4 text-sm font-bold text-left text-gray-700 uppercase whitespace-nowrap">নাম</th>
                                        <th class="px-6 py-4 text-sm font-bold text-left text-gray-700 uppercase whitespace-nowrap">পিতার নাম</th>
                                        <th class="px-6 py-4 text-sm font-bold text-left text-gray-700 uppercase whitespace-nowrap">প্রেরক নাম্বার</th>
                                        <th class="px-6 py-4 text-sm font-bold text-left text-gray-700 uppercase whitespace-nowrap">গ্রহীতা নাম্বার</th>
                                        <th class="px-6 py-4 text-sm font-bold text-left text-gray-700 uppercase whitespace-nowrap" width="15%">ঠিকানা</th>
                                        
                                        <th class="px-6 py-4 text-sm font-bold text-left text-gray-700 uppercase whitespace-nowrap">স্ট্যাটাস</th>
                                        <th class="px-6 py-4 text-sm font-bold text-left text-gray-700 uppercase whitespace-nowrap">তারিখ</th>
                                        <th class="px-6 py-4 text-sm font-bold text-left text-gray-700 uppercase whitespace-nowrap">পরিমাণ (৳)</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @foreach ($donations as $index => $donation)
                                        <tr class="transition-colors hover:bg-gray-50">
                                            <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">{{ $index + 1 }}</td>
                                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{ $donation->name }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-700 whitespace-nowrap">{{ $donation->father_name }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-700 whitespace-nowrap">{{ $donation->mobile }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-700 whitespace-nowrap">{{ $donation->receiver_mobile }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-600">{{ Str::limit($donation->address, 30) }}</td>
                                            
                                            <td class="px-6 py-4 text-sm whitespace-nowrap">
                                                @if ($donation->status === 'approved')
                                                    <span class="inline-flex items-center px-3 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">
                                                        <i class="mr-1 fas fa-check-circle"></i> অনুমোদিত
                                                    </span>
                                                @elseif($donation->status === 'pending')
                                                    <span class="inline-flex items-center px-3 py-1 text-xs font-semibold text-yellow-800 bg-yellow-100 rounded-full">
                                                        <i class="mr-1 fas fa-clock"></i> অপেক্ষমাণ
                                                    </span>
                                                @else
                                                    <span class="inline-flex items-center px-3 py-1 text-xs font-semibold text-red-800 bg-red-100 rounded-full">
                                                        <i class="mr-1 fas fa-times-circle"></i> বাতিল
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-600 whitespace-nowrap">{{ $donation->created_at->format('d M Y') }}</td>
                                            <td class="px-6 py-4 text-sm font-semibold text-green-600 whitespace-nowrap">৳{{ number_format($donation->amount, 2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="font-bold border-t-2 border-gray-300 bg-gradient-to-r from-green-50 to-emerald-50">
                                        <td colspan="8" class="px-6 py-4 text-right text-gray-800">সর্বমোট:</td>
                                        <td class="px-6 py-4 text-lg text-green-600">৳{{ number_format($donations->sum('amount'), 2) }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    @else
                        <div class="py-12 text-center">
                            <div class="inline-flex items-center justify-center w-24 h-24 mb-4 bg-gray-100 rounded-full">
                                <i class="text-4xl text-gray-400 fas fa-hand-holding-heart"></i>
                            </div>
                            <h3 class="mb-2 text-xl font-semibold text-gray-700">কোনো ডোনেশন পাওয়া যায়নি</h3>
                            <p class="mb-6 text-gray-500">এখনও কোনো ডোনেশন রেকর্ড করা হয়নি।</p>
                            <a href="{{ route('donate.index') }}"
                                class="inline-flex items-center px-6 py-3 font-semibold text-white transition-all duration-300 shadow-lg bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 rounded-xl hover:shadow-xl hover:scale-105">
                                <i class="mr-2 fas fa-plus-circle"></i> প্রথম ডোনেশন করুন
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
