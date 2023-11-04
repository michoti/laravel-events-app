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
        Schema::create('events', function (Blueprint $table) {
            $table->id();            
            $table->string('image');
            $table->string('public_id');
            $table->string('name');
            $table->string('venue');
            $table->mediumText('description');
            $table->string('actors')->nullable();
            $table->string('time');
            $table->string('date');
            $table->string('age');
            $table->string('dresscode')->nullable();
            $table->tinyInteger('status')->default('0');
            $table->string('quantity');
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
