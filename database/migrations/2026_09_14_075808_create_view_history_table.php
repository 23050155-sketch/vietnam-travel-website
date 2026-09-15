<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('view_history', function (Blueprint $table) {
            $table->id('view_history_id');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('place_id');

            $table->timestamp('viewed_at')->useCurrent();

            $table->foreign('user_id')
                  ->references('user_id')
                  ->on('users')
                  ->nullOnDelete();

            $table->foreign('place_id')
                  ->references('place_id')
                  ->on('places')
                  ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('view_history');
    }
};