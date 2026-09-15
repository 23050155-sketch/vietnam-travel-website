<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('places', function (Blueprint $table) {
            $table->id('place_id');

            $table->unsignedBigInteger('province_id');

            $table->string('name', 180);
            $table->string('slug', 220)->unique();

            $table->string('short_description', 500)->nullable();
            $table->text('description')->nullable();

            $table->string('cover_image', 255)->nullable();
            $table->string('address', 500)->nullable();

            $table->decimal('ticket_price', 12, 2)->default(0);

            $table->time('open_time')->nullable();
            $table->time('close_time')->nullable();

            $table->smallInteger('visit_duration_min')->default(120);

            $table->enum('best_time', [
                'morning',
                'afternoon',
                'evening',
                'any'
            ])->default('any');

            $table->string('best_months', 100)->nullable();

            $table->text('notes')->nullable();
            $table->text('activities')->nullable();

            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();

            $table->integer('view_count')->default(0);

            $table->boolean('is_featured')->default(false);

            $table->enum('status', [
                'active',
                'hidden'
            ])->default('active');

            $table->timestamps();

            $table->foreign('province_id')
                  ->references('province_id')
                  ->on('provinces')
                  ->restrictOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('places');
    }
};