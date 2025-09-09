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
    Schema::create('toga_products', function (Blueprint $table) {
    $table->id();
    $table->string('name'); // Nama produk
    $table->string('image')->nullable(); // Gambar produk
    $table->text('description'); // Deskripsi produk
    $table->decimal('price', 12, 2); // Harga produk
    $table->string('shopee_link')->nullable(); // Link Shopee
    $table->timestamps();
});

}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('toga_products');
    }
};
