@extends('layouts.app')

@section('title', 'গোটিয়া শোমসের আলী উচ্চ বিদ্যালয় - পুনর্মিলনী ২০২৬')

@section('content')
    <div>
        <!-- Statistics Section -->
        <section id="stats" class="py-8 bg-gradient-to-br from-gray-50 to-white">
            <div class="px-6 mx-auto max-w-7xl" style="margin-top: 6rem">
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

                <div class="mb-4 text-center">
                    <h2 class="mb-3 text-4xl font-bold text-gray-900 md:text-5xl text-gradient">পরিসংখ্যান</h2>
                </div>

                <div class="grid grid-cols-2 gap-6 md:grid-cols-2 md:gap-4">
                    <!-- Card 1 -->
                    <div class="stats-card stats-card-custom group">
                        <div class="text-5xl font-black text-blue-600 counter" data-target="{{ $studentCount }}">0
                        </div>
                        <div class="text-lg font-semibold text-gray-700">নিবন্ধনকৃত শিক্ষার্থী</div>
                        <div class="w-full h-2 mt-2 overflow-hidden bg-blue-100 rounded-full">
                            <div class="h-2 transition-all duration-1000 ease-out rounded-full bg-gradient-to-r from-blue-500 to-blue-600"
                                style="width: 1419%"></div>
                        </div>
                    </div>

                    <!-- Card 5 -->
                    <div class="stats-card stats-card-custom group">
                        <div class="text-5xl font-black text-purple-500 counter" data-target="{{ $relativesCount }}">0
                        </div>
                        <div class="text-lg font-semibold text-gray-700">নিবন্ধনকৃত শিক্ষার্থীর পরিবারের সদস্য</div>
                        <div class="w-full h-2 mt-2 overflow-hidden bg-blue-100 rounded-full">
                            <div class="h-2 transition-all duration-1000 ease-out rounded-full bg-gradient-to-r from-purple-500 to-purple-700"
                                style="width: 190%"></div>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    {{-- <div class="stats-card group">
                        <div class="mb-3 text-5xl font-black text-green-600 counter" data-target="38">0</div>
                        <div class="text-lg font-semibold text-gray-700">অননুমোদিত শিক্ষার্থীরা</div>
                        <div class="w-full h-2 mt-3 overflow-hidden bg-green-100 rounded-full">
                            <div class="h-2 transition-all duration-1000 ease-out rounded-full bg-gradient-to-r from-green-500 to-emerald-600"
                                style="width: 38%"></div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </section>

        <section class="py-8 bg-gradient-to-br from-white to-gray-50">
            <div class="px-6 mx-auto max-w-7xl">
                <div class="mb-8 text-center">
                    <h2 class="mb-3 text-4xl font-bold text-gray-900 md:text-5xl text-gradient">
                        নিবন্ধনকৃত শিক্ষার্থীর তালিকা
                    </h2>
                    <div class="w-24 h-1 mx-auto mt-4 rounded-full bg-gradient-to-r from-purple-500 to-blue-500"></div>
                </div>

                <!-- Search Filters -->
                <form method="GET" action="{{ route('registered-students.index') }}"
                    class="grid items-end max-w-5xl gap-6 mx-auto mb-8 md:grid-cols-4">

                    <!-- Name -->
                    <div>
                        <label class="flex items-center mb-2 font-semibold text-gray-700">
                            <i class="mr-2 text-blue-600 fas fa-search"></i>
                            নাম দিয়ে খুঁজুন
                        </label>

                        <input type="text" name="name" value="{{ request('name') }}" class="w-full form-input"
                            placeholder="যেমন: মোহাম্মদ আব্দুল করিম">
                    </div>

                    <!-- Batch -->
                    <div>
                        <label class="flex items-center mb-2 font-semibold text-gray-700">
                            <i class="mr-2 text-green-600 fas fa-graduation-cap"></i>
                            ব্যাচ/সাল
                        </label>

                        <select name="batch" class="w-full form-input">
                            <option value="">বছর নির্বাচন করুন</option>
                            @for ($year = 2025; $year >= 1964; $year--)
                                <option value="{{ $year }}" {{ request('batch') == $year ? 'selected' : '' }}>
                                    {{ $year }}
                                </option>
                            @endfor
                        </select>
                    </div>

                    <!-- Button -->
                    <div class="flex items-end">
                        <button type="submit"
                            class="w-full px-6 py-3 font-semibold text-white transition-all duration-300 rounded-lg bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700">
                            <i class="mr-2 fas fa-search"></i>
                            খুঁজুন
                        </button>
                    </div>
                </form>

                <!-- Alumni Cards -->
                <div class="grid gap-6 md:grid-cols-5">
                    @foreach ($alumni as $alumnus)
                        <div class="relative w-full overflow-hidden transition-all duration-300 transform bg-white shadow-md alumni-card group rounded-xl hover:shadow-xl hover:-translate-y-1"
                            data-name="{{ strtolower($alumnus->name) }}" data-batch="{{ $alumnus->batch }}">

                            <!-- Image Section -->
                            <div class="flex justify-center pt-6">
                                <img @if ($alumnus->photo) src="{{ asset('storage/' . $alumnus->photo) }}"
                    @else
                        src="{{ asset('/assets/images/student.jpeg') }}" @endif
                                    alt="{{ $alumnus->name }}"
                                    class="object-cover w-24 h-24 transition-transform duration-300 border-4 border-white rounded-full shadow-md group-hover:scale-105">
                            </div>

                            <!-- Card Body -->
                            <div class="p-1 text-center">
                                <h3
                                    class="mt-2 mb-1 text-sm font-bold text-gray-900 transition-colors group-hover:text-blue-600">
                                    {{ $alumnus->name }}
                                </h3>

                                <div class="space-y-2 text-sm text-gray-600 custom-card">
                                    <div class="flex items-center justify-center">
                                        <span class="px-3 py-1 text-xs font-semibold text-white bg-blue-600 rounded-full">
                                            ব্যাচ  -  {{ $alumnus->batch }}
                                        </span>
                                    </div>
                                    <div class="flex items-center justify-center">
                                        <i class="mr-2 text-green-500 fas fa-phone"></i>
                                        <span>{{ $alumnus->phone }}</span>
                                    </div>

                                    @if ($alumnus->email)
                                        <div class="flex items-center justify-center">
                                            <i class="mr-2 text-purple-500 fas fa-envelope"></i>
                                            <span class="truncate max-w-[220px]">{{ $alumnus->email }}</span>
                                        </div>
                                    @endif
                                    {{-- @if ($alumnus->tshirt)
                                        <div class="flex items-center justify-center">
                                            <i class="mr-1 fas fa-t-shirt"></i>
                                            <span class="truncate max-w-[220px]">{{ $alumnus->tshirt }}</span>
                                        </div>
                                    @endif --}}
                                    <div class="flex items-center justify-center">
                                        <span class="px-3 py-1 text-xs font-semibold text-white {{ $alumnus->status === 'active' ? 'bg-green-600' : 'bg-yellow-500' }} rounded-full">
                                            Status  - {{ $alumnus->status }}
                                        </span>
                                    </div>
                                </div>

                                <!-- Footer -->
                                {{-- <div
                                    class="flex justify-center gap-6 pt-4 mt-4 text-sm text-gray-500 border-t border-gray-100">
                                    <span>
                                        <i class="mr-1 fas fa-t-shirt"></i>
                                        {{ $alumnus->tshirt }}
                                    </span>
                                    <span>
                                        <i class="mr-1 fas fa-tint"></i>
                                        {{ $alumnus->blood }}
                                    </span>
                                </div> --}}
                            </div>
                        </div>
                    @endforeach
                </div>

                @if ($alumni->isEmpty())
                    <div class="py-12 text-center">
                        <i class="mb-4 text-6xl text-gray-300 fas fa-users"></i>
                        <h3 class="mb-2 text-2xl font-bold text-gray-700">কোনো প্রাক্তন শিক্ষার্থী পাওয়া যায়নি</h3>
                        <p class="text-gray-600">আপনার অনুসন্ধানের সাথে মিল রেখে কোনো ফলাফল পাওয়া যায়নি</p>
                    </div>
                @endif

                <!-- Pagination -->
                {{-- @if ($alumni && $alumni->hasPages())
                    <div class="mt-12">
                        {{ $alumni->links() }}
                    </div>
                @endif --}}
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
