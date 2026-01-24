<!-- Donation Modal -->
<div id="donationModal" class="fixed inset-0 z-50 hidden">
    <!-- Overlay -->
    <div class="fixed inset-0 transition-opacity duration-300 bg-black bg-opacity-50 backdrop-blur-sm"
        onclick="closeDonationModal()"></div>
    <!-- Modal Content -->
    <div class="flex items-center justify-center min-h-screen p-4">
        <div id="donationModalContent"
            class="w-full max-w-2xl max-h-screen mx-4 overflow-y-auto transition-all duration-300 transform scale-95 bg-white shadow-2xl opacity-0 rounded-2xl">
            <!-- Header -->
            <div class="flex items-center justify-between p-3 border-b border-gray-200">
                <h3 class="text-2xl font-bold text-gray-900">ডোনেশন ফর্ম </h3>
                <button onclick="closeDonationModal()"
                    class="p-2 text-gray-400 transition-colors rounded-lg hover:text-gray-600 hover:bg-gray-100">
                    <i class="text-xl fas fa-times"></i>
                </button>
            </div>
            <!-- Body -->
            <div class="px-6 pb-4 mb-4">
                <div class="text-center mb-3 mt-2">
                    <div>
                        <label class="block mb-3 font-bold text-red-500">বিশেষ সতর্কতা:
                            শুধুমাত্র এই ২টি নাম্বারে টাকা পাঠাবেন। অন্য কোনো নাম্বারে টাকা পাঠালে কর্তৃপক্ষ দায়ী থাকবে
                            না। </label>
                        <div class="grid grid-cols-1 gap-3 md:grid-cols-2 text-center">
                            <label for="radioSingle"
                                class="flex items-center justify-center p-4 transition-colors border-2 border-gray-200 rounded-lg cursor-pointer hover:border-blue-500">
                                <div>
                                    <span class="font-semibold">01610333033</span>
                                    <p class="font-semibold text-gray-700">বিকাশ, নগদ, রকেট, ট্যাপ</p>
                                </div>
                            </label>
                            <label for="radioGroup"
                                class="flex items-center justify-center p-4 transition-colors border-2 border-gray-200 rounded-lg cursor-pointer hover:border-blue-500">
                                <div>
                                    <span class="font-semibold">01718822094</span>
                                    <p class="font-semibold text-gray-700">বিকাশ, নগদ</p>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
                <form action="{{ route('donate.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf
                    <div class="grid gap-6 md:grid-cols-2">
                        <div>
                            <label class="block mb-1 font-semibold text-gray-700">নাম <span
                                    class="text-red-500">*</span></label>
                            <input name="name" value="{{ old('name') }}" type="text"
                                class="w-full px-4 py-2 border rounded-lg form-input" placeholder="আব্দুল করিম">
                            @error('name')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold text-gray-700">পিতার নাম <span
                                    class="text-red-500">*</span></label>
                            <input name="father_name" value="{{ old('father_name') }}" type="text"
                                class="w-full px-4 py-2 border rounded-lg form-input" placeholder="আব্দুল করিম">
                            @error('father_name')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold text-gray-700">মোবাইল নম্বর <span
                                    class="text-red-500">*</span></label>
                            <input name="mobile" value="{{ old('mobile') }}" type="tel"
                                class="w-full px-4 py-2 border rounded-lg form-input" placeholder="০১৭xxxxxxxx">
                            @error('mobile')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold text-gray-700">ঠিকানা <span
                                    class="text-red-500">*</span></label>
                            <input name="address" value="{{ old('address') }}" type="text"
                                class="w-full px-4 py-2 border rounded-lg form-input" placeholder="আপনার ঠিকানা লিখুন">
                            @error('address')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold text-gray-700">মোট পেমেন্ট (টাকা) <span
                                    class="text-red-500">*</span></label>
                            <input name="amount" value="{{ old('amount') }}" type="number" step="0.01"
                                class="w-full px-4 py-2 border rounded-lg form-input" placeholder="amount">
                            @error('amount')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="block font-semibold text-gray-700">ছবি আপলোড</label>
                            <input type="file" name="photo" class="form-input">
                            @error('photo')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold text-gray-700">লেনদেন ডকুমেন্ট আপলোড <span
                                    class="text-red-500">*</span></label>
                            <input type="file" name="document" class="form-input">
                            @error('document')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit"
                        class="w-full py-3 text-lg font-bold text-white transition-all duration-300 transform shadow-lg bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 rounded-xl hover:scale-105 hover:shadow-xl">
                        <i class="mr-2 fas fa-check-circle"></i> ডোনেশন করুন
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
