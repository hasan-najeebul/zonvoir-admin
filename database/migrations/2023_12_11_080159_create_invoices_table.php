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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('sent')->default(0);
            $table->date('datesend')->nullable();
            $table->unsignedBigInteger('partner_id')->nullable();
            $table->date('date')->timestamps();
            $table->tinyInteger('number')->nullable();
            $table->string('prefix')->nullable();
            $table->date('duedate')->nullable();
            $table->decimal('subtotal',15,2);
            $table->decimal('total',15,2);
            $table->decimal('adjustment',15,2)->nullable();
            $table->decimal('discount_percent',15,2)->default(0.00);
            $table->decimal('discount_total',15,2)->default(0.00);
            $table->string('discount_type',15,2)->nullable();
            $table->enum('status',['paid','unpaid'])->default('unpaid');
            $table->string('partner_usertnote')->nullable();
            $table->string('admintnote')->nullable();
            $table->unsignedBigInteger('affiliate_id')->nullable();
            $table->unsignedBigInteger('subscription_id')->default(0);
            $table->timestamps();
            $table->foreign('partner_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('affiliate_user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('subscription_id')->references('id')->on('subscriptions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
