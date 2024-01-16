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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('store_id');
            $table->unsignedBigInteger('card_id')->nullable();
            $table->unsignedBigInteger('coupon_id')->nullable();
            $table->dateTime('order_date')->timestamps();
            $table->float('order_total')->nullable();
            $table->enum('status',['completed','failed','cancelled','processing','pending']);
            $table->enum('order_type',['online','store'])->default('online');
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('orders_customer_id_foreign');
            $table->dropColumn('customer_id');
            $table->dropForeign('orders_store_id_foreign');
            $table->dropColumn('store_id');
        });
        Schema::dropIfExists('orders');
    }
};
