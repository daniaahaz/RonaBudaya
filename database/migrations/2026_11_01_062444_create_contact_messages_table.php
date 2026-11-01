<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id('ContactId');
            $table->unsignedBigInteger('UserId');
            $table->string('ContactName');
            $table->string('ContactEmail');
            $table->string('ContactSubject');
            $table->text('ContactMessage');
            $table->timestamps();

            $table->foreign('UserId')
                  ->references('UserId')
                  ->on('userinfo')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_messages');
    }
};