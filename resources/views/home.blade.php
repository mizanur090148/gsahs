@extends('layouts.app')

@section('title', 'গোটিয়া শোমসের আলী উচ্চ বিদ্যালয় - পুনর্মিলনী ২০২৬')

@section('content')
    <div>
        <!-- Hero Section -->
        <section id="" class="flex items-end justify-center hero-bg h-fit"
            style="background:
    linear-gradient(135deg, rgba(15, 23, 42, 0.9), rgba(30, 41, 59, 0.85)),
    radial-gradient(ellipse at top, rgba(99, 102, 241, 0.3), transparent 70%),
    radial-gradient(ellipse at bottom right, rgba(236, 72, 153, 0.3), transparent 70%),
    url({{ asset('uploads/1753777584_bg.webp') }});
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    padding-top:150px;">
            <div class="text-center">
                @if (session('success'))
                    <div class="mb-6" data-flash>
                        <div
                            class="flex items-center justify-center max-w-2xl px-6 py-4 mx-auto text-green-800 transition-all duration-500 bg-green-100 border border-green-300 shadow-lg rounded-xl">
                            <i class="mr-3 text-2xl text-green-600 fas fa-check-circle"></i>
                            <span class="font-semibold text-center">
                                {{ session('success') }}
                            </span>
                        </div>
                    </div>
                @endif
                <div class="max-w-6xl px-3 mx-auto">
                    <h1 class="mb-5 text-6xl font-black leading-none text-white md:text-7xl lg:text-7xl">
                        স্বাগতম গ্র্যান্ড পুনর্মিলনী - ২০২৬
                    </h1>
                    <h3 class="mb-8 text-4xl font-black leading-none text-white md:text-4xl lg:text-4xl">
                        গোটিয়া শোমসের আলী উচ্চ বিদ্যালয়
                    </h3>

                    <div class="flex flex-col items-center justify-center gap-6 mb-20 sm:flex-row">
                        <a href="#registration"
                            class="px-12 py-4 text-lg font-bold text-white transition-all duration-300 transform rounded-full bg-gradient-to-r from-orange-500 via-red-500 to-pink-600 hover:from-orange-600 hover:via-red-600 hover:to-pink-700 hover:scale-105">
                            <i class="mr-3 fas fa-user-plus"></i>
                            নিবন্ধন করুন
                        </a>
                        <a onclick="event.stopPropagation(); openRulesModal();"
                            class="px-12 py-4 text-lg font-bold text-white transition-all duration-300 transform border-2 border-white rounded-full cursor-pointer hover:scale-105 hover:bg-white hover:text-gray-900">
                            <i class="mr-3 fas fa-bullhorn"></i>
                            নিবন্ধনের নিয়মাবলি
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Statistics Section -->
        <section id="stats" class="py-8 bg-gradient-to-br from-gray-50 to-white">
            <div class="px-6 mx-auto max-w-7xl">
                <div class="mb-8 text-center">
                    <h2 class="mb-3 text-4xl font-bold text-gray-900 md:text-5xl text-gradient">পরিসংখ্যান</h2>
                    <p class="text-xl text-gray-600">পুনর্মিলনী সংক্রান্ত সকল গুরুত্বপূর্ণ তথ্য এবং আপডেট</p>
                    <div class="w-24 h-1 mx-auto mt-3 rounded-full bg-gradient-to-r from-purple-500 to-pink-500"></div>
                </div>

                <div class="grid grid-cols-2 gap-6 md:grid-cols-3 md:gap-4">
                    <!-- Card 1 -->
                    <div class="stats-card group">
                        <div
                            class="flex items-center justify-center w-20 h-20 mx-auto mb-6 transition-all duration-500 shadow-lg bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl group-hover:scale-110 group-hover:shadow-blue-500/30">
                            <i
                                class="text-3xl text-white transition-transform duration-300 fas fa-user group-hover:rotate-12"></i>
                        </div>
                        <div class="mb-3 text-5xl font-black text-blue-600 counter" data-target="{{ $studentCount }}">0
                        </div>
                        <div class="text-lg font-semibold text-gray-700">নিবন্ধনকৃত শিক্ষার্থী</div>
                        <div class="w-full h-2 mt-3 overflow-hidden bg-blue-100 rounded-full">
                            <div class="h-2 transition-all duration-1000 ease-out rounded-full bg-gradient-to-r from-blue-500 to-blue-600"
                                style="width: 1419%"></div>
                        </div>
                    </div>

                    <!-- Card 5 -->
                    <div class="stats-card group">
                        <div
                            class="flex items-center justify-center w-20 h-20 mx-auto mb-6 transition-all duration-500 shadow-lg bg-gradient-to-br from-purple-500 to-purple-700 rounded-2xl group-hover:scale-110 group-hover:shadow-blue-500/30">
                            <i
                                class="text-3xl text-white transition-transform duration-300 fas fa-users group-hover:rotate-12"></i>
                        </div>
                        <div class="mb-3 text-5xl font-black text-purple-500 counter" data-target="{{ $relativesCount }}">0
                        </div>
                        <div class="text-lg font-semibold text-gray-700">নিবন্ধনকৃত শিক্ষার্থীর পরিবারের সদস্য</div>
                        <div class="w-full h-2 mt-3 overflow-hidden bg-blue-100 rounded-full">
                            <div class="h-2 transition-all duration-1000 ease-out rounded-full bg-gradient-to-r from-purple-500 to-purple-700"
                                style="width: 190%"></div>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    {{-- <div class="stats-card group">
                        <div
                            class="flex items-center justify-center w-20 h-20 mx-auto mb-6 transition-all duration-500 shadow-lg bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl group-hover:scale-110 group-hover:shadow-green-500/30">
                            <i
                                class="text-3xl text-white transition-transform duration-300 fas fa-graduation-cap group-hover:rotate-12"></i>
                        </div>
                        <div class="mb-3 text-5xl font-black text-green-600 counter" data-target="38">0</div>
                        <div class="text-lg font-semibold text-gray-700">অননুমোদিত শিক্ষার্থীরা</div>
                        <div class="w-full h-2 mt-3 overflow-hidden bg-green-100 rounded-full">
                            <div class="h-2 transition-all duration-1000 ease-out rounded-full bg-gradient-to-r from-green-500 to-emerald-600"
                                style="width: 38%"></div>
                        </div>
                    </div> --}}

                    <!-- Card 4 -->
                    <div class="stats-card group">
                        <div
                            class="flex items-center justify-center w-20 h-20 mx-auto mb-6 transition-all duration-500 shadow-lg bg-gradient-to-br from-red-500 to-pink-600 rounded-2xl group-hover:scale-110 group-hover:shadow-red-500/30">
                            <i
                                class="text-3xl text-white transition-transform duration-300 fas fa-clock group-hover:rotate-12"></i>
                        </div>
                        <div class="mb-3 text-5xl font-black text-red-600 counter" data-target="{{ $daysRemaining }}">0
                        </div>
                        <div class="text-lg font-semibold text-gray-700">দিন বাকি</div>
                        <div class="w-full h-2 mt-3 overflow-hidden bg-red-100 rounded-full">
                            <div class="h-2 transition-all duration-1000 ease-out rounded-full bg-gradient-to-r from-red-500 to-pink-600"
                                style="width: 87.790978037882%"></div>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    {{-- <div class="stats-card group">
                        <div
                            class="flex items-center justify-center w-20 h-20 mx-auto mb-6 transition-all duration-500 shadow-lg bg-gradient-to-br from-yellow-500 to-orange-500 rounded-2xl group-hover:scale-110 group-hover:shadow-yellow-500/30">
                            <i
                                class="text-3xl text-white transition-transform duration-300 fas fa-calendar group-hover:rotate-12"></i>
                        </div>
                        <div class="mb-3 text-5xl font-black text-orange-600 counter" data-target="5">0</div>
                        <div class="text-lg font-semibold text-gray-700">সব খবর</div>
                        <div class="w-full h-2 mt-3 overflow-hidden bg-orange-100 rounded-full">
                            <div class="h-2 transition-all duration-1000 ease-out rounded-full bg-gradient-to-r from-yellow-500 to-orange-500"
                                style="width: 5%"></div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </section>

        <!-- Registration Section -->
        <section id="registration" class="py-16 bg-gray-50">
            <div class="max-w-4xl px-6 mx-auto">
                <div class="mb-6 text-center">
                    <h2 class="mb-4 text-4xl font-bold text-gray-900 md:text-5xl text-gradient">পুনর্মিলনীর জন্য নিবন্ধন
                    </h2>
                    <p class="text-xl text-gray-600">আপনার তথ্য পূরণ করে গ্রাণ্ড পুনর্মিলনী - ২০২৬ - এ অংশগ্রহণ নিশ্চিত করুন। আমরা গ্রাণ্ড পুনর্মিলনী - ২০২৬ - এ আপনাকে দেখার অপেক্ষায় আছি।</p>
                    <div class="w-24 h-1 mx-auto mt-4 rounded-full bg-gradient-to-r from-blue-500 to-purple-500"></div>
                </div>

                <div class="p-8 bg-white border border-gray-100 shadow-lg rounded-2xl">
                    <div class="text-center">
                        <!-- Content can be added here if needed -->
                    </div>
                    <form id="registrationForm" action="{{ route('students.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-8">
                            {{-- <h3 class="flex items-center mb-3 text-xl font-bold text-gray-900"> --}}
                            <!-- Content can be added here -->
                            </h3>
                            <div class="space-y-6">
                                <!-- Registration Type -->
                                <div>
                                    <label class="block mb-3 font-semibold text-gray-700">আপনি কি একাই রেজিস্ট্রেশন করতে
                                        চান? <span class="text-red-500">*</span></label>
                                    <div class="grid grid-cols-1 gap-3 md:grid-cols-2">
                                        <label for="radioSingle"
                                            class="flex items-center p-4 space-x-3 transition-colors border-2 border-gray-200 rounded-lg cursor-pointer hover:border-blue-500">
                                            <input type="radio" name="registration_type" value="single" id="radioSingle"
                                                class="w-5 h-5 text-blue-600">
                                            <div>
                                                <span class="font-semibold">👤 হ্যাঁ, একাই</span>
                                                <p class="text-sm text-gray-500">শুধুমাত্র আমার নিবন্ধন</p>
                                            </div>
                                        </label>
                                        <label for="radioGroup"
                                            class="flex items-center p-4 space-x-3 transition-colors border-2 border-gray-200 rounded-lg cursor-pointer hover:border-blue-500">
                                            <input type="radio" name="registration_type" value="group" id="radioGroup"
                                                class="w-5 h-5 text-blue-600">
                                            <div>
                                                <span class="font-semibold">👥 না, সবার জন্য</span>
                                                <p class="text-sm text-gray-500">পরিবার/বন্ধুদের সাথে</p>
                                            </div>
                                        </label>
                                    </div>
                                    @error('registration_type')
                                        <span class="text-sm text-red-500">{{ 'রেজিস্ট্রেশনের ধরন নির্বাচন করুন' }}</span>
                                    @enderror
                                </div>

                                <div id="groupSelectWrapper" class="hidden mb-6">
                                    <label class="block mb-2 font-semibold text-gray-700">আপনি সহ কতজন অংশগ্রহণ করতে চান?
                                        <span class="text-red-500">*</span></label>
                                    <select id="participantCount" name="participant_count" class="form-input">
                                        <option value="">অংশগ্রহণকারীর সংখ্যা নির্বাচন করুন</option>
                                        @for ($i = 2; $i <= 7; $i++)
                                            <option value="{{ $i }}">{{ $i }} জন (আমি +
                                                {{ $i - 1 }} জন)</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Payment Section -->
                        <div class="p-4 mb-6 border border-blue-200 rounded-xl">
                            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                                <div>
                                    <label class="block mb-2 text-2xl font-bold text-blue-700 md:text-2xl">
                                        মোট পেমেন্ট (টাকা) <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" id="totalAmount" name="amount"
                                        class="w-full bg-gray-100 form-input" value="০" readonly>
                                </div>
                            </div>
                        </div>

                        <!-- Personal Information -->
                        <div class="mb-8">
                            <h3 class="flex items-center mb-4 text-xl font-bold text-gray-900">
                                <i class="mr-3 text-blue-600 fas fa-user"></i> ব্যক্তিগত তথ্য
                            </h3>
                            <div class="grid gap-6 md:grid-cols-2">
                                <div>
                                    <label class="block mb-2 font-semibold text-gray-700">পূর্ণ নাম <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" name="name" class="form-input" value="{{ old('name') }}"
                                        placeholder="যেমন: মোহাম্মদ আব্দুল করিম">
                                    @error('name')
                                        <span class="text-sm text-red-500">{{ 'আপনার পূর্ণ নাম লিখুন' }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label class="block mb-2 font-semibold text-gray-700">পিতার নাম <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" name="father_name" class="form-input"
                                        value="{{ old('father_name') }}">
                                    @error('father_name')
                                        <span class="text-sm text-red-500">{{ 'আপনার পিতার নাম লিখুন' }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid gap-6 mt-6 md:grid-cols-1">
                                <div>
                                    <label class="block mb-2 font-semibold text-gray-700">আপনার ছবি আপলোড
                                        <span class="text-red-500">*</span>
                                    </label>
                                    <input type="file" name="photo" class="form-input">
                                    @error('photo')
                                        <span class="text-sm text-red-500">{{ 'আপনার ছবি আপলোড করুন' }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid gap-6 mt-6 md:grid-cols-1">
                                <div>
                                    <label class="block mb-2 font-semibold text-gray-700">এসএসসি ব্যাচ<span
                                            class="text-red-500">*</span></label>
                                    <select name="batch" class="form-input">
                                        <option value="">এসএসসি ব্যাচ সিলেক্ট করুন</option>
                                        @for ($year = 2025; $year >= 1982; $year--)
                                            <option value="{{ $year }}"
                                                {{ old('batch') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                        @endfor
                                    </select>
                                    @error('batch')
                                        <span class="text-sm text-red-500">{{ 'এসএসসি ব্যাচ সিলেক্ট করুন' }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mt-6">
                                <label class="block mb-2 font-semibold text-gray-700">গেঞ্জির সাইজ <span
                                        class="text-red-500">*</span></label>
                                <div class="grid grid-cols-2 gap-3 md:grid-cols-6">
                                    @foreach (['M', 'L', 'XL', 'XXL'] as $size)
                                        <label
                                            class="flex items-center justify-center p-1 transition-colors border-2 border-gray-200 rounded-lg cursor-pointer hover:border-blue-500">
                                            <input type="radio" name="tshirt" value="{{ $size }}"
                                                class="sr-only" {{ old('tshirt') == $size ? 'checked' : '' }}>
                                            <span class="font-semibold">👕 {{ $size }}</span>
                                        </label>
                                    @endforeach
                                </div>
                                @error('tshirt')
                                    <span class="text-sm text-red-500">{{ 'গেঞ্জির সাইজ সিলেক্ট করুন' }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Contact Information -->
                        <div class="mb-8">
                            <h3 class="flex items-center mb-4 text-xl font-bold text-gray-900">
                                <i class="mr-3 text-purple-600 fas fa-phone"></i> যোগাযোগের তথ্য
                            </h3>
                            <div class="grid gap-6 md:grid-cols-2">
                                <div>
                                    <label class="block mb-2 font-semibold text-gray-700">মোবাইল নম্বর <span
                                            class="text-red-500">*</span></label>
                                    <input type="tel" name="phone" class="form-input"
                                        value="{{ old('phone') }}">
                                    @error('phone')
                                        <span class="text-sm text-red-500">{{ 'আপনার মোবাইল নম্বর লিখুন' }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block mb-2 font-semibold text-gray-700">ইমেইল</label>
                                    <input type="email" name="email" class="form-input"
                                        value="{{ old('email') }}">
                                    @error('email')
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="mt-6">
                                <label class="block mb-2 font-semibold text-gray-700">পেশা</label>
                                <input type="text" name="profession" class="form-input"
                                    value="{{ old('profession') }}">
                                @error('profession')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div> --}}
                        </div>

                        <!-- Address Information -->
                        <div class="mb-4">
                            <h3 class="flex items-center mb-4 text-xl font-bold text-gray-900">
                                <i class="mr-3 text-red-600 fas fa-map-marker-alt"></i> ঠিকানার তথ্য
                            </h3>

                            <div class="space-y-6">
                                <div>
                                    <label class="block mb-2 font-semibold text-gray-700">ঠিকানা <span
                                            class="text-red-500">*</span></label>
                                    <textarea name="present_address" class="h-15 form-input">{{ old('present_address') }}</textarea>
                                    @error('present_address')
                                        <span class="text-sm text-red-500">{{ 'আপনার ঠিকানা লিখুন' }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-6">
                            <label class="block mb-2 font-semibold text-gray-700">পেমেন্ট মোড<span
                                    class="text-red-500">*</span></label>
                            <div class="grid grid-cols-2 gap-3 md:grid-cols-6">
                                @foreach (['বিকাশ' => 'bkash', 'নগদ' => 'nogod', 'রকেট' => 'rocket', 'ট্যাপ' => 'tap'] as $key => $size)
                                    <label
                                        class="flex items-center justify-center p-1 transition-colors border-2 border-gray-200 rounded-lg cursor-pointer hover:border-blue-500">
                                        <input type="radio" name="payment_mode" value="{{ $size }}"
                                            class="sr-only" {{ old('payment_mode') == $size ? 'checked' : '' }}>
                                        <span class="font-semibold">{{ $key }}</span>
                                    </label>
                                @endforeach
                            </div>
                            @error('payment_mode')
                                <span class="text-sm text-red-500">{{ 'পেমেন্ট মোড সিলেক্ট করুন' }}</span>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label class="block mb-2 font-semibold text-gray-700">যে নাম্বারে টাকা পাঠানো হয়েছে<span
                                    class="text-red-500"> *</span></label>
                            <input type="text" name="sent_to" class="form-input" value="{{ old('sent_to') }}">
                            @error('sent_to')
                                <span class="text-sm text-red-500">{{ 'যে নাম্বার নাম্বারে টাকা পাঠানো হয়েছে লিখুন' }}</span>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <div>
                                <label class="block mb-2 font-semibold text-gray-700">টাকা পাঠানোর প্রমাণ(স্ক্রীনশট)
                                    <span class="text-red-500">*</span>
                                </label>
                                <input type="file" name="screenshot" class="form-input">
                                @error('screenshot')
                                    <span class="text-sm text-red-500">{{ 'আপনার স্ক্রীনশট আপলোড করুন' }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-6">
                            <label class="block mb-2 font-semibold text-gray-700">যে নাম্বার থেকে টাকা পাঠানো হয়েছে<span
                                    class="text-red-500"> *</span></label>
                            <input type="text" name="sent_from" class="form-input" value="{{ old('sent_from') }}">
                            @error('sent_from')
                                <span class="text-sm text-red-500">{{ 'যে নাম্বার থেকে টাকা পাঠানো হয়েছে লিখুন' }}</span>
                            @enderror
                        </div>

                        <!-- Terms Agreement -->
                        <div class="flex items-start p-4 space-x-3 rounded-lg bg-gray-50">
                            <input type="checkbox" id="terms" name="terms_agreed"
                                class="w-5 h-5 mt-1 text-blue-600">
                            <label for="terms" class="leading-relaxed text-gray-700 cursor-pointer">
                                আমি <span class="text-red-500">*</span>
                                <strong>
                                    <span class="text-blue-600 underline cursor-pointer"
                                        onclick="event.stopPropagation(); openRulesModal();">
                                        পুনর্মিলনী নিয়মাবলী
                                    </span>
                                </strong>
                                পড়েছি এবং সম্মত হয়েছি।
                            </label>
                        </div>
                        @error('terms_agreed')
                            <span class="text-sm text-red-500">{{ 'শর্তাবলীতে সম্মতি প্রদান করা বাধ্যতামূলক' }}</span>
                        @enderror

                        <button type="submit"
                            class="w-full py-4 text-lg font-bold text-white transition-all duration-300 transform shadow-lg bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 rounded-xl hover:scale-105 hover:shadow-xl">
                            <i class="mr-2 fas fa-check-circle"></i>
                            নিবন্ধন সম্পন্ন করুন
                        </button>
                    </form>
                </div>

                <!-- Payment Info -->
                <div class="grid gap-6 mt-6 md:grid-cols-2">
                    <div class="flex flex-col items-center justify-center p-6 border border-blue-200 shadow-lg cursor-pointer bg-blue-50 rounded-xl group"
                        onclick="copyToClipboard('01610333033')">
                        <p class="text-3xl text-blue-800">
                            • বিকাশ নম্বর:
                            <br>
                            <strong id="bkash-number" class="text-3xl font-extrabold group-hover:text-blue-900">
                                01610333033
                            </strong>
                        </p>
                        <span id="copy-status" class="hidden mt-3 text-sm text-green-600">✅ কপি হয়েছে!</span>
                    </div>

                    {{-- <div class="p-6 text-center border border-blue-200 shadow-lg bg-blue-50 rounded-xl">
                        <h4 class="flex items-center justify-center mb-4 text-xl font-bold text-blue-900">
                            স্ক্যান করুন
                        </h4>
                        <img src="{{ asset('assets/images/qr-code.png') }}" alt="QR Code"
                            class="object-cover w-32 h-32 mx-auto border border-blue-300 rounded-lg">
                    </div> --}}
                </div>
            </div>
        </section>

        <!-- Alumni Directory Section -->
        {{-- <section id="alumni" class="py-16 bg-gradient-to-br from-white to-gray-50">
            <div class="px-6 mx-auto max-w-7xl">
                <div class="mb-16 text-center">
                    <h2 class="mb-4 text-4xl font-bold text-gray-900 md:text-5xl text-gradient">
                        প্রাক্তন ছাত্র-ছাত্রীদের তালিকা
                    </h2>
                    <div class="w-24 h-1 mx-auto mt-4 rounded-full bg-gradient-to-r from-purple-500 to-blue-500"></div>
                </div>

                <!-- Search Filters -->
                <form method="GET" action="{{ route('alumni.index') }}" class="grid gap-6 mb-8 md:grid-cols-2">
                    <div>
                        <label class="flex items-center block mb-2 font-semibold text-gray-700">
                            <i class="mr-2 text-blue-600 fas fa-search"></i> নাম দিয়ে খুঁজুন
                        </label>
                        <input type="text" name="name" value="{{ request('name') }}" class="w-full form-input"
                            placeholder="যেমন: মোহাম্মদ আব্দুল করিম">
                    </div>

                    <div>
                        <label class="flex items-center block mb-2 font-semibold text-gray-700">
                            <i class="mr-2 text-green-600 fas fa-graduation-cap"></i> ব্যাচ/সাল
                        </label>
                        <select name="batch" class="w-full form-input" onchange="this.form.submit()">
                            <option value="">বছর নির্বাচন করুন</option>
                            @for ($year = 2025; $year >= 1964; $year--)
                                <option value="{{ $year }}" {{ request('batch') == $year ? 'selected' : '' }}>
                                    {{ $year }}</option>
                            @endfor
                        </select>
                    </div>
                </form>

                <!-- Button -->
                <div class="mt-12 text-center">
                    <a href="{{ route('alumni.all') }}"
                        class="px-10 py-4 font-semibold text-white transition-all duration-300 transform shadow-lg bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 rounded-xl hover:shadow-xl hover:scale-105 hover:-translate-y-1">
                        <i class="mr-2 fas fa-plus-circle"></i>
                        আরো দেখুন
                    </a>
                </div>
            </div>
        </section> --}}

        <!-- Financial Summary Section -->
        <section id="financial" class="py-16 bg-gray-50">
            <div class="max-w-6xl px-6 mx-auto">
                <div class="mb-16 text-center">
                    <h2 class="mb-4 text-4xl font-bold text-gray-900 md:text-5xl">আর্থিক অবস্থা</h2>
                    <p class="text-xl text-gray-600">পুনর্মিলনী আয়োজনের আর্থিক হিসাব ও তথ্য</p>
                </div>

                <!-- Summary Cards -->
                <div class="grid gap-8 mb-12 md:grid-cols-4">
                    <div class="p-8 text-center border border-green-200 bg-green-50 rounded-2xl">
                        <div class="mb-2 text-sm text-green-600">মোট ফি</div>
                        <div class="mb-2 text-4xl font-bold text-green-600">{{ $totalFee }}</div>
                        <div class="text-sm text-green-600">টাকা</div>
                    </div>
                    <div class="p-8 text-center border border-green-200 bg-green-50 rounded-2xl">
                        <div class="mb-2 text-sm text-green-600">মোট ডোনেশন</div>
                        <div class="mb-2 text-4xl font-bold text-green-600">{{ $totalDonation }}</div>
                        <div class="text-sm text-green-600">টাকা</div>
                    </div>

                    <div class="p-8 text-center border border-red-200 bg-red-50 rounded-2xl">
                        <div class="mb-2 text-sm text-red-600">মোট ব্যয়</div>
                        <div class="mb-2 text-4xl font-bold text-red-600">0</div>
                        <div class="text-sm text-red-600">টাকা</div>
                    </div>

                    <div class="p-8 text-center border border-blue-200 bg-blue-50 rounded-2xl">
                        <div class="mb-2 text-sm text-blue-600">উদ্বৃত্ত</div>
                        <div class="mb-2 text-4xl font-bold text-blue-600">{{ $totalCollectedMoney }}</div>
                        <div class="text-sm text-blue-600">টাকা</div>
                    </div>
                </div>

                <!-- Toggle Button -->
                <div class="mb-8 text-center">
                    <a href="#"
                        class="px-8 py-3 font-semibold text-white transition-colors bg-blue-600 rounded-lg hover:bg-blue-700">
                        <i class="mr-2 fas fa-chart-bar"></i>
                        বিস্তারিত দেখুন
                    </a>
                </div>
            </div>
        </section>

        <!-- News Section -->
        <section id="news" class="py-16 bg-gradient-to-br from-white to-gray-50">
            <div class="px-6 mx-auto max-w-7xl">
                <div class="mb-16 text-center">
                    <h2 class="mb-4 text-4xl font-bold text-gray-900 md:text-5xl text-gradient">সর্বশেষ খবর</h2>
                    <p class="text-xl text-gray-600">পুনর্মিলনী সংক্রান্ত সকল গুরুত্বপূর্ণ তথ্য এবং আপডেট</p>
                    <div class="w-24 h-1 mx-auto mt-4 rounded-full bg-gradient-to-r from-blue-500 to-green-500"></div>
                </div>

                <div class="grid gap-8 md:grid-cols-3">
                    @foreach ($news as $item)
                        <div class="relative overflow-hidden news-card group">
                            <div class="absolute top-0 left-0 w-full h-1"
                                style="background: linear-gradient(to right, #3b82f6, #22d3ee)"></div>

                            {{-- <div class="flex items-start mb-6 space-x-3">
                                <div class="flex items-center justify-center w-12 h-12 transition-all duration-300 shadow-lg rounded-xl group-hover:scale-110"
                                    style="background: linear-gradient(to bottom right, #3b82f6, #22d3ee)">
                                     <img src="{{ asset($item->image) }}" alt="news image"
                                        class="object-cover w-10 h-10 rounded-xl" />
                                </div>
                                <div class="flex-1">
                                     <span
                                        class="inline-block px-3 py-1 mb-1 text-xs font-semibold text-blue-700 bg-blue-100 rounded-full">
                                        {{ $item->category }}
                                    </span>
                                     <div class="flex items-center text-sm text-gray-500">
                                        <i class="mr-1 fas fa-clock"></i>
                                        {{ $item->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </div> --}}

                            <h3
                                class="mb-4 text-xl font-bold text-gray-900 transition-colors duration-300 group-hover:text-blue-600">
                                {{ $item->title }}
                            </h3>
                            <p class="mb-6 text-sm leading-relaxed text-gray-600">
                                {{ Str::limit($item->description, 100) }}</p>

                            <div class="flex items-center justify-between">
                                {{-- <a href="{{ route('news.show', $item->id) }}"
                                    class="inline-flex items-center text-sm font-semibold text-blue-600 transition-colors transition-transform duration-300 hover:text-blue-700 group-hover:translate-x-2">
                                    বিস্তারিত পড়ুন
                                    <i
                                        class="ml-2 transition-transform duration-300 fas fa-arrow-right group-hover:translate-x-1"></i>
                                </a> --}}
                                {{-- <div class="flex items-center space-x-2 text-gray-400">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('news.show', $item->id)) }}&amp;t={{ urlencode($item->title) }}"
                                        target="_blank" rel="noopener noreferrer"
                                        class="transition-colors hover:text-blue-600" title="Share on Facebook">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="https://wa.me/?text={{ urlencode($item->title . ' ' . route('news.show', $item->id)) }}"
                                        target="_blank" rel="noopener noreferrer"
                                        class="transition-colors hover:text-green-500" title="Share on WhatsApp">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                </div> --}}
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-12 text-center">
                    <a href="#"
                        class="px-10 py-4 font-semibold text-white transition-all duration-300 transform shadow-lg bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 rounded-xl hover:shadow-xl hover:scale-105 hover:-translate-y-1">
                        <i class="mr-2 fas fa-newspaper"></i> সব খবর দেখুন
                    </a>
                </div>
            </div>
        </section>

        <!-- Events Schedule Section -->
        <section id="events" class="py-16 bg-purple-50">
            <div class="max-w-6xl px-6 mx-auto">
                <div class="mb-16 text-center">
                    <h2 class="mb-4 text-4xl font-bold text-gray-900 md:text-5xl">কার্যক্রমের সময়সূচী</h2>
                    <p class="text-xl text-gray-600">গ্র্যান্ড পুনর্মিলনী দিনের প্রতিটি মুহূর্তের বিস্তারিত তথ্য</p>
                </div>

                <!-- Timeline -->
                <div class="timeline">
                    @include('partials.timeline')
                </div>

                <div class="mt-12 text-center">
                    <p class="italic text-gray-600">সময়সূচি প্রয়োজন অনুযায়ী পরিবর্তনযোগ্য।প্রতিটি পর্বের সঞ্চালনার
                        দায়িত্ব নির্ধারিত থাকবে আগেই।সাউন্ড, আলোকসজ্জা ও নিরাপত্তা ব্যবস্থা বিকেলের আগে সম্পন্ন করতে হবে।
                    </p>
                </div>
            </div>
        </section>

        <!-- Sponsors Section -->
        {{-- <section class="py-16 bg-gray-50">
            <div class="max-w-6xl px-6 mx-auto">
                <div class="mb-16 text-center">
                    <h2 class="mb-4 text-4xl font-bold text-gray-900 md:text-5xl">অনুষ্ঠানের স্পনসর</h2>
                    <p class="text-xl text-gray-600">
                        আমাদের পুনর্মিলনীতে যারা স্পনসর হিসেবে যুক্ত হয়েছে, সেইসব প্রতিষ্ঠানকে আন্তরিক ধন্যবাদ
                    </p>
                    <div class="w-24 h-1 mx-auto mt-4 rounded-full bg-gradient-to-r from-blue-500 to-purple-500"></div>
                </div>
                <div class="mt-12 swiper mySwiper">
                    <div class="swiper-wrapper" style="height:120px;">
                        @foreach ($sponsors as $sponsor)
                            <div class="flex justify-center swiper-slide">
                                <div class="p-6 text-center bg-white rounded-lg">
                                    <img src="{{ asset($sponsor->logo) }}" alt="{{ $sponsor->name }}"
                                        class="object-contain w-48 h-12">
                                    <h3 class="mt-2 text-lg font-bold text-gray-900">{{ $sponsor->name }}</h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section> --}}

        <!-- Contact Section -->
        <section id="contact" class="py-16 text-white bg-gradient-to-br from-purple-900 to-blue-900">
            <div class="max-w-6xl px-6 mx-auto">
                <div class="mb-16 text-center">
                    <h2 class="mb-4 text-4xl font-bold md:text-5xl">যোগাযোগ করুন</h2>
                    <p class="text-xl text-purple-100">প্রয়োজনে আমাদের সাথে যোগাযোগ করুন এবং দ্রুত সহায়তা পান</p>
                </div>

                <div class="grid gap-12 md:grid-cols-2">
                    <!-- Contact Info -->
                    <div class="space-y-8">
                        <div class="border contact-card bg-white/10 backdrop-blur-lg border-white/20">
                            <div class="contact-icon bg-gradient-to-br from-blue-500 to-purple-600">
                                <i class="fas fa-phone"></i>
                            </div>
                            <h3 class="mb-2 text-xl font-bold text-white"> যোগাযোগ</h3>
                            <p class="text-purple-100">01610333033, 01746893933, 01309128414</p>
                        </div>

                        <div class="border contact-card bg-white/10 backdrop-blur-lg border-white/20">
                            <div class="contact-icon bg-gradient-to-br from-green-500 to-teal-600">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <h3 class="mb-2 text-xl font-bold text-white">ইমেইল ঠিকানা</h3>
                            <p class="text-purple-100">reunion.gsahs@gmail.com</p>
                        </div>

                        <div class="border contact-card bg-white/10 backdrop-blur-lg border-white/20">
                            <div class="contact-icon bg-gradient-to-br from-orange-500 to-red-600">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <h3 class="mb-2 text-xl font-bold text-white">বিদ্যালয়ের ঠিকানা</h3>
                            <p class="text-purple-100">গোটিয়া, মেছড়া, সিরাজগঞ্জ, বাংলাদেশ</p>
                        </div>
                    </div>

                    <!-- Contact Form -->
                    <div class="p-8 border bg-white/10 backdrop-blur-lg border-white/20 rounded-2xl">
                        <h3 class="mb-6 text-2xl font-bold text-white">বার্তা পাঠান</h3>
                        <form method="POST" action="{{ route('contact.send') }}" class="space-y-6">
                            @csrf
                            <div>
                                <input name="contact_name" type="text"
                                    class="w-full px-4 py-3 text-white placeholder-purple-200 border rounded-lg bg-white/20 border-white/30"
                                    placeholder="আপনার নাম" value="{{ old('contact_name') }}">
                                @error('contact_name')
                                    <span class="text-sm text-red-300">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <input name="contact_email" type="email"
                                    class="w-full px-4 py-3 text-white placeholder-purple-200 border rounded-lg bg-white/20 border-white/30"
                                    placeholder="ইমেইল ঠিকানা" value="{{ old('contact_email') }}">
                                @error('contact_email')
                                    <span class="text-sm text-red-300">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <input name="contact_phone" type="tel"
                                    class="w-full px-4 py-3 text-white placeholder-purple-200 border rounded-lg bg-white/20 border-white/30"
                                    placeholder="মোবাইল নম্বর" value="{{ old('contact_phone') }}">
                                @error('contact_phone')
                                    <span class="text-sm text-red-300">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <textarea name="contact_message"
                                    class="w-full h-32 px-4 py-3 text-white placeholder-purple-200 border rounded-lg bg-white/20 border-white/30"
                                    placeholder="আপনার বার্তা লিখুন">{{ old('contact_message') }}</textarea>
                                @error('contact_message')
                                    <span class="text-sm text-red-300">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit"
                                class="w-full py-3 font-bold text-white transition-all duration-300 rounded-lg bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700">
                                <i class="mr-2 fas fa-paper-plane"></i>
                                বার্তা পাঠান
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Alumni filter functionality
            const nameInput = document.getElementById('nameSearch');
            const batchSelect = document.getElementById('batchSearch');
            const alumniCards = document.querySelectorAll('.alumni-card');

            function filterAlumni() {
                const searchName = nameInput ? nameInput.value.toLowerCase().trim() : '';
                const selectedBatch = batchSelect ? batchSelect.value : '';

                alumniCards.forEach(card => {
                    const cardName = card.dataset.name;
                    const cardBatch = card.dataset.batch;
                    const nameMatch = cardName.includes(searchName);
                    const batchMatch = !selectedBatch || cardBatch === selectedBatch;

                    card.classList.toggle('hidden', !(nameMatch && batchMatch));
                });
            }

            if (nameInput) {
                nameInput.addEventListener('input', filterAlumni);
            }

            if (batchSelect) {
                batchSelect.addEventListener('change', filterAlumni);
            }

            // Registration amount calculation
            const radioSingle = document.getElementById('radioSingle');
            const radioGroup = document.getElementById('radioGroup');
            const groupSelectWrapper = document.getElementById('groupSelectWrapper');
            const participantSelect = document.getElementById('participantCount');
            const totalAmountField = document.getElementById('totalAmount');

            const baseAmount = 1000;
            const extraPerPerson = 600;
            const extraPercentage = 1.015; // 1.5% extra

            // Convert number to Bangla digits
            function toBanglaNumber(number) {
                const banglaDigits = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
                return number.toString().split('').map(d => {
                    return /\d/.test(d) ? banglaDigits[parseInt(d)] : d;
                }).join('');
            }

            // Calculate and update total amount
            function updateAmount() {
                let total = 0;
                if (radioSingle && radioSingle.checked) {
                    total = baseAmount;
                } else if (radioGroup && radioGroup.checked) {
                    const count = parseInt(participantSelect.value);
                    if (!isNaN(count) && count >= 1) {
                        const extraPeople = count - 1;
                        total = baseAmount + (extraPeople * extraPerPerson);
                    } else {
                        total = 0;
                    }
                }

                // Add 1.5% extra
                total = Math.round(total * extraPercentage);

                if (totalAmountField) {
                    totalAmountField.value = total;
                }
            }

            // Radio change listeners
            if (radioSingle) {
                radioSingle.addEventListener('change', function() {
                    if (this.checked) {
                        groupSelectWrapper.classList.add('hidden');
                        participantSelect.value = "";
                        updateAmount();
                    }
                });
            }

            if (radioGroup) {
                radioGroup.addEventListener('change', function() {
                    if (this.checked) {
                        groupSelectWrapper.classList.remove('hidden');
                        updateAmount();
                    }
                });
            }

            // Select change listener
            if (participantSelect) {
                participantSelect.addEventListener('change', updateAmount);
            }

            // Initialize Swiper
            const swiper = new Swiper(".mySwiper", {
                slidesPerView: 2,
                spaceBetween: 10,
                loop: true,
                autoplay: {
                    delay: 1500,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    640: {
                        slidesPerView: 2,
                    },
                    768: {
                        slidesPerView: 3,
                    },
                    1024: {
                        slidesPerView: 4,
                    },
                },
            });

            // Copy to clipboard function
            window.copyToClipboard = function(number) {
                navigator.clipboard.writeText(number).then(() => {
                    const status = document.getElementById('copy-status');
                    if (status) {
                        status.classList.remove('hidden');
                        setTimeout(() => {
                            status.classList.add('hidden');
                        }, 2000);
                    }
                });
            };

            // Donation Modal functions
            window.showDonationModal = function() {
                const modal = document.getElementById('donationModal');
                const content = document.getElementById('donationModalContent');
                if (modal && content) {
                    modal.classList.remove('hidden');
                    setTimeout(() => {
                        modal.classList.remove('opacity-0');
                        content.classList.remove('scale-95', 'opacity-0');
                    }, 10);
                }
            };

            window.closeDonationModal = function() {
                const modal = document.getElementById('donationModal');
                const content = document.getElementById('donationModalContent');
                if (modal && content) {
                    modal.classList.add('opacity-0');
                    content.classList.add('scale-95', 'opacity-0');
                    setTimeout(() => {
                        modal.classList.add('hidden');
                    }, 300);
                }
            };

            // Rules Modal functions
            window.openRulesModal = function() {
                const modal = document.getElementById('rulesModal');
                if (modal) {
                    modal.classList.remove('hidden');
                    setTimeout(() => {
                        modal.classList.remove('opacity-0', 'scale-95');
                    }, 10);
                }
            };

            window.closeRulesModal = function() {
                const modal = document.getElementById('rulesModal');
                if (modal) {
                    modal.classList.add('opacity-0', 'scale-95');
                    setTimeout(() => {
                        modal.classList.add('hidden');
                    }, 300);
                }
            };

            // Form validation and scroll to required fields
            document.getElementById('registrationForm').addEventListener('submit', function(e) {
                const requiredFields = [{
                        name: 'registration_type',
                        type: 'radio',
                        message: 'রেজিস্ট্রেশনের ধরন নির্বাচন করুন'
                    },
                    {
                        name: 'name',
                        type: 'text',
                        message: 'আপনার পূর্ণ নাম লিখুন'
                    },
                    {
                        name: 'father_name',
                        type: 'text',
                        message: 'আপনার পিতার নাম লিখুন'
                    },
                    {
                        name: 'photo',
                        type: 'file',
                        message: 'আপনার ছবি আপলোড করুন'
                    },
                    {
                        name: 'batch',
                        type: 'select',
                        message: 'এসএসসি ব্যাচ সিলেক্ট করুন'
                    },
                    {
                        name: 'tshirt',
                        type: 'radio',
                        message: 'গেঞ্জির সাইজ সিলেক্ট করুন'
                    },
                    {
                        name: 'phone',
                        type: 'text',
                        message: 'আপনার মোবাইল নম্বর লিখুন'
                    },
                    {
                        name: 'present_address',
                        type: 'text',
                        message: 'আপনার ঠিকানা লিখুন'
                    },
                    {
                        name: 'payment_mode',
                        type: 'radio',
                        message: 'পেমেন্ট মোড সিলেক্ট করুন'
                    },
                    {
                        name: 'sent_to',
                        type: 'text',
                        message: 'যে নাম্বারে টাকা পাঠানো হয়েছে লিখুন'
                    },
                    {
                        name: 'screenshot',
                        type: 'file',
                        message: 'আপনার স্ক্রীনশট আপলোড করুন'
                    },
                    {
                        name: 'sent_from',
                        type: 'text',
                        message: 'যে নাম্বার থেকে টাকা পাঠানো হয়েছে লিখুন'
                    },
                    {
                        name: 'terms_agreed',
                        type: 'checkbox',
                        message: 'শর্তাবলীতে সম্মতি প্রদান করা বাধ্যতামূলক'
                    }
                ];

                let firstInvalidField = null;
                let isValid = true;

                // Clear previous error states
                document.querySelectorAll('.error-highlight').forEach(el => {
                    el.classList.remove('error-highlight', 'border-red-500', 'ring-2',
                        'ring-red-200');
                    const errorMsg = el.parentNode.querySelector('.custom-error');
                    if (errorMsg) errorMsg.remove();
                });

                requiredFields.forEach(field => {
                    let element = null;
                    let container = null;
                    let isFieldValid = false;

                    if (field.type === 'radio') {
                        element = document.querySelector(`input[name="${field.name}"]:checked`);
                        isFieldValid = element !== null;
                        if (!isFieldValid) {
                            // Find the radio group container
                            container = document.querySelector(`input[name="${field.name}"]`)
                                .closest('.grid');
                        }
                    } else if (field.type === 'checkbox') {
                        element = document.querySelector(`input[name="${field.name}"]`);
                        isFieldValid = element && element.checked;
                        container = element.closest('.flex');
                    } else {
                        element = document.querySelector(`[name="${field.name}"]`);
                        if (element) {
                            if (field.type === 'file') {
                                isFieldValid = element.files && element.files.length > 0;
                            } else if (field.type === 'select') {
                                isFieldValid = element.value && element.value.trim() !== '';
                            } else {
                                isFieldValid = element.value && element.value.trim() !== '';
                            }
                        }
                        container = element;
                    }

                    if (!isFieldValid) {
                        isValid = false;
                        if ((element || container) && !firstInvalidField) {
                            firstInvalidField = element || container;
                        }

                        // Highlight the field
                        if (container) {
                            container.classList.add('error-highlight');
                            if (field.type === 'radio') {
                                container.classList.add('border-red-500', 'ring-2', 'ring-red-200');
                            } else if (field.type === 'checkbox') {
                                container.classList.add('border-red-500');
                            } else {
                                container.classList.add('border-red-500');
                            }
                            // Add error message
                            const errorDiv = document.createElement('div');
                            errorDiv.className = 'custom-error text-sm text-red-500 mt-1';
                            errorDiv.textContent = field.message;
                            container.parentNode.appendChild(errorDiv);
                        }
                    }
                });

                if (!isValid) {
                    e.preventDefault();
                    // Scroll to first invalid field
                    if (firstInvalidField) {
                        firstInvalidField.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                        firstInvalidField.focus();
                    }
                    return false;
                }
            });
        });
    </script>
    <script>
        setTimeout(() => {
            const alert = document.querySelector('[data-flash]');
            if (alert) {
                alert.classList.add('opacity-0', 'translate-y-[-10px]');
                setTimeout(() => alert.remove(), 500);
            }
        }, 4000);
    </script>
@endpush
