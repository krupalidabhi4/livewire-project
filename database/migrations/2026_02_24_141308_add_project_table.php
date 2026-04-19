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

            // Relationships
            $table->foreignId('category_id')->constrained('project_categories');
            $table->foreignId('sub_category_id')->constrained('sub_categories');
            $table->string('country_id')->nullable(); // FK if countries table exists

            // Basic Info
            $table->string('name_en');
            $table->string('contractor');
            $table->decimal('contractor_amount', 15, 2);
            $table->decimal('cost', 15, 2);
            $table->unsignedInteger('quantity')->default(1);
            $table->string('project_type');          // enum: building, road, etc.

            // Status Flags
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->boolean('is_bank_detail')->default(false);
            $table->text('bank_details')->nullable();

            // Display Platforms (JSON array)
            $table->json('display_on')->nullable(); // ['website','app','cs','kiosk']

            // Descriptions
            $table->longText('description_en')->nullable();

            // Media
            $table->string('image')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            //
        });
    }
};
