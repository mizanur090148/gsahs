@extends('layouts.app')

@section('title', 'গোটিয়া শোমসের আলী উচ্চ বিদ্যালয় - পুনর্মিলনী ২০২৬')

@section('content')
    <div>
        <!-- Hero Section -->
        {{-- <section id="" class="hero-bg h-fit flex justify-center items-end"
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
        </section> --}}

        <!-- Statistics Section -->
        <section id="stats" class="py-8 bg-gradient-to-br from-gray-50 to-white">
            <div class="max-w-7xl mx-auto px-6" style="margin-top: 6rem">
                <div class="text-center mb-8">
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-3 text-gradient">পরিসংখ্যান</h2>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 gap-6 md:gap-4">
                    <!-- Card 1 -->
                    <div class="stats-card group">
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
                        <div class="counter text-5xl font-black text-green-600 mb-3" data-target="38">0</div>
                        <div class="text-gray-700 font-semibold text-lg">অননুমোদিত শিক্ষার্থীরা</div>
                        <div class="mt-3 w-full bg-green-100 rounded-full h-2 overflow-hidden">
                            <div class="bg-gradient-to-r from-green-500 to-emerald-600 h-2 rounded-full transition-all duration-1000 ease-out"
                                style="width: 38%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-16 bg-gradient-to-br from-white to-gray-50">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 text-gradient">
                        নিবন্ধনকৃত শিক্ষার্থীর তালিকা
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
                                <h3
                                    class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors">
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
