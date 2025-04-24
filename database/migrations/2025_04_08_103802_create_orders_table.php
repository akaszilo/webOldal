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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->decimal('total', 8, 2);
            $table->string('status')->default('pending');
            $table->integer('orderId');
            $table->integer('postCode');
            $table->string('city');
            $table->string('street');
            $table->string('houseNumber');
            $table->string('note');
            $table->foreignId('user_id');
            $table->foreignId('cart_id');
            $table->foreignId('product_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
