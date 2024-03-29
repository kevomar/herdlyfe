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
        Schema::create('cattle', function (Blueprint $table) {
            $table->id();
            $table->foreignId('herd_id')->constrained()->cascadeOnDelete();
            $table->string('image')->nullable();
            $table->foreignId('breed_id')->constrained()->cascadeOnDelete();
            $table->string('cattle_name');
            $table->date('date_of_birth');
            $table->string('gender');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cattle');
    }
};
