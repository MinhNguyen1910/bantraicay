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
        Schema::create('banners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100)->unique();
            $table->string('link', 100)->nullable();
            $table->string('image', 200)->nullable();
            $table->string('position', 200)->nullable();
            $table->tinyInteger('prioty', false)->default(0);
            $table->text('description')->nullable();
            $table->tinyInteger('status', false)->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banner');
    }
};
