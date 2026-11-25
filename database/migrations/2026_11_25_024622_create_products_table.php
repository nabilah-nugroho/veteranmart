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
        $table->foreignId('seller_id')->constrained('users')->cascadeOnDelete();
        $table->foreignId('category_id')->constrained('categories')->restrictOnDelete();
        $table->string('title');
        $table->string('slug')->unique();
        $table->text('description')->nullable();
        $table->unsignedBigInteger('price');
        $table->unsignedInteger('stock')->default(1);
        $table->string('condition')->default('bekas');   // baru | bekas
        $table->string('status')->default('aktif')->index(); // aktif | terjual | disembunyikan
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('products');
}

};
