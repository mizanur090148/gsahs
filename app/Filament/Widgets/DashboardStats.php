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
        // Calculate adjusted total fee (with discounts) - only active students
        $students = Student::where('status', 'active')->get();
        $adjustedTotalFee = $students->sum(function ($student) {
            $participantCount = $student->participant_count ?? 1;
            $discount = 15 + ($participantCount - 1) * 9;
            return $student->amount - $discount;
        });

        $totalDonations = Donation::sum('amount');

        return [
            Stat::make('Total Students', number_format(Student::count()))
                ->description('All registered students')
                ->color('success'),

            Stat::make('Active Students', number_format(Student::where('status', 'active')->count()))
                ->description('Active students only')
                ->color('success'),

            Stat::make('Total Fee', '৳ ' . number_format($adjustedTotalFee, 2))
                ->description('From active students (after discounts)')
                ->color('warning'),

            Stat::make('Total Donations', '৳ ' . number_format($totalDonations, 2))
                ->description('Total donations received')
                ->color('info'),

            Stat::make('Total', '৳ ' . number_format($totalDonations + $adjustedTotalFee, 2))
                ->description('Total received')
                ->color('info'),
        ];
    }
}
