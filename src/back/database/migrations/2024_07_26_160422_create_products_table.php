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
            $table->unsignedInteger('count');
            $table->string('source');
            $table->unsignedInteger('laser')->nullable();
            $table->unsignedInteger('welding')->nullable();
            $table->unsignedInteger('assembling')->nullable();
            $table->unsignedInteger('electro')->nullable();

            $table->unsignedInteger('position');

            $table->unsignedBigInteger('product_id')->nullable();
            $table->index('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

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
