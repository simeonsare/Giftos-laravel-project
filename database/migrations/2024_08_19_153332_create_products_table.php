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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->string('price')->nullable();
            $table->string('category')->nullable();
            $table->string('quantity')->nullable();
            $table->string('version')->nullable();
            $table->string('size')->nullable();
            $table->string('delivery')->nullable();
            $table->string('delivery_m')->nullable();
            $table->string('year')->nullable();
            $table->string('gallery_1')->nullable();
            $table->string('gallery_2')->nullable();

            $table->string('gallery_3')->nullable();

            $table->string('gallery_4')->nullable();

            $table->string('gallery_5')->nullable();

            $table->string('gallery_6')->nullable();

            $table->string('gallery_7')->nullable();

            $table->string('gallery_8')->nullable();



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
