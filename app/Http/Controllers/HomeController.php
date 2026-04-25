<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Student;
use App\Models\Expense;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        // Get latest news
        $news = [
            (object)[
                'id' => 1,
                'title' => 'রেজিস্ট্রেশনের শেষ তারিখ: ৩০ শে এপ্রিল ২০২৬ ইংরেজী পর্যন্ত',
                'description' => 'রেজিস্ট্রেশনের শেষ তারিখ: ৩০ শে এপ্রিল ২০২৬ ইংরেজী পর্যন্ত',
                'image' => 'photos/1766501816_Screenshot_1.png',
                'category' => 'গুরুত্বপূর্ণ',
                'created_at' => now()->subDay(),
            ],
            (object)[
                'id' => 2,
                'title' => "গ্র্যান্ড পুনর্মিলনী-২০২৬ রেজিস্ট্রেশন সংক্রান্ত নিয়মাবলি",
                'description' => 'পুনর্মিলনী নিয়মাবলী',
                'image' => 'photos/1759986059_1759054600_favicon.png',
                'category' => 'গুরুত্বপূর্ণ',
                'created_at' => now()->subMonths(3),
            ],
            (object)[
                'id' => 3,
                'title' => 'অনুষ্ঠানের স্থান নির্ধারণ',
                'description' => 'মূল অনুষ্ঠান স্কুলের প্রাঙ্গনে অনুষ্ঠিত হবে।',
                'image' => 'photos/1759986083_1759054600_favicon.png',
                'category' => 'স্থান',
                'created_at' => now()->subMonths(5),
            ]
        ];

        // Get sponsors
        $sponsors = [
            (object)[
                'name' => 'MICROTERS',
                'logo' => 'sponser/1759486344_Logo-for-white-BG.png',
            ],
            (object)[
                'name' => 'HR LIMON',
                'logo' => 'sponser/1759486328_hrlimon-header-logo.png',
            ],
            (object)[
                'name' => 'DEELKO LTD',
                'logo' => 'sponser/1759719766_Deelko%20Logo.png',
            ]
        ];

        $studentCount = Student::count();
        $relativesCount = Student::sum('participant_count') - $studentCount;
        $totalFee = Student::where('status', 'active')->sum('amount');
        
        $activeStudentCount = Student::where('status', 'active')->count();
        $activeRelativesCount = Student::where('status', 'active')->sum('participant_count') - $activeStudentCount;
        
        $totalFee = $totalFee - $activeStudentCount * 15 - $activeRelativesCount * 9;
        
        $totalDonation = (int) Donation::sum('amount');
        if ($totalDonation > 0) {
            $totalDonation -= (int) ($totalDonation * 1.5 / 100);
        }
        
        $totalCollectedMoney = $totalFee + $totalDonation;
        $totalExpense = (int) Expense::sum('amount');

        $today = Carbon::today();
        $endDate = Carbon::create($today->year, 4, 30);

        // যদি আজ 31 মার্চ পার হয়ে যায় → next year
        if ($today->gt($endDate)) {
            $endDate = Carbon::create($today->year + 1, 4, 20);
        }

        $daysRemaining = $today->diffInDays($endDate);

        return view('home', compact('news', 'daysRemaining', 'totalCollectedMoney', 'sponsors', 'studentCount', 'relativesCount', 'totalFee', 'totalDonation', 'totalExpense'));
    }
}
