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
        Schema::create('userInfo', function (Blueprint $table) {
            $table->id('UserId');
            $table->string('UserName', 100);
            $table->string('UserEmail', 255)->unique();
            $table->string('UserPassword', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userInfo');
    }
};
