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
        Schema::create('milks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cattle_id')->constrained()->cascadeOnDelete();
            $table->date('date');
            $table->string('shift');
            $table->integer('quantity');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('milks');
    }
};
