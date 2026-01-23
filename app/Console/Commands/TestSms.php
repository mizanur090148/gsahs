<?php

namespace App\Console\Commands;

use App\Services\SmsService;
use Illuminate\Console\Command;

class TestSms extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-sms {phone?} {message?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test SMS sending';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $phone = $this->argument('phone') ?? '01733714009';
        $message = $this->argument('message') ?? 'Test SMS from Laravel application';

        $this->info("Sending SMS to: $phone");
        $this->info("Message: $message");

        $smsService = app(SmsService::class);
        $result = $smsService->sendSms($phone, $message);

        if ($result) {
            $this->info('SMS sent successfully!');
        } else {
            $this->error('Failed to send SMS!');
        }
    }
}
