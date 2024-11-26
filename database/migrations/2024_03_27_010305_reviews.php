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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('approved_accommodations_id');
            $table->string('user_name');
            $table->string('user_email');
            $table->text('comment');
            $table->unsignedTinyInteger('cleanliness')->default(10);
            $table->unsignedTinyInteger('accessibility')->default(10);
            $table->unsignedTinyInteger('location')->default(10); 
            $table->unsignedTinyInteger('value_for_money')->default(10);
            $table->unsignedTinyInteger('staff')->default(10);
            $table->timestamps();
        
            $table->foreign('approved_accommodations_id')->references('id')->on('approved_accommodations')->onDelete('cascade'); 
        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
