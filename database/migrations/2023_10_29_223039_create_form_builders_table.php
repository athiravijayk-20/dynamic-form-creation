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
        Schema::create('form_builders', function (Blueprint $table) {
            $table->id();
              $table->foreignId('country_id')->nullable(false)->constrained('countries')->onDelete('cascade');
            $table->string('name');
            $table->JSON('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_builders');
    }
};
