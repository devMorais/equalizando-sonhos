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
        Schema::create('tab_items', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_disabled')->default(false)->nullable();
            $table->string('title')->nullable();
            $table->text('image')->nullable();
            $table->text('description');
            $table->integer('category_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tab_items');
    }
};
