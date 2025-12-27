<!-- Donation Modal -->
<div id="donationModal" class="fixed inset-0 z-50 hidden">
    <!-- Overlay -->
    <div class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm transition-opacity duration-300"
        onclick="closeDonationModal()"></div>
    <!-- Modal Content -->
    <div class="flex items-center justify-center min-h-screen p-4">
        <div id="donationModalContent"
            class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full mx-4 transform transition-all duration-300 scale-95 opacity-0 overflow-y-auto max-h-screen">
            <!-- Header -->
            <div class="flex items-center justify-between p-6 border-b border-gray-200">
                <h3 class="text-2xl font-bold text-gray-900">ডোনেশন ফর্ম</h3>
                <button onclick="closeDonationModal()"
                    class="text-gray-400 hover:text-gray-600 transition-colors p-2 hover:bg-gray-100 rounded-lg">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            <!-- Body -->
            <div class="px-6 py-8">
                <form action="{{ route('donate.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block font-semibold text-gray-700 mb-1">নাম <span class="text-red-500">*</span></label>
                            <input name="name" value="{{ old('name') }}" type="text" class="form-input w-full border rounded-lg px-4 py-2" placeholder="আব্দুল করিম">
                            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block font-semibold text-gray-700 mb-1">মোবাইল নম্বর <span class="text-red-500">*</span></label>
                            <input name="mobile" value="{{ old('mobile') }}" type="tel" class="form-input w-full border rounded-lg px-4 py-2" placeholder="০১৭xxxxxxxx">
                            @error('mobile') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block font-semibold text-gray-700 mb-1">মোট পেমেন্ট (টাকা) <span class="text-red-500">*</span></label>
                            <input name="amount" value="{{ old('amount') }}" type="number" step="0.01" class="form-input w-full border rounded-lg px-4 py-2" placeholder="amount">
                            @error('amount') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">ছবি আপলোড <span class="text-red-500">*</span></label>
                            <input type="file" name="photo" class="form-input">
                            @error('photo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">ডকুমেন্ট আপলোড <span class="text-red-500">*</span></label>
                            <input type="file" name="document" class="form-input">
                            @error('document') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white py-3 rounded-xl font-bold text-lg transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                        <i class="fas fa-check-circle mr-2"></i> ডোনেশন করুন
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
