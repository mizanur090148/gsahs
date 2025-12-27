@php
$events = [
    ['time' => '০৮.০০ AM', 'title' => 'অতিথি ও প্রাক্তন শিক্ষার্থীদের আগমন', 'end' => '০৯.০০ AM', 'description' => 'নিবন্ধন, ব্যাজ ও কিট বিতরণ, নাস্তা পরিবেশন'],
    ['time' => '৯:০০AM', 'title' => 'জাতীয় সংগীত ও বিদ্যালয়ের সংগীত পরিবেশন, পবিত্র কোরআন তেলাওয়াত, অতিথি পরিচিতি', 'end' => '৯:৩০AM', 'description' => 'প্রধান অতিথি বক্তব্য ও পুরনো স্মৃতির আলোচনা'],
    ['time' => '৯:৩০AM', 'title' => 'উদ্বোধনী অনুষ্ঠান ও স্বাগত বক্তব্য', 'end' => '১০:৩০ AM', 'description' => 'প্রধান শিক্ষক, আয়োজক কমিটি, সম্মানিত অতিথি'],
    ['time' => '১০:৩০ AM', 'title' => 'স্মৃতিচারণ পর্ব', 'end' => '১১:৩০ AM', 'description' => 'সিনিয়র প্রাক্তন ছাত্রছাত্রীদের বক্তব্য'],
    ['time' => '১১:৩০ AM', 'title' => 'সাংস্কৃতিক পরিবেশনা', 'end' => '১২:৩০ PM', 'description' => 'নাচ, গান, কবিতা, স্কুল ব্যাচভিত্তিক পরিবেশনা'],
    ['time' => '১২:৩০ PM', 'title' => 'মধ্যাহ্ন ভোজ', 'end' => '১:৩০ PM', 'description' => '(লাঞ্চ) ও মিলনমেলা'],
    ['time' => '১:৩০ PM', 'title' => 'ব্যাচভিত্তিক ছবি তোলা', 'end' => '২:৩০ PM', 'description' => 'বন্ধুদের সাথে মুক্ত আড্ডা'],
    ['time' => '২:৩০ PM', 'title' => '"আমাদের গল্প"', 'end' => '৩:৩০ PM', 'description' => 'ভিডিও প্রদর্শনী / পুরোনো ছবির স্মৃতি প্রদর্শনী'],
    ['time' => '৩:৩০ PM', 'title' => 'গেমস ও কুইজ পর্ব', 'end' => '৪:৩০PM', 'description' => 'শিক্ষক-শিক্ষার্থী বনাম প্রাক্তন শিক্ষার্থী'],
    ['time' => '৪:৩০ PM', 'title' => 'বিকালের চা ও হালকা নাস্তা', 'end' => '৫:০০PM', 'description' => ''],
    ['time' => '৫:০০ PM', 'title' => 'সাংস্কৃতিক অনুষ্ঠান পর্ব-২', 'end' => '৬:৩০PM', 'description' => 'আলোচনার মাধ্যমে সিদ্ধান্ত'],
    ['time' => '৬:৩০PM', 'title' => 'স্মারক ও ক্রেস্ট প্রদান', 'end' => '৭:০০PM', 'description' => 'ধন্যবাদ বক্তব্য'],
    ['time' => '৭:০০PM', 'title' => 'বিদায়ী মুহূর্ত', 'end' => '৮:০০PM', 'description' => '"আবার দেখা হবে"'],
];
@endphp

@foreach($events as $event)
<div class="timeline-item">
    <div class="timeline-dot"></div>
    <div class="schedule-item">
        <div class="flex justify-between items-start mb-3">
            <div>
                <span class="text-sm text-purple-600 font-semibold">{{ $event['time'] }}</span>
                <h3 class="text-lg font-bold text-gray-900">{{ $event['title'] }}</h3>
            </div>
            <span class="text-xs text-gray-500">{{ $event['end'] }}</span>
        </div>
        @if($event['description'])
        <p class="text-gray-600 text-sm">{{ $event['description'] }}</p>
        @endif
    </div>
</div>
@endforeach
