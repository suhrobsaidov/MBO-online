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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('time')->default('9:00,10:35,13:45,15:20,16:55,15:30');
            $table->string('place')->default('main');
            $table->string('birthdate')->default('00.00.00');
            $table->string('cource')->default('english');
            $table->string('phone')->unique();
            $table->string('usertype')->default('user');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
