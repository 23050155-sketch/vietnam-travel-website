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
        Schema::create('itinerary_details', function (Blueprint $table) {
    $table->id('detail_id');

    $table->unsignedBigInteger('itinerary_id');
    $table->unsignedBigInteger('destination_id');

    $table->date('visit_date')->nullable();
    $table->time('visit_time')->nullable();
    $table->integer('order_number')->nullable();
    $table->text('note')->nullable();

    $table->timestamps();

    $table->foreign('itinerary_id')
          ->references('itinerary_id')
          ->on('itineraries')
          ->cascadeOnDelete();

    $table->foreign('destination_id')
          ->references('destination_id')
          ->on('destinations')
          ->cascadeOnDelete();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itinerary_details');
    }
};
