<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pricings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('description');
            $table->string('tag');
            $table->string('amount');
            $table->string('currency');
            $table->string('duration');
            $table->boolean('status');
            $table->integer('url_count')->default(0);
            $table->integer('priority')->default(3);
            $table->string('stripe_id')->nullable();
            $table->string('theme_color');
            $table->json('include')->nullable(); // Store array as JSON
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pricings');
    }
};
