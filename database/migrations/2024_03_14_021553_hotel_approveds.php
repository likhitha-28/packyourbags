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
        Schema::create('hotel_approveds', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('adress');
            $table->string('city');
            $table->string('area');
            $table->string('distance');
            $table->string('property_type');
            $table->string('telephone');
            $table->integer('number_of_rooms');
            $table->string('place_type');
            $table->boolean('resto')->nullable()->default(false);
            $table->boolean('breakfast')->nullable()->default(false);
            $table->boolean('pool')->nullable()->default(false);
            $table->string('star')->default('3');
            $table->string('bed_types')->default('single');
            $table->boolean('chain')->nullable()->default(false);
            $table->boolean('cancle')->nullable()->default(false);
            $table->integer('price');
            $table->rememberToken();
            $table->timestamps();
    });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};