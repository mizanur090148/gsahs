@extends('layouts.app')

@section('title', 'ডোনেশন করুন - গোটিয়া শোমসের আলী উচ্চ বিদ্যালয়')

@section('content')
    <div style="padding-top: 8rem" class="min-h-screen py-24 bg-gradient-to-br from-gray-50 to-white">
        <div class="px-6 mx-auto max-w-5xl">
            <!-- Header Section -->
            <div class="mb-8 text-center">
                <h2 class="mb-3 text-4xl font-bold text-gray-900 md:text-5xl">
                    ডোনেশন করুন
                </h2>
                {{-- <p class="text-xl text-gray-600">আপনার ডোনেশনের মাধ্যমে শিক্ষা প্রতিষ্ঠানকে এগিয়ে নিয়ে যান</p> --}}
                <div class="w-32 h-1 mx-auto mt-4 rounded-full bg-gradient-to-r from-green-500 to-emerald-500"></div>
            </div>

            <!-- Main Form Card -->
            <div class="overflow-hidden bg-white shadow-2xl rounded-2xl">
                <!-- Warning Banner -->
                <div class="p-6 bg-gradient-to-r from-red-50 to-orange-50 border-b border-red-200">
                    <div class="flex items-start">
                        <div class="flex items-center justify-center flex-shrink-0 w-12 h-12 mr-4 bg-red-100 rounded-full">
                            <i class="text-xl text-red-600 fas fa-exclamation-triangle"></i>
                        </div>
                        <div>
                            <h3 class="mb-1 text-lg font-bold text-red-700">বিশেষ সতর্কতা</h3>
                            <p class="text-sm text-gray-700">শুধুমাত্র নিচের ২টি নাম্বারে টাকা পাঠাবেন। অন্য কোনো নাম্বারে টাকা পাঠালে কর্তৃপক্ষ দায়ী থাকবে না।</p>
                        </div>
                    </div>
                </div>

                <!-- Payment Numbers -->
                <div class="p-8 border-b border-gray-200 bg-gradient-to-br from-blue-50 to-indigo-50">
                    {{-- <h3 class="mb-6 text-xl font-bold text-center text-gray-800">পেমেন্ট নাম্বার</h3> --}}
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div class="p-6 text-center transition-all duration-300 transform bg-white border-2 border-green-200 shadow-md rounded-xl hover:scale-105 hover:shadow-lg">
                            <div class="inline-flex items-center justify-center w-16 h-16 mb-3 bg-green-100 rounded-full">
                                <i class="text-2xl text-green-600 fas fa-mobile-alt"></i>
                            </div>
                            <p class="mb-1 text-2xl font-bold text-gray-800">01610333033</p>
                            <p class="text-sm text-gray-600">বিকাশ, নগদ, রকেট, ট্যাপ</p>
                        </div>
                        <div class="p-6 text-center transition-all duration-300 transform bg-white border-2 border-blue-200 shadow-md rounded-xl hover:scale-105 hover:shadow-lg">
                            <div class="inline-flex items-center justify-center w-16 h-16 mb-3 bg-blue-100 rounded-full">
                                <i class="text-2xl text-blue-600 fas fa-mobile-alt"></i>
                            </div>
                            <p class="mb-1 text-2xl font-bold text-gray-800">01718822094</p>
                            <p class="text-sm text-gray-600">বিকাশ, নগদ</p>
                        </div>
                    </div>
                </div>

                <!-- Form Section -->
                <div class="p-8">
                    <div class="mb-6">
                        <h3 class="text-2xl font-bold text-gray-800">ডোনেশন ফর্ম</h3>
                        <p class="text-sm text-gray-600">নিচের তথ্য সঠিকভাবে পূরণ করুন</p>
                    </div>

                    <form action="{{ route('donate.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <div class="grid gap-6 md:grid-cols-2">
                            <!-- Name -->
                            <div>
                                <label class="block mb-2 text-sm font-semibold text-gray-700">
                                    নাম <span class="text-red-500">*</span>
                                </label>
                                <input name="name" value="{{ old('name') }}" type="text" required
                                    class="w-full px-3 py-2 text-sm text-gray-900 transition-all border-2 border-gray-200 rounded-lg focus:border-green-500 focus:ring-2 focus:ring-green-200 focus:outline-none"
                                    placeholder="আপনার নাম লিখুন">
                                @error('name')
                                    <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Father Name -->
                            <div>
                                <label class="block mb-2 text-sm font-semibold text-gray-700">
                                    পিতার নাম <span class="text-red-500">*</span>
                                </label>
                                <input name="father_name" value="{{ old('father_name') }}" type="text" required
                                    class="w-full px-3 py-2 text-sm text-gray-900 transition-all border-2 border-gray-200 rounded-lg focus:border-green-500 focus:ring-2 focus:ring-green-200 focus:outline-none"
                                    placeholder="পিতার নাম লিখুন">
                                @error('father_name')
                                    <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Sender Mobile -->
                            <div>
                                <label class="block mb-2 text-sm font-semibold text-gray-700">
                                    যে নাম্বার থেকে টাকা পাঠানো হয়েছে <span class="text-red-500">*</span>
                                </label>
                                <input name="mobile" value="{{ old('mobile') }}" type="tel" required
                                    class="w-full px-3 py-2 text-sm text-gray-900 transition-all border-2 border-gray-200 rounded-lg focus:border-green-500 focus:ring-2 focus:ring-green-200 focus:outline-none"
                                    placeholder="০১৭xxxxxxxx">
                                @error('mobile')
                                    <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Receiver Mobile -->
                            <div>
                                <label class="block mb-2 text-sm font-semibold text-gray-700">
                                    যে নাম্বারে টাকা পাঠানো হয়েছে <span class="text-red-500">*</span>
                                </label>
                                <select name="receiver_mobile" required
                                    class="w-full px-3 py-2 text-sm text-gray-900 transition-all border-2 border-gray-200 rounded-lg focus:border-green-500 focus:ring-2 focus:ring-green-200 focus:outline-none">
                                    <option value="">নাম্বার নির্বাচন করুন</option>
                                    <option value="01610333033" {{ old('receiver_mobile') == '01610333033' ? 'selected' : '' }}>01610333033</option>
                                    <option value="01718822094" {{ old('receiver_mobile') == '01718822094' ? 'selected' : '' }}>01718822094</option>
                                </select>
                                @error('receiver_mobile')
                                    <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Address -->
                            <div>
                                <label class="block mb-2 text-sm font-semibold text-gray-700">
                                    ঠিকানা <span class="text-red-500">*</span>
                                </label>
                                <input name="address" value="{{ old('address') }}" type="text" required
                                    class="w-full px-3 py-2 text-sm text-gray-900 transition-all border-2 border-gray-200 rounded-lg focus:border-green-500 focus:ring-2 focus:ring-green-200 focus:outline-none"
                                    placeholder="আপনার ঠিকানা লিখুন">
                                @error('address')
                                    <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Amount -->
                            <div>
                                <label class="block mb-2 text-sm font-semibold text-gray-700">
                                    মোট পেমেন্ট (টাকা) <span class="text-red-500">*</span>
                                </label>
                                <input name="amount" value="{{ old('amount') }}" type="number" step="0.01" required
                                    class="w-full px-3 py-2 text-sm text-gray-900 transition-all border-2 border-gray-200 rounded-lg focus:border-green-500 focus:ring-2 focus:ring-green-200 focus:outline-none"
                                    placeholder="টাকার পরিমাণ লিখুন">
                                @error('amount')
                                    <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- File Uploads -->
                        <div class="grid gap-6 pt-4 border-t border-gray-200 md:grid-cols-2">
                            <!-- Photo Upload -->
                            <div>
                                <label class="block mb-2 text-sm font-semibold text-gray-700">
                                    ছবি আপলোড <span class="text-gray-500">(ঐচ্ছিক)</span>
                                </label>
                                <input type="file" name="photo" accept="image/*"
                                    class="w-full px-3 py-2 text-sm text-gray-900 transition-all border-2 border-gray-200 rounded-lg file:mr-3 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
                                <p class="mt-1 text-xs text-gray-500">সর্বোচ্চ ফাইল সাইজ: 2MB</p>
                                @error('photo')
                                    <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Document Upload -->
                            <div>
                                <label class="block mb-2 text-sm font-semibold text-gray-700">
                                    লেনদেন ডকুমেন্ট আপলোড <span class="text-red-500">*</span>
                                </label>
                                <input type="file" name="document" required
                                    class="w-full px-3 py-2 text-sm text-gray-900 transition-all border-2 border-gray-200 rounded-lg file:mr-3 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                <p class="mt-1 text-xs text-gray-500">সর্বোচ্চ ফাইল সাইজ: 5MB (PDF, JPG, PNG)</p>
                                @error('document')
                                    <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col gap-4 pt-6 border-t border-gray-200 sm:flex-row">
                            <button type="submit"
                                class="flex-1 px-6 py-3 text-base font-semibold text-white transition-all duration-300 transform shadow-lg bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 rounded-xl hover:scale-105 hover:shadow-xl">
                                <i class="mr-2 fas fa-paper-plane"></i> ডোনেশন সম্পন্ন করুন
                            </button>
                            <a href="{{ route('donations.list') }}"
                                class="flex-1 px-6 py-3 text-base font-semibold text-center text-gray-700 transition-all duration-300 transform bg-white border-2 border-gray-300 shadow-md hover:bg-gray-50 rounded-xl hover:scale-105 hover:shadow-lg">
                                <i class="mr-2 fas fa-list"></i> ডোনেশন তালিকা দেখুন
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
