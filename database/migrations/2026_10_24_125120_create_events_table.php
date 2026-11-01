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
        Schema::create('Events', function (Blueprint $table) {
            $table->id('EventId');
            $table->string('EventName', 150);
            $table->string('LocationName', 150);
            $table->string('LocationState', 100);
            $table->string('LocationAddress', 255);
            $table->unsignedBigInteger('PerformerId');
            $table->date('EventDate');
            $table->time('EventTime');
            $table->text('EventDescription');
            $table->timestamps();

            $table->foreign('PerformerId')
                ->references('PerformerId')
                ->on('PerformerInfo')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Events');
    }
};
