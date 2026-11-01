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
        Schema::create('PerformerInfo', function (Blueprint $table) {
            $table->id('PerformerId');
            $table->string('PerformerName', 150);
            $table->string('PerformanceType', 100);
            $table->text('PerformanceDescription');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PerformerInfo');
    }
};
