@extends('layouts.app')

@section('title', 'যোগাযোগ')

@section('content')
<section class="py-16 bg-gradient-to-br from-purple-900 to-blue-900 text-white">
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
                    <h3 class="text-xl font-bold text-white mb-2"> \যোগাযোগ</h3>
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
                    <p class="text-purple-100">ছাতারপাইয়া, সেনবাগ, নোয়াখালী, বাংলাদেশ</p>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="bg-white/10 backdrop-blur-lg border border-white/20 rounded-2xl p-8">
                <h3 class="text-2xl font-bold text-white mb-6">বার্তা পাঠান</h3>
                @if(session('success'))
                <div class="mb-6 p-4 bg-green-500/20 border border-green-500/30 rounded-lg">
                    <p class="text-green-300">{{ session('success') }}</p>
                </div>
                @endif

                <form method="POST" action="{{ route('contact.send') }}" class="space-y-6">
                    @csrf
                    <div>
                        <input name="contact_name" type="text" class="w-full bg-white/20 border border-white/30 rounded-lg px-4 py-3 text-white placeholder-purple-200" placeholder="আপনার নাম" value="{{ old('contact_name') }}">
                        @error('contact_name') <span class="text-red-300 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <input name="contact_email" type="email" class="w-full bg-white/20 border border-white/30 rounded-lg px-4 py-3 text-white placeholder-purple-200" placeholder="ইমেইল ঠিকানা" value="{{ old('contact_email') }}">
                        @error('contact_email') <span class="text-red-300 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <input name="contact_phone" type="tel" class="w-full bg-white/20 border border-white/30 rounded-lg px-4 py-3 text-white placeholder-purple-200" placeholder="মোবাইল নম্বর" value="{{ old('contact_phone') }}">
                        @error('contact_phone') <span class="text-red-300 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <textarea name="contact_message" class="w-full bg-white/20 border border-white/30 rounded-lg px-4 py-3 text-white placeholder-purple-200 h-32" placeholder="আপনার বার্তা লিখুন">{{ old('contact_message') }}</textarea>
                        @error('contact_message') <span class="text-red-300 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <button type="submit" class="w-full bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white py-3 rounded-lg font-bold transition-all duration-300">
                        <i class="fas fa-paper-plane mr-2"></i>
                        বার্তা পাঠান
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
