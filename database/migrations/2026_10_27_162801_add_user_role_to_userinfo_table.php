<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('userinfo', function (Blueprint $table) {
            $table->string('UserRole', 20)->default('user');
        });
    }

    public function down(): void
    {
        Schema::table('userinfo', function (Blueprint $table) {
            $table->dropColumn('UserRole');
        });
    }
};