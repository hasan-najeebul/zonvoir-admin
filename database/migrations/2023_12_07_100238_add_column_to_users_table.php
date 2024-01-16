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
        Schema::table('users', function (Blueprint $table) {
            $table->enum('status', ['active', 'pending', 'deleted', 'block'])->default('pending')->after('remember_token');
            $table->string('mobile_number')->nullable()->after('email');
            $table->unsignedBigInteger('partner_id')->nullable()->after('status');
            $table->unsignedBigInteger('affiliate_user_id')->nullable()->after('partner_id');
            $table->foreign('partner_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('affiliate_user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('mobile_number');
        });
    }
};
