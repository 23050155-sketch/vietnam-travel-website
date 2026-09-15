<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('itinerary_details', function (Blueprint $table) {
            $table->id('itinerary_detail_id');

            $table->unsignedBigInteger('itinerary_id');
            $table->unsignedBigInteger('place_id');

            $table->date('visit_date')->nullable();
            $table->time('visit_time')->nullable();

            $table->integer('order_number')->nullable();
            $table->text('note')->nullable();

            $table->foreign('itinerary_id')
                  ->references('itinerary_id')
                  ->on('itineraries')
                  ->cascadeOnDelete();

            $table->foreign('place_id')
                  ->references('place_id')
                  ->on('places')
                  ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('itinerary_details');
    }
};