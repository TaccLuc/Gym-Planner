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
        Schema::create('exercises', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sets')->nullable();
            $table->string('reps')->nullable();
            $table->decimal('percentage', 4, 1)->nullable();
            $table->decimal('weight', 4, 1)->nullable();
            $table->unsignedBigInteger('day_id');
            $table->foreign('day_id')
                    ->references('id')
                    ->on('days')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercises');
    }
};
