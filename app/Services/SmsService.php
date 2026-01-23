<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class SmsService
{
    protected $apiKey;
    protected $senderId;
    protected $baseUrl;

    public function __construct()
    {
        $this->apiKey = env('API_KEY');
        $this->senderId = env('SMS_SENDER_ID', 'your_sender_id'); // You need to set this
        $this->baseUrl = 'http://bulksmsbd.net/api/smsapi';
    }

    public function sendSms($phone, $message)
    {
        // Remove any leading + or 0 from phone number
        $phone = ltrim($phone, '+0');

        // Add country code if not present (assuming Bangladesh)
        if (!str_starts_with($phone, '880')) {
            $phone = '880' . $phone;
        }

        $response = Http::post($this->baseUrl, [
            'api_key' => $this->apiKey,
            'senderid' => $this->senderId,
            'number' => $phone,
            'message' => $message,
            'sender'  => 'MYAPP',
        ]);

        Log::info("SMS API Response Status: " . $response->status());
        Log::info("SMS API Response Body: " . $response->body());

        return $response->successful();
    }
}
