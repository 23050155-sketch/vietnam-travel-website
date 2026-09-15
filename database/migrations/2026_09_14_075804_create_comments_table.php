<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id('comment_id');

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('place_id');

            $table->unsignedBigInteger('parent_comment_id')->nullable();

            $table->text('content');

            $table->timestamps();

            $table->foreign('user_id')
                  ->references('user_id')
                  ->on('users')
                  ->cascadeOnDelete();

            $table->foreign('place_id')
                  ->references('place_id')
                  ->on('places')
                  ->cascadeOnDelete();

            $table->foreign('parent_comment_id')
                  ->references('comment_id')
                  ->on('comments')
                  ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};