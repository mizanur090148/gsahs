@extends('layouts.app')

@section('title', 'গোটিয়া শোমসের আলী উচ্চ বিদ্যালয় - পুনর্মিলনী ২০২৬')

@section('content')
    <div>
        <!-- Hero Section -->
        <section id="" class="hero-bg h-fit flex justify-center items-end"
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
                <div class="max-w-6xl mx-auto px-3">
                    <h1 class="text-6xl md:text-8xl lg:text-8xl font-black mb-8 leading-none text-white">
                        স্বাগতম পুনর্মিলনী ২০২৬
                    </h1>

                    <div class="flex flex-col sm:flex-row gap-6 justify-center items-center mb-20">
                        <a href="#registration"
                            class="bg-gradient-to-r from-orange-500 via-red-500 to-pink-600 hover:from-orange-600 hover:via-red-600 hover:to-pink-700 text-white px-12 py-4 rounded-full text-lg font-bold transition-all duration-300 transform hover:scale-105">
                            <i class="fas fa-user-plus mr-3"></i>
                            নিবন্ধন করুন
                        </a>
                        <a href="#news"
                            class="border-2 border-white text-white px-12 py-4 rounded-full text-lg font-bold transition-all duration-300 transform hover:scale-105 hover:bg-white hover:text-gray-900">
                            <i class="fas fa-bullhorn mr-3"></i>
                            সর্বশেষ ঘোষণা
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Statistics Section -->
        <section id="stats" class="py-8 bg-gradient-to-br from-gray-50 to-white">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-8">
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-3 text-gradient">পরিসংখ্যান</h2>
                    <p class="text-xl text-gray-600">পুনর্মিলনী সংক্রান্ত সকল গুরুত্বপূর্ণ তথ্য এবং আপডেট</p>
                    <div class="w-24 h-1 bg-gradient-to-r from-purple-500 to-pink-500 mx-auto mt-3 rounded-full"></div>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-5 gap-6 md:gap-4">
                    <!-- Card 1 -->
                    <div class="stats-card group">
                        <div
                            class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-all duration-500 shadow-lg group-hover:shadow-blue-500/30">
                            <i
                                class="fas fa-user text-3xl text-white group-hover:rotate-12 transition-transform duration-300"></i>
                        </div>
                        <div class="counter text-5xl font-black text-blue-600 mb-3" data-target="{{ $studentCount }}">0
                        </div>
                        <div class="text-gray-700 font-semibold text-lg">নিবন্ধনকৃত শিক্ষার্থী</div>
                        <div class="mt-3 w-full bg-blue-100 rounded-full h-2 overflow-hidden">
                            <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-2 rounded-full transition-all duration-1000 ease-out"
                                style="width: 1419%"></div>
                        </div>
                    </div>

                    <!-- Card 5 -->
                    <div class="stats-card group">
                        <div
                            class="w-20 h-20 bg-gradient-to-br from-purple-500 to-purple-700 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-all duration-500 shadow-lg group-hover:shadow-blue-500/30">
                            <i
                                class="fas fa-users text-3xl text-white group-hover:rotate-12 transition-transform duration-300"></i>
                        </div>
                        <div class="counter text-5xl font-black text-purple-500 mb-3" data-target="{{ $relativesCount }}">0
                        </div>
                        <div class="text-gray-700 font-semibold text-lg">নিবন্ধনকৃত শিক্ষার্থীর পরিবারের সদস্য</div>
                        <div class="mt-3 w-full bg-blue-100 rounded-full h-2 overflow-hidden">
                            <div class="bg-gradient-to-r from-purple-500 to-purple-700 h-2 rounded-full transition-all duration-1000 ease-out"
                                style="width: 190%"></div>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="stats-card group">
                        <div
                            class="w-20 h-20 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-all duration-500 shadow-lg group-hover:shadow-green-500/30">
                            <i
                                class="fas fa-graduation-cap text-3xl text-white group-hover:rotate-12 transition-transform duration-300"></i>
                        </div>
                        <div class="counter text-5xl font-black text-green-600 mb-3" data-target="38">0</div>
                        <div class="text-gray-700 font-semibold text-lg">অননুমোদিত শিক্ষার্থীরা</div>
                        <div class="mt-3 w-full bg-green-100 rounded-full h-2 overflow-hidden">
                            <div class="bg-gradient-to-r from-green-500 to-emerald-600 h-2 rounded-full transition-all duration-1000 ease-out"
                                style="width: 38%"></div>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="stats-card group">
                        <div
                            class="w-20 h-20 bg-gradient-to-br from-red-500 to-pink-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-all duration-500 shadow-lg group-hover:shadow-red-500/30">
                            <i
                                class="fas fa-clock text-3xl text-white group-hover:rotate-12 transition-transform duration-300"></i>
                        </div>
                        <div class="counter text-5xl font-black text-red-600 mb-3" data-target="87.790978037882">0</div>
                        <div class="text-gray-700 font-semibold text-lg">দিন বাকি</div>
                        <div class="mt-3 w-full bg-red-100 rounded-full h-2 overflow-hidden">
                            <div class="bg-gradient-to-r from-red-500 to-pink-600 h-2 rounded-full transition-all duration-1000 ease-out"
                                style="width: 87.790978037882%"></div>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="stats-card group">
                        <div
                            class="w-20 h-20 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-all duration-500 shadow-lg group-hover:shadow-yellow-500/30">
                            <i
                                class="fas fa-calendar text-3xl text-white group-hover:rotate-12 transition-transform duration-300"></i>
                        </div>
                        <div class="counter text-5xl font-black text-orange-600 mb-3" data-target="5">0</div>
                        <div class="text-gray-700 font-semibold text-lg">সব খবর</div>
                        <div class="mt-3 w-full bg-orange-100 rounded-full h-2 overflow-hidden">
                            <div class="bg-gradient-to-r from-yellow-500 to-orange-500 h-2 rounded-full transition-all duration-1000 ease-out"
                                style="width: 5%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Registration Section -->
        <section id="registration" class="py-16 bg-gray-50">
            <div class="max-w-4xl mx-auto px-6">
                <div class="text-center mb-6">
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 text-gradient">পুনর্মিলনীর জন্য নিবন্ধন
                    </h2>
                    <p class="text-xl text-gray-600">আপনার তথ্য পূরণ করে রিইউনিয়নে অংশগ্রহণ নিশ্চিত করুন, আমরা রিইউনিয়ন
                        অনুষ্ঠানে আপনাকে দেখার অপেক্ষায় আছি!</p>
                    <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto mt-4 rounded-full"></div>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100">
                    <div class="text-center">
                        <!-- Content can be added here if needed -->
                    </div>
                    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-8">
                            <h3 class="text-xl font-bold text-gray-900 mb-3 flex items-center">
                                <!-- Content can be added here -->
                            </h3>
                            <div class="space-y-6">
                                <!-- Registration Type -->
                                <div>
                                    <label class="block text-gray-700 font-semibold mb-3">আপনি কি একাই রেজিস্ট্রেশন করতে
                                        চান? <span class="text-red-500">*</span></label>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-2">
                                        <label for="radioSingle"
                                            class="flex items-center p-4 border-2 border-gray-200 rounded-lg cursor-pointer hover:border-blue-500 transition-colors space-x-3">
                                            <input type="radio" name="registration_type" value="single" id="radioSingle"
                                                class="w-5 h-5 text-blue-600">
                                            <div>
                                                <span class="font-semibold">👤 হ্যাঁ, একাই</span>
                                                <p class="text-sm text-gray-500">শুধুমাত্র আমার নিবন্ধন</p>
                                            </div>
                                        </label>
                                        <label for="radioGroup"
                                            class="flex items-center p-4 border-2 border-gray-200 rounded-lg cursor-pointer hover:border-blue-500 transition-colors space-x-3">
                                            <input type="radio" name="registration_type" value="group" id="radioGroup"
                                                class="w-5 h-5 text-blue-600">
                                            <div>
                                                <span class="font-semibold">👥 না, সবার জন্য</span>
                                                <p class="text-sm text-gray-500">পরিবার/বন্ধুদের সাথে</p>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div id="groupSelectWrapper" class="mb-6 hidden">
                                    <label class="block text-gray-700 font-semibold mb-2">আপনি সহ কতজন অংশগ্রহণ করতে চান?
                                        <span class="text-red-500">*</span></label>
                                    <select id="participantCount" name="participant_count" class="form-input">
                                        <option value="">অংশগ্রহণকারীর সংখ্যা নির্বাচন করুন</option>
                                        @for ($i = 2; $i <= 10; $i++)
                                            <option value="{{ $i }}">{{ $i }} জন (আমি +
                                                {{ $i - 1 }} জন)</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Payment Section -->
                        <div class="mb-6 p-6 rounded-xl border border-blue-200">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label class="block text-blue-700 font-bold text-2xl md:text-3xl mb-5">
                                        মোট পেমেন্ট (টাকা) <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" id="totalAmount" name="amount"
                                        class="form-input bg-gray-100 w-full" value="০" readonly>
                                </div>
                            </div>
                        </div>

                        <!-- Personal Information -->
                        <div class="mb-8">
                            <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                                <i class="fas fa-user text-blue-600 mr-3"></i> ব্যক্তিগত তথ্য
                            </h3>
                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-gray-700 font-semibold mb-2">পূর্ণ নাম <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" name="name" class="form-input" value="{{ old('name') }}"
                                        placeholder="যেমন: মোহাম্মদ আব্দুল করিম">
                                    @error('name')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-gray-700 font-semibold mb-2">এসএসসি ব্যাচ<span
                                            class="text-red-500">*</span></label>
                                    <select name="batch" class="form-input">
                                        <option value="">এসএসসি ব্যাচ সিলেক্ট করুন</option>
                                        @for ($year = 2025; $year >= 1982; $year--)
                                            <option value="{{ $year }}"
                                                {{ old('batch') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                        @endfor
                                    </select>
                                    @error('batch')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid md:grid-cols-2 gap-6 mt-6">
                                <div>
                                    <label class="block text-gray-700 font-semibold mb-2">পিতার নাম <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" name="father_name" class="form-input"
                                        value="{{ old('father_name') }}">
                                    @error('father_name')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- <div>
                                    <label class="block text-gray-700 font-semibold mb-2">রক্তের গ্রুপ <span
                                            class="text-red-500">*</span></label>
                                    <select name="blood" class="form-input">
                                        <option value="">রক্তের গ্রুপ নির্বাচন করুন</option>
                                        <option value="A+" {{ old('blood') == 'A+' ? 'selected' : '' }}>🩸 A+</option>
                                        <option value="A-" {{ old('blood') == 'A-' ? 'selected' : '' }}>🩸 A-</option>
                                        <option value="B+" {{ old('blood') == 'B+' ? 'selected' : '' }}>🩸 B+</option>
                                        <option value="B-" {{ old('blood') == 'B-' ? 'selected' : '' }}>🩸 B-</option>
                                        <option value="AB+" {{ old('blood') == 'AB+' ? 'selected' : '' }}>🩸 AB+
                                        </option>
                                        <option value="AB-" {{ old('blood') == 'AB-' ? 'selected' : '' }}>🩸 AB-
                                        </option>
                                        <option value="O+" {{ old('blood') == 'O+' ? 'selected' : '' }}>🩸 O+</option>
                                        <option value="O-" {{ old('blood') == 'O-' ? 'selected' : '' }}>🩸 O-</option>
                                    </select>
                                    @error('blood')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div> --}}
                            </div>

                            <div class="grid md:grid-cols-1 gap-6 mt-6">
                                <div>
                                    <label class="block text-gray-700 font-semibold mb-2">ছবি আপলোড <span
                                            class="text-red-500">*</span></label>
                                    <input type="file" name="photo" class="form-input">
                                    @error('photo')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mt-6">
                                <label class="block text-gray-700 font-semibold mb-2">গেঞ্জির সাইজ <span
                                        class="text-red-500">*</span></label>
                                <div class="grid grid-cols-2 md:grid-cols-6 gap-3">
                                    @foreach (['S', 'M', 'L', 'XL', 'XXL'] as $size)
                                        <label
                                            class="flex items-center justify-center p-3 border-2 border-gray-200 rounded-lg cursor-pointer hover:border-blue-500 transition-colors">
                                            <input type="radio" name="tshirt" value="{{ $size }}"
                                                class="sr-only" {{ old('tshirt') == $size ? 'checked' : '' }}>
                                            <span class="font-semibold">👕 {{ $size }}</span>
                                        </label>
                                    @endforeach
                                </div>
                                @error('tshirt')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Contact Information -->
                        <div class="mb-8">
                            <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                                <i class="fas fa-phone text-purple-600 mr-3"></i> যোগাযোগের তথ্য
                            </h3>
                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-gray-700 font-semibold mb-2">মোবাইল নম্বর <span
                                            class="text-red-500">*</span></label>
                                    <input type="tel" name="phone" class="form-input"
                                        value="{{ old('phone') }}">
                                    @error('phone')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-gray-700 font-semibold mb-2">ইমেইল ঠিকানা</label>
                                    <input type="email" name="email" class="form-input"
                                        value="{{ old('email') }}">
                                    @error('email')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="mt-6">
                                <label class="block text-gray-700 font-semibold mb-2">পেশা</label>
                                <input type="text" name="profession" class="form-input"
                                    value="{{ old('profession') }}">
                                @error('profession')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div> --}}
                        </div>

                        <!-- Address Information -->
                        <div class="mb-8">
                            <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                                <i class="fas fa-map-marker-alt text-red-600 mr-3"></i> ঠিকানার তথ্য
                            </h3>

                            <div class="space-y-6">
                                <div>
                                    <label class="block text-gray-700 font-semibold mb-2">ঠিকানা <span
                                            class="text-red-500">*</span></label>
                                    <textarea name="present_address" class="form-input h-20">{{ old('present_address') }}</textarea>
                                    @error('present_address')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- <div>
                                    <label class="block text-gray-700 font-semibold mb-2">স্থায়ী ঠিকানা <span
                                            class="text-red-500">*</span></label>
                                    <textarea name="permanent_address" class="form-input h-20">{{ old('permanent_address') }}</textarea>
                                    @error('permanent_address')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div> --}}
                            </div>
                        </div>

                        <!-- Terms Agreement -->
                        <div class="flex items-start space-x-3 p-4 bg-gray-50 rounded-lg">
                            <input type="checkbox" id="terms" name="terms_agreed"
                                class="w-5 h-5 mt-1 text-blue-600">
                            <label for="terms" class="text-gray-700 leading-relaxed cursor-pointer">
                                আমি <span class="text-red-500">*</span>
                                <strong>
                                    <span class="underline text-blue-600 cursor-pointer"
                                        onclick="event.stopPropagation(); openRulesModal();">
                                        পুনর্মিলনী নিয়মাবলী
                                    </span>
                                </strong>
                                পড়েছি এবং সম্মত হয়েছি। আমি নিশ্চিত করছি যে প্রদত্ত সকল তথ্য সঠিক এবং সত্য।
                            </label>
                        </div>
                        @error('terms_agreed')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror

                        <button type="submit"
                            class="w-full bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white py-4 rounded-xl font-bold text-lg transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                            <i class="fas fa-check-circle mr-2"></i>
                            নিবন্ধন সম্পন্ন করুন
                        </button>
                    </form>
                </div>

                <!-- Payment Info -->
                <div class="grid md:grid-cols-2 gap-6 mt-6">
                    <div class="p-6 bg-blue-50 rounded-xl border border-blue-200 shadow-lg flex justify-center items-center flex-col cursor-pointer group"
                        onclick="copyToClipboard('01610333033')">
                        <p class="text-blue-800 text-3xl">
                            • বিকাশ নম্বর:
                            <br>
                            <strong id="bkash-number" class="text-3xl font-extrabold group-hover:text-blue-900">
                                01610333033
                            </strong>
                        </p>
                        <span id="copy-status" class="text-sm text-green-600 hidden mt-3">✅ কপি হয়েছে!</span>
                    </div>

                    {{-- <div class="p-6 bg-blue-50 rounded-xl border border-blue-200 shadow-lg text-center">
                        <h4 class="text-xl font-bold text-blue-900 mb-4 flex items-center justify-center">
                            স্ক্যান করুন
                        </h4>
                        <img src="{{ asset('assets/images/qr-code.png') }}" alt="QR Code"
                            class="w-32 h-32 object-cover mx-auto rounded-lg border border-blue-300">
                    </div> --}}
                </div>
            </div>
        </section>

        <!-- Alumni Directory Section -->
        {{-- <section id="alumni" class="py-16 bg-gradient-to-br from-white to-gray-50">
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
                        <select name="batch" class="form-input w-full" onchange="this.form.submit()">
                            <option value="">বছর নির্বাচন করুন</option>
                            @for ($year = 2025; $year >= 1964; $year--)
                                <option value="{{ $year }}" {{ request('batch') == $year ? 'selected' : '' }}>
                                    {{ $year }}</option>
                            @endfor
                        </select>
                    </div>
                </form>

                <!-- Button -->
                <div class="text-center mt-12">
                    <a href="{{ route('alumni.all') }}"
                        class="bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-10 py-4 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 hover:-translate-y-1">
                        <i class="fas fa-plus-circle mr-2"></i>
                        আরো দেখুন
                    </a>
                </div>
            </div>
        </section> --}}

        <!-- Financial Summary Section -->
        <section id="financial" class="py-16 bg-gray-50">
            <div class="max-w-6xl mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">আর্থিক অবস্থা</h2>
                    <p class="text-xl text-gray-600">পুনর্মিলনী আয়োজনের আর্থিক হিসাব ও তথ্য</p>
                </div>

                <!-- Summary Cards -->
                <div class="grid md:grid-cols-3 gap-8 mb-12">
                    <div class="bg-green-50 p-8 rounded-2xl text-center border border-green-200">
                        <div class="text-sm text-green-600 mb-2">মোট আয়</div>
                        <div class="text-4xl font-bold text-green-600 mb-2">{{ $totalIncome }}</div>
                        <div class="text-sm text-green-600">টাকা</div>
                    </div>

                    <div class="bg-red-50 p-8 rounded-2xl text-center border border-red-200">
                        <div class="text-sm text-red-600 mb-2">মোট ব্যয়</div>
                        <div class="text-4xl font-bold text-red-600 mb-2">0</div>
                        <div class="text-sm text-red-600">টাকা</div>
                    </div>

                    <div class="bg-blue-50 p-8 rounded-2xl text-center border border-blue-200">
                        <div class="text-sm text-blue-600 mb-2">উদ্বৃত্ত</div>
                        <div class="text-4xl font-bold text-blue-600 mb-2">0</div>
                        <div class="text-sm text-blue-600">টাকা</div>
                    </div>
                </div>

                <!-- Toggle Button -->
                <div class="text-center mb-8">
                    <a href="{{ route('account.index') }}"
                        class="bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                        <i class="fas fa-chart-bar mr-2"></i>
                        বিস্তারিত দেখুন
                    </a>
                </div>
            </div>
        </section>

        <!-- News Section -->
        <section id="news" class="py-16 bg-gradient-to-br from-white to-gray-50">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 text-gradient">সর্বশেষ খবর</h2>
                    <p class="text-xl text-gray-600">পুনর্মিলনী সংক্রান্ত সকল গুরুত্বপূর্ণ তথ্য এবং আপডেট</p>
                    <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-green-500 mx-auto mt-4 rounded-full"></div>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    @foreach ($news as $item)
                        <div class="news-card group relative overflow-hidden">
                            <div class="absolute top-0 left-0 w-full h-1"
                                style="background: linear-gradient(to right, #3b82f6, #22d3ee)"></div>

                            <div class="flex items-start space-x-3 mb-6">
                                <div class="w-12 h-12 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-all duration-300"
                                    style="background: linear-gradient(to bottom right, #3b82f6, #22d3ee)">
                                    <img src="{{ asset($item->image) }}" alt="news image"
                                        class="w-10 h-10 object-cover rounded-xl" />
                                </div>
                                <div class="flex-1">
                                    <span
                                        class="inline-block bg-blue-100 text-blue-700 font-semibold text-xs px-3 py-1 rounded-full mb-1">
                                        {{ $item->category }}
                                    </span>
                                    <div class="text-gray-500 text-sm flex items-center">
                                        <i class="fas fa-clock mr-1"></i>
                                        {{ $item->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </div>

                            <h3
                                class="text-xl font-bold text-gray-900 mb-4 group-hover:text-blue-600 transition-colors duration-300">
                                {{ $item->title }}
                            </h3>
                            <p class="text-gray-600 text-sm mb-6 leading-relaxed">
                                {{ Str::limit($item->description, 100) }}</p>

                            <div class="flex items-center justify-between">
                                <a href="{{ route('news.show', $item->id) }}"
                                    class="inline-flex items-center text-blue-600 font-semibold text-sm hover:text-blue-700 transition-colors group-hover:translate-x-2 transition-transform duration-300">
                                    বিস্তারিত পড়ুন
                                    <i
                                        class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform duration-300"></i>
                                </a>
                                <div class="flex items-center space-x-2 text-gray-400">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('news.show', $item->id)) }}&amp;t={{ urlencode($item->title) }}"
                                        target="_blank" rel="noopener noreferrer"
                                        class="hover:text-blue-600 transition-colors" title="Share on Facebook">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="https://wa.me/?text={{ urlencode($item->title . ' ' . route('news.show', $item->id)) }}"
                                        target="_blank" rel="noopener noreferrer"
                                        class="hover:text-green-500 transition-colors" title="Share on WhatsApp">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="text-center mt-12">
                    <a href="{{ route('news.index') }}"
                        class="bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-10 py-4 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 hover:-translate-y-1">
                        <i class="fas fa-newspaper mr-2"></i> সব খবর দেখুন
                    </a>
                </div>
            </div>
        </section>

        <!-- Events Schedule Section -->
        <section id="events" class="py-16 bg-purple-50">
            <div class="max-w-6xl mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">কার্যক্রমের সময়সূচী</h2>
                    <p class="text-xl text-gray-600">পুনর্মিলনী দিনের প্রতিটি মুহূর্তের বিস্তারিত তথ্য</p>
                </div>

                <!-- Timeline -->
                <div class="timeline">
                    @include('partials.timeline')
                </div>

                <div class="text-center mt-12">
                    <p class="text-gray-600 italic">সময়সূচি প্রয়োজন অনুযায়ী পরিবর্তনযোগ্য।প্রতিটি পর্বের সঞ্চালনার
                        দায়িত্ব নির্ধারিত থাকবে আগেই।সাউন্ড, আলোকসজ্জা ও নিরাপত্তা ব্যবস্থা বিকেলের আগে সম্পন্ন করতে হবে।
                    </p>
                </div>
            </div>
        </section>

        <!-- Sponsors Section -->
        {{-- <section class="py-16 bg-gray-50">
            <div class="max-w-6xl mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">অনুষ্ঠানের স্পনসর</h2>
                    <p class="text-xl text-gray-600">
                        আমাদের পুনর্মিলনীতে যারা স্পনসর হিসেবে যুক্ত হয়েছে, সেইসব প্রতিষ্ঠানকে আন্তরিক ধন্যবাদ
                    </p>
                    <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto mt-4 rounded-full"></div>
                </div>
                <div class="swiper mySwiper mt-12">
                    <div class="swiper-wrapper" style="height:120px;">
                        @foreach ($sponsors as $sponsor)
                            <div class="swiper-slide flex justify-center">
                                <div class="text-center p-6 bg-white rounded-lg">
                                    <img src="{{ asset($sponsor->logo) }}" alt="{{ $sponsor->name }}"
                                        class="w-48 h-12 object-contain">
                                    <h3 class="font-bold text-gray-900 mt-2 text-lg">{{ $sponsor->name }}</h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section> --}}

        <!-- Contact Section -->
        <section id="contact" class="py-16 bg-gradient-to-br from-purple-900 to-blue-900 text-white">
            <div class="max-w-6xl mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold mb-4">যোগাযোগ করুন</h2>
                    <p class="text-xl text-purple-100">প্রয়োজনে আমাদের সাথে যোগাযোগ করুন এবং দ্রুত সহায়তা পান</p>
                </div>

                <div class="grid md:grid-cols-2 gap-12">
                    <!-- Contact Info -->
                    <div class="space-y-8">
                        <div class="contact-card bg-white/10 backdrop-blur-lg border border-white/20">
                            <div class="contact-icon bg-gradient-to-br from-blue-500 to-purple-600">
                                <i class="fas fa-phone"></i>
                            </div>
                            <h3 class="text-xl font-bold text-white mb-2"> যোগাযোগ</h3>
                            <p class="text-purple-100">01610333033, 01746893933</p>
                        </div>

                        <div class="contact-card bg-white/10 backdrop-blur-lg border border-white/20">
                            <div class="contact-icon bg-gradient-to-br from-green-500 to-teal-600">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <h3 class="text-xl font-bold text-white mb-2">ইমেইল ঠিকানা</h3>
                            <p class="text-purple-100">reunion.gsahs@gmail.com</p>
                        </div>

                        <div class="contact-card bg-white/10 backdrop-blur-lg border border-white/20">
                            <div class="contact-icon bg-gradient-to-br from-orange-500 to-red-600">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <h3 class="text-xl font-bold text-white mb-2">বিদ্যালয়ের ঠিকানা</h3>
                            <p class="text-purple-100">গোটিয়া, মেছরা, সিরাজগঞ্জ, বাংলাদেশ</p>
                        </div>
                    </div>

                    <!-- Contact Form -->
                    <div class="bg-white/10 backdrop-blur-lg border border-white/20 rounded-2xl p-8">
                        <h3 class="text-2xl font-bold text-white mb-6">বার্তা পাঠান</h3>
                        <form method="POST" action="{{ route('contact.send') }}" class="space-y-6">
                            @csrf
                            <div>
                                <input name="contact_name" type="text"
                                    class="w-full bg-white/20 border border-white/30 rounded-lg px-4 py-3 text-white placeholder-purple-200"
                                    placeholder="আপনার নাম" value="{{ old('contact_name') }}">
                                @error('contact_name')
                                    <span class="text-red-300 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <input name="contact_email" type="email"
                                    class="w-full bg-white/20 border border-white/30 rounded-lg px-4 py-3 text-white placeholder-purple-200"
                                    placeholder="ইমেইল ঠিকানা" value="{{ old('contact_email') }}">
                                @error('contact_email')
                                    <span class="text-red-300 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <input name="contact_phone" type="tel"
                                    class="w-full bg-white/20 border border-white/30 rounded-lg px-4 py-3 text-white placeholder-purple-200"
                                    placeholder="মোবাইল নম্বর" value="{{ old('contact_phone') }}">
                                @error('contact_phone')
                                    <span class="text-red-300 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <textarea name="contact_message"
                                    class="w-full bg-white/20 border border-white/30 rounded-lg px-4 py-3 text-white placeholder-purple-200 h-32"
                                    placeholder="আপনার বার্তা লিখুন">{{ old('contact_message') }}</textarea>
                                @error('contact_message')
                                    <span class="text-red-300 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit"
                                class="w-full bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white py-3 rounded-lg font-bold transition-all duration-300">
                                <i class="fas fa-paper-plane mr-2"></i>
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
        });
    </script>
@endpush
