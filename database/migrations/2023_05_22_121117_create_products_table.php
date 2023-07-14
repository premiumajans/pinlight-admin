<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->unsigned();
            $table->longText('photo')->nullable();
            $table->longText('catalog_pdf')->nullable();
            $table->longText('keywords')->nullable();
            $table->longText('alternative')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
