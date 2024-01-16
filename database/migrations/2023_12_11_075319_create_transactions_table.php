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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('affiliate_user_id')->nullable();
            $table->string('description');
            $table->decimal('amount', 10, 2);
            $table->string('invoice_id')->nullable();
            $table->enum('payment_mode',['Bank trasnfer','Blik','Manual','Other']);
            $table->date('date_recorded');
            $table->string('note')->nullable();
            $table->string('transaction_id');
            $table->timestamps();
            $table->foreign('affiliate_user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
