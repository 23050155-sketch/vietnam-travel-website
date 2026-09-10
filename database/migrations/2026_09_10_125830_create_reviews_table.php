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
       Schema::create('reviews', function (Blueprint $table) {
    $table->id('review_id');

    $table->unsignedBigInteger('user_id');
    $table->unsignedBigInteger('destination_id');

    $table->unsignedTinyInteger('rating');
    $table->text('comment')->nullable();
    $table->timestamps();

    $table->foreign('user_id')
          ->references('user_id')
          ->on('users')
          ->cascadeOnDelete();

    $table->foreign('destination_id')
          ->references('destination_id')
          ->on('destinations')
          ->cascadeOnDelete();

    $table->unique(['user_id', 'destination_id']);
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
