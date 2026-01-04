<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('batch');
            $table->string('father_name');
            $table->string('blood')->nullable();
            $table->string('photo')->nullable();
            $table->string('screenshot')->nullable();
            $table->string('tshirt')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('profession')->nullable();
            $table->string('present_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->enum('registration_type', ['single', 'group']);
            $table->integer('participant_count')->nullable();
            $table->string('payment_mode', 15)->nullable();
            $table->string('sent_from', 30)->nullable();
            $table->string('sent_to', 30)->nullable();
            $table->decimal('amount', 10, 2);
            $table->string('ref_code')->nullable();
            $table->enum('status', ['pending', 'active', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
