<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('place_images', function (Blueprint $table) {
            $table->id('place_image_id');

            $table->unsignedBigInteger('place_id');

            $table->string('image_path', 255);
            $table->string('caption', 255)->nullable();

            $table->smallInteger('sort_order')->default(0);

            $table->timestamps();

            $table->foreign('place_id')
                  ->references('place_id')
                  ->on('places')
                  ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('place_images');
    }
};