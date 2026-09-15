<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('comment_media', function (Blueprint $table) {
            $table->id('comment_media_id');

            $table->unsignedBigInteger('comment_id');

            $table->string('media_type', 20);
            $table->string('media_path', 255);

            $table->unsignedBigInteger('file_size')->nullable();
            $table->smallInteger('sort_order')->default(0);

            $table->timestamp('created_at')->nullable();

            $table->foreign('comment_id')
                  ->references('comment_id')
                  ->on('comments')
                  ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('comment_media');
    }
};