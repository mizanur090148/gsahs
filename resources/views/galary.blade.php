@extends('layouts.app')

@section('title', 'গোটিয়া শোমসের আলী উচ্চ বিদ্যালয় - পুনর্মিলনী ২০২৬')

@section('content')
    <div>
        <!-- Statistics Section -->
        {{-- <section id="stats" class="py-8 bg-gradient-to-br from-gray-50 to-white">
            <div class="px-6 mx-auto max-w-7xl" style="margin-top: 6rem">
                <div class="mb-4 text-center">
                    <h2 class="mb-3 text-4xl font-bold text-gray-900 md:text-5xl text-gradient">পরিসংখ্যান</h2>
                </div>

                <div class="grid grid-cols-2 gap-6 md:grid-cols-2 md:gap-4">
                    <!-- Card 1 -->
                    <div class="stats-card stats-card-custom group">
                        <div class="text-5xl font-black text-blue-600 counter">0
                        </div>
                        <div class="text-lg font-semibold text-gray-700">নিবন্ধনকৃত শিক্ষার্থী</div>
                        <div class="w-full h-2 mt-2 overflow-hidden bg-blue-100 rounded-full">
                            <div class="h-2 transition-all duration-1000 ease-out rounded-full bg-gradient-to-r from-blue-500 to-blue-600"
                                style="width: 1419%"></div>
                        </div>
                    </div>

                    <!-- Card 5 -->
                    <div class="stats-card stats-card-custom group">
                        <div class="text-5xl font-black text-purple-500 counter">0
                        </div>
                        <div class="text-lg font-semibold text-gray-700">নিবন্ধনকৃত শিক্ষার্থীর পরিবারের সদস্য</div>
                        <div class="w-full h-2 mt-2 overflow-hidden bg-blue-100 rounded-full">
                            <div class="h-2 transition-all duration-1000 ease-out rounded-full bg-gradient-to-r from-purple-500 to-purple-700"
                                style="width: 190%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        <section class="py-8 bg-gradient-to-br from-white to-gray-50">
            <div class="px-6 mx-auto max-w-7xl">
                <div class="mb-8 text-center">
                    <h2 class="mb-3 text-4xl font-bold text-gray-900 md:text-5xl">
                        ছবি গ্যালারি
                    </h2>
                    <div class="w-24 h-1 mx-auto mt-4 rounded-full bg-gradient-to-r from-purple-500 to-blue-500"></div>
                </div>

                <!-- Image Gallery -->
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
                    @for ($i = 1; $i <= 9; $i++)
                        <div
                            class="relative overflow-hidden transition-all duration-300 bg-white border border-gray-200 shadow-md group rounded-xl hover:border-purple-400 hover:shadow-xl">

                            <!-- Image -->
                            <img style="height:21rem;" src="{{ asset('assets/images/galaries/school' . str_pad($i, 2, '0', STR_PAD_LEFT) . '.jpeg') }}"
                                alt="School Image {{ $i }}"
                                class="block w-full object-cover
                               h-[21rem]
                               transition-transform duration-300
                               group-hover:scale-105" />

                            <!-- Overlay -->
                            <div
                                class="absolute inset-0 flex items-center justify-center transition-opacity duration-300 opacity-0 bg-black/50 group-hover:opacity-100">
                                <h3 class="text-lg font-bold text-white">
                                    স্কুলের ছবি {{ $i }}
                                </h3>
                            </div>

                        </div>
                    @endfor
                </div>
            </div>
        </section>



    </div>
@endsection
