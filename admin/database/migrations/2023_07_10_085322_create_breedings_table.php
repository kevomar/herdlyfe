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
        Schema::create('breedings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cattle_id')->constrained()->cascadeOnDelete();
            $table->foreignId('sire_id')->constrained('cattle', 'id')->cascadeOnDelete();
            $table->date('date_of_breeding');
            $table->date('expected_date_of_delivery');
            $table->date('actual_date_of_delivery')->nullable();
            $table->foreignId('progeny')->nullable()->constrained('cattle', 'id')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('breedings');
    }
};
