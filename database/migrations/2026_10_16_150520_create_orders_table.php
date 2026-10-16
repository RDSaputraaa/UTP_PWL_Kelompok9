<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('menu_id')->constrained('menus')->onDelete('cascade');
           $table->enum('status', ['masuk', 'diproses', 'selesai'])->default('masuk');
            $table->timestamps();
        });
    }

 
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};