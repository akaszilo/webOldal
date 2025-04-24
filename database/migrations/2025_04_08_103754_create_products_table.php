<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->integer("price");
            $table->string("image_link");
            $table->string("description", 500);
            $table->integer("rating");
            $table->integer("sold_quantity")->default(0);
            $table->integer("instock");
            $table->text("ingredients");
            $table->text("howtouse");
            $table->foreignId('brand_id')->constrained('brands', 'id');
            $table->foreignId('category_id')->constrained('categories', 'id'); 
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */ 

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['brand_id']);
            $table->dropColumn('brand_id');
        });
    }

};
