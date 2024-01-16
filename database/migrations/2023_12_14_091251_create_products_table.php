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
            $table->text('description');
            $table->decimal('points', 8, 2)->comment('price');
            $table->integer('quantity');
            $table->decimal('weight')->nullable();
            $table->string('sku')->nullable();
            $table->string('barcode')->nullable();
            $table->enum('backorder', ['0','1'])->default(0);
            $table->enum('status', ['active','inactive','draft','deleted'])->default('active');
            $table->unsignedBigInteger('created_by');
            $table->timestamps();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
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
