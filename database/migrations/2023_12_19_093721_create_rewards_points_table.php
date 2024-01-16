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
        Schema::create('rewards_points', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->text('product_image')->nullable();
            $table->unsignedBigInteger('customer_id');
            $table->string('barcode')->nullable();
            $table->decimal('earn_point',10,2);
            $table->timestamp('expire_at')->nullable();
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rewards_points');
    }
};
