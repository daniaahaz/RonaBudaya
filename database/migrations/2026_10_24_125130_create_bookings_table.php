<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Booking', function (Blueprint $table) {
            $table->id('BookingId');
            $table->unsignedBigInteger('UserId');
            $table->unsignedBigInteger('EventId');
            $table->date('BookingDate');
            $table->unsignedInteger('BookingNumOfTicket');
            $table->string('BookingStatus', 50)->default('Pending');
            $table->dateTime('BookingCreatedTime')->nullable();
            $table->dateTime('BookingStatusTime')->nullable();
            $table->timestamps();

            $table->foreign('UserId')
                ->references('UserId')
                ->on('userInfo')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreign('EventId')
                ->references('EventId')
                ->on('Events')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Booking');
    }
};
