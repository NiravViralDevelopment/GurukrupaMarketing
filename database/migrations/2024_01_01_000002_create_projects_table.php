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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug', 191)->unique();
            $table->text('description');
            $table->text('short_description')->nullable();
            $table->enum('category', ['new_launch', 'ongoing', 'completed'])->default('new_launch');
            $table->string('location');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('area')->nullable();
            $table->decimal('price', 15, 2)->nullable();
            $table->json('features')->nullable();
            $table->decimal('map_lat', 10, 8)->nullable();
            $table->decimal('map_lng', 11, 8)->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
