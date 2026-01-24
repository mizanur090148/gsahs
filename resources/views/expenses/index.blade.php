@extends('layouts.app')

@section('title', 'আর্থিক হিসাব - গোটিয়া শোমসের আলী উচ্চ বিদ্যালয়')

@section('content')
    <div style="padding-top: 8rem" class="min-h-screen py-24 bg-gradient-to-br from-gray-50 to-white">
        <div class="px-6 mx-auto max-w-7xl">
            <!-- Header Section -->
            <div class="mb-3 text-center">
                {{-- <h1
                    class="mb-4 text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">
                    আর্থিক হিসাব
                </h1> --}}
                <h2 class="mb-3 text-4xl font-bold text-gray-900 md:text-5xl">
                    আর্থিক হিসাব
                </h2>
                <p class="text-xl text-gray-600">পুনর্মিলনী আয়োজনের সকল খরচের বিস্তারিত তথ্য</p>
                <div class="w-32 h-1 mx-auto mt-4 rounded-full bg-gradient-to-r from-blue-500 to-purple-500"></div>
            </div>

            <!-- Summary Cards -->
            <div class="grid gap-6 mb-8 md:grid-cols-2">
                {{-- <div
                    class="p-8 transition-all duration-300 border border-red-200 shadow-lg bg-red-50 rounded-2xl hover:shadow-xl">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="mb-2 text-sm font-semibold text-red-600">মোট ব্যয়</p>
                            <p class="text-4xl font-bold text-red-600">৳{{ number_format($totalExpense, 2) }}</p>
                            <p class="mt-2 text-sm text-gray-600">টাকা</p>
                        </div>
                        <div class="flex items-center justify-center w-20 h-20 bg-red-200 rounded-full">
                            <i class="text-3xl text-red-600 fas fa-money-bill-wave"></i>
                        </div>
                    </div>
                </div> --}}

                {{-- <div
                    class="p-8 transition-all duration-300 border border-blue-200 shadow-lg bg-blue-50 rounded-2xl hover:shadow-xl">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="mb-2 text-sm font-semibold text-blue-600">মোট লেনদেন</p>
                            <p class="text-4xl font-bold text-blue-600">{{ $expenses->count() }}</p>
                            <p class="mt-2 text-sm text-gray-600">টি</p>
                        </div>
                        <div class="flex items-center justify-center w-20 h-20 bg-blue-200 rounded-full">
                            <i class="text-3xl text-blue-600 fas fa-receipt"></i>
                        </div>
                    </div>
                </div> --}}
            </div>

            <!-- Expenses Table -->
            <div class="overflow-hidden bg-white shadow-xl rounded-2xl">
                <div class="p-6 border-b border-gray-200 bg-gradient-to-r from-blue-50 to-purple-50">
                    <h2 class="text-2xl font-bold text-gray-800">
                        <i class="mr-3 text-blue-600 fas fa-list"></i>
                        ব্যয়ের তালিকা
                    </h2>
                </div>

                <div class="p-6">
                    @if ($expenses->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="border-b-2 border-gray-200 bg-gradient-to-r from-gray-50 to-gray-100">
                                        <th
                                            class="px-6 py-4 text-sm font-bold text-left text-gray-700 uppercase whitespace-nowrap">
                                            #</th>
                                        <th
                                            class="px-6 py-4 text-sm font-bold text-left text-gray-700 uppercase whitespace-nowrap">
                                            উদ্দেশ্য</th>
                                        <th
                                            class="px-6 py-4 text-sm font-bold text-left text-gray-700 uppercase whitespace-nowrap">
                                            পরিমাণ (৳)</th>
                                        <th
                                            class="px-6 py-4 text-sm font-bold text-left text-gray-700 uppercase whitespace-nowrap">
                                            যিনি ব্যয় করেছেন</th>
                                        <th
                                            class="px-6 py-4 text-sm font-bold text-left text-gray-700 uppercase whitespace-nowrap">
                                            বিবরণ</th>
                                        {{-- <th
                                            class="px-6 py-4 text-sm font-bold text-left text-gray-700 uppercase whitespace-nowrap">
                                            ভাউচার</th> --}}
                                        <th
                                            class="px-6 py-4 text-sm font-bold text-left text-gray-700 uppercase whitespace-nowrap">
                                            তারিখ</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @foreach ($expenses as $index => $expense)
                                        <tr class="transition-colors hover:bg-gray-50">
                                            <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">
                                                {{ $index + 1 }}
                                            </td>
                                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                {{ $expense->purpose }}
                                            </td>
                                            <td class="px-6 py-4 text-sm font-semibold text-red-600 whitespace-nowrap">
                                                ৳{{ number_format($expense->amount, 2) }}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-700 whitespace-nowrap">
                                                {{ $expense->by_whom ?? 'N/A' }}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-600">
                                                {{ $expense->description ? Str::limit($expense->description, 50) : 'N/A' }}
                                            </td>
                                            {{-- <td class="px-6 py-4 text-sm text-gray-700 whitespace-nowrap">
                                                @if ($expense->voucher)
                                                    <a href="{{ asset('storage/' . $expense->voucher) }}" target="_blank"
                                                        class="inline-flex items-center px-3 py-1 text-xs font-medium text-white transition-colors bg-blue-600 rounded-lg hover:bg-blue-700">
                                                        <i class="mr-1 fas fa-download"></i>
                                                        ডাউনলোড
                                                    </a>
                                                @else
                                                    <span class="text-gray-400">N/A</span>
                                                @endif
                                            </td> --}}
                                            <td class="px-6 py-4 text-sm text-gray-600 whitespace-nowrap">
                                                {{ $expense->created_at->format('d M Y') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr
                                        class="font-bold border-t-2 border-gray-300 bg-gradient-to-r from-red-50 to-orange-50">
                                        <td colspan="2" class="px-6 py-4 text-right text-gray-800">সর্বমোট:</td>
                                        <td class="px-6 py-4 text-lg text-red-600">
                                            ৳{{ number_format($totalExpense, 2) }}
                                        </td>
                                        <td colspan="4"></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    @else
                        <div class="py-12 text-center">
                            <div class="inline-flex items-center justify-center w-24 h-24 mb-4 bg-gray-100 rounded-full">
                                <i class="text-4xl text-gray-400 fas fa-inbox"></i>
                            </div>
                            <h3 class="mb-2 text-xl font-semibold text-gray-700">কোনো ব্যয় পাওয়া যায়নি</h3>
                            <p class="text-gray-500">এখনও কোনো আর্থিক লেনদেন রেকর্ড করা হয়নি।</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
