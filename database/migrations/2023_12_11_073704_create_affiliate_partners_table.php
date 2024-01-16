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
        Schema::create('affiliate_partners', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('partner_user_id');
            $table->unsignedBigInteger('affiliate_user_id');
            $table->decimal('affiliate_purchase_amount', 10, 2);
            $table->decimal('partner_commission_amount',10,2);
            $table->unsignedBigInteger('invoice_id')->nullable();
            $table->unsignedBigInteger('proforma_id')->nullable();
            $table->timestamps();
            $table->foreign('partner_user_id')->references('id')->on('affiliate_users')->onDelete('cascade');
            $table->foreign('affiliate_user_id')->references('id')->on('affiliate_users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affiliate_partners');
    }
};
