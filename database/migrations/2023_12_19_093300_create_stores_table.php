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
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('number');
            $table->string('street');
            $table->string('town');
            $table->string('postal_code');
            $table->string('mobile_number')->nullable();
            $table->text('description')->nullable();
            $table->text('logo')->nullable();
            $table->unsignedBigInteger('partner_id');
            $table->enum('status',['active','inactive'])->default('inactive');
            $table->timestamps();
            $table->foreign('partner_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stores', function (Blueprint $table) {
            $table->dropForeign('stores_partner_id_foreign');
        });
        Schema::dropIfExists('stores');
    }
};
