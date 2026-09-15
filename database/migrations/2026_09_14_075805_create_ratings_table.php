<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id('rating_id');

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('place_id');

            $table->unsignedTinyInteger('rating');

            $table->timestamps();

            $table->foreign('user_id')
                  ->references('user_id')
                  ->on('users')
                  ->cascadeOnDelete();

            $table->foreign('place_id')
                  ->references('place_id')
                  ->on('places')
                  ->cascadeOnDelete();

            $table->unique(['user_id', 'place_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};