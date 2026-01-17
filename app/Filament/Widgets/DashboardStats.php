<?php

namespace App\Filament\Widgets;

use App\Models\Donation;
use App\Models\Student;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Students', number_format(Student::count()))
                ->description('Registered students')
                ->color('success'),

            Stat::make('Total Fee', '৳ ' . number_format(Student::sum('amount'), 2))
                ->description('Total fee collected')
                ->color('warning'),

            Stat::make('Total Donations', '৳ ' . number_format(Donation::sum('amount'), 2))
                ->description('Total donations received')
                ->color('info'),

            Stat::make('Total', '৳ ' . number_format(Donation::sum('amount') +Student::sum('amount'), 2))
                ->description('Total received')
                ->color('info'),
        ];
    }
}
