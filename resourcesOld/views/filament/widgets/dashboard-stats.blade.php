<div class="grid grid-cols-1 gap-4 md:grid-cols-3">
    <x-filament::section class="h-full">
        <div class="fi-filament-info-widget-main">
            <h3 class="text-sm text-gray-500">Total Students</h3>
            <p class="text-2xl font-bold">
                {{ number_format($this->getData()['totalStudents']) }}
            </p>
        </div>
    </x-filament::section>

    <x-filament::section class="h-full">
        <div class="fi-filament-info-widget-main">
            <p class="text-sm text-gray-500">Total Fee</p>
            <p class="text-2xl font-bold">
                ৳ {{ number_format($this->getData()['totalFee'], 2) }}
            </p>
        </div>
    </x-filament::section>

    <x-filament::section class="h-full">
        <div class="fi-filament-info-widget-main">
            <p class="text-sm text-gray-500">Total Donations</p>
            <p class="text-2xl font-bold">
                ৳ {{ number_format($this->getData()['totalDonations'], 2) }}
            </p>
        </div>
    </x-filament::section>
</div>
