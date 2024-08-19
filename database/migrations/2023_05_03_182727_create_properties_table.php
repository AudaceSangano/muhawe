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
        Schema::create('properties', function (Blueprint $table) {
            $table->id('pro_id'); 
            $table->unsignedBigInteger('pro_owner'); 
            $table->string('pro_price');
            $table->string('pro_furniture');
            $table->date('pro_building_date'); 
            $table->text('pro_details');
            $table->text('pro_price_comment')->nullable();
            $table->enum('pro_price_status', ['proposed', 'rejected', 'confirmed', 'appeal']); 
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->foreign('pro_owner')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
