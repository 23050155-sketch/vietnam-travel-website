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
       Schema::create('destinations', function (Blueprint $table) {
    $table->id('destination_id');

    $table->unsignedBigInteger('province_id');

    $table->string('destination_name', 150);
    $table->string('address')->nullable();
    $table->text('description')->nullable();
    $table->string('image')->nullable();
    $table->string('opening_hours')->nullable();
    $table->decimal('ticket_price', 12, 2)->nullable();

    $table->timestamps();

    $table->foreign('province_id')
          ->references('province_id')
          ->on('provinces')
          ->cascadeOnUpdate()
          ->restrictOnDelete();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinations');
    }
};
