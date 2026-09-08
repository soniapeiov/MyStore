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
            $table->string('sku', 20);
            $table->string('name');
            $table->mediumText('description')->nullable();
            $table->string('barcode', 20)->nullable();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->double('price');
            $table->double('sale_price')->nullable();
            $table->boolean('sale')->default(false);
            $table->double('stock')->default(0);
            $table->double('weight')->nullable();
            $table->foreignId('color_id')->constrained()->cascadeOnDelete();
            $table->foreignId('size_id')->constrained()->cascadeOnDelete();
            $table->double('width')->nullable();
            $table->double('height')->nullable();
            $table->double('length')->nullable();
            $table->double('vat')->nullable();
            $table->foreignId('brand_id')->constrained()->cascadeOnDelete();
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
