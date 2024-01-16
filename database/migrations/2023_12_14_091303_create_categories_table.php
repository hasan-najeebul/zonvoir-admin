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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('category_image')->nullable();
            $table->integer('parent')->default(0);
            $table->unsignedBigInteger('project_manager_id');
            $table->timestamps();
            $table->foreign('project_manager_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         // Drop the foreign key
        Schema::table('categories', function (Blueprint $table) {
            $table->dropForeign('categories_project_manager_id_foreign');
        });
        Schema::dropIfExists('categories');

    }
};
