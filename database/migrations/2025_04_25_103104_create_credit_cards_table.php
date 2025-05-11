<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('credit_cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('card_number', 16)->unique();
            $table->string('name');
            $table->unsignedTinyInteger('expiry_month');
            $table->unsignedInteger('expiry_year');
            $table->string('cvv', 3);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('credit_cards');
    }
};
