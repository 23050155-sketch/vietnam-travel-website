<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('category_place', function (Blueprint $table) {
            $table->id('category_place_id');

            $table->unsignedBigInteger('place_id');
            $table->unsignedBigInteger('category_id');

            $table->foreign('place_id')
                  ->references('place_id')
                  ->on('places')
                  ->cascadeOnDelete();

            $table->foreign('category_id')
                  ->references('category_id')
                  ->on('categories')
                  ->cascadeOnDelete();

            $table->unique(['place_id', 'category_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('category_place');
    }
};