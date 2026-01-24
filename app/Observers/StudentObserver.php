<?php

namespace App\Observers;

use App\Models\Student;
use App\Services\SmsService;

class StudentObserver
{
    protected $smsService;

    public function __construct(SmsService $smsService)
    {
        $this->smsService = $smsService;
    }

    public function updated(Student $student)
    {
        // Check if status changed from 'pending' to 'active'
        if ($student->wasChanged('status') &&
            $student->getOriginal('status') === 'pending' &&
            $student->status === 'active') {

            $message = "অভিনন্দন! গোটিয়া শোমসের আলী উচ্চ বিদ্যালয়ের গ্র্যান্ড পুনর্মিলনী-২০২৬ এ আপনার নিবন্ধন সফল হয়েছে। পুনর্মিলনীতে আপনাকে স্বাগতম!";

            // Use the actual student's phone number
            $this->smsService->sendSms($student->phone, $message);
        }
    }
}
