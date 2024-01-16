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
        Schema::create('proformas', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('sent')->default(0);
            $table->datetime('datesend')->nullable();
            $table->unsignedBigInteger('partner_id')->nullable();
            $table->date('date')->timestamps();
            $table->tinyInteger('number')->nullable();
            $table->string('prefix')->nullable();
            $table->date('expirydate')->nullable();
            $table->decimal('subtotal',15,2);
            $table->decimal('total',15,2);
            $table->decimal('adjustment',15,2)->nullable();
            $table->decimal('discount_percent',15,2)->default(0.00);
            $table->decimal('discount_total',15,2)->default(0.00);
            $table->string('discount_type',15,2)->nullable();
            $table->enum('status',['accepted','pending'])->default('pending');
            $table->unsignedBigInteger('invoice_id')->nullable();
            $table->datetime('invoiced_date')->nullable();
            $table->string('partner_usertnote')->nullable();
            $table->unsignedBigInteger('affiliate_id')->nullable();
            $table->string('admintnote')->nullable();
            $table->tinyInteger('is_expiry_notified')->default(0);
            $table->string('acceptance_firstname')->nullable();
            $table->string('acceptance_email')->nullable();
            $table->datetime('acceptance_date')->nullable();
            $table->string('acceptance_ip')->nullable();
            $table->string('signature')->nullable();
            $table->timestamps();
            $table->foreign('partner_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('affiliate_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('cascade');
        });
    }
/* `is_expiry_notified` int(11) NOT NULL DEFAULT 0,
`acceptance_firstname` varchar(50) DEFAULT NULL,
`acceptance_lastname` varchar(50) DEFAULT NULL,
`acceptance_email` varchar(100) DEFAULT NULL,
`acceptance_date` datetime DEFAULT NULL,
`acceptance_ip` varchar(40) DEFAULT NULL,
`signature` varchar(40) DEFAULT NULL,*/
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proformas');
    }
};
