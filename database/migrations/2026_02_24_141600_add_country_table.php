<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('country', function (Blueprint $table) {
            $table->id();
            $table->string('iso', 2)->nullable();
            $table->string('english_name', 100)->nullable();
            $table->string('nicename', 100)->nullable();
            $table->string('iso3', 3)->nullable();
            $table->smallInteger('numcode')->nullable();
            $table->integer('phonecode')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('country');
    }
};
