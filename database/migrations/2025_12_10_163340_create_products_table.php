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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->string('size')->nullable(); // e.g., "50ml", "100ml"
            $table->string('type')->nullable(); // e.g., "Eau de Parfum", "Eau de Toilette"
            $table->text('top_notes')->nullable();
            $table->text('heart_notes')->nullable();
            $table->text('base_notes')->nullable();
            $table->string('category')->nullable(); // e.g., "Fresh", "Woody", "Floral", "Oriental"
            $table->text('longevity')->nullable();
            $table->text('sillage')->nullable();
            $table->text('best_for')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('products');
    }
};
