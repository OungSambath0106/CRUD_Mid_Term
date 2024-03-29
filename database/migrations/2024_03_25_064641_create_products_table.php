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
            $table -> id();
            $table -> string('name', 100);
            $table -> longText('description') -> nullable();
            $table -> unsignedBigInteger("categories_id") -> nullable();
            $table -> foreign("categories_id") -> references('id') -> on('categories') -> noActionOnDelete();
            $table -> decimal('price') -> nullable();
            $table -> int('quantity') -> nullable();
            $table -> dateTime('expired_date') -> nullable();
            $table -> text("image", 200) -> nullable();
            $table -> timestamps();
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
