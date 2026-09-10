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
        Schema::create('view_history', function (Blueprint $table) {
    $table->id('view_id');

    $table->unsignedBigInteger('user_id')->nullable();
    $table->unsignedBigInteger('destination_id');

    $table->timestamp('viewed_at')->useCurrent();

    $table->foreign('user_id')
          ->references('user_id')
          ->on('users')
          ->nullOnDelete();

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
        Schema::dropIfExists('view_history');
    }
};
