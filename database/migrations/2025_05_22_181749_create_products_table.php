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
            $table->integer('sort');
            $table->string('title');
            $table->string('sku')->unique();
            $table->string('thumbnail');
            $table->string('slug')->unique();
            $table->decimal('regular_price', 10, 2);
            $table->decimal('sale_price', 10, 2)->nullable();
            $table->decimal('buy_price', 10, 2)->nullable();
            $table->string('short_description');
            $table->longText('long_description');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->json('images');
            $table->decimal('stock', 10, 2);
            $table->decimal('discount', 5, 2)->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();

            // Indexes
            $table->index('active');
            $table->index('category_id');

            // Foreign key
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('set null'); // optional, but helps avoid integrity issues
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
