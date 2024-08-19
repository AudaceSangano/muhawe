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
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id'); 
            $table->string('user_name');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('user_location')->nullable();
            $table->string('user_photo')->nullable();
            $table->string('user_telephone');
            $table->enum('user_status', ['active', 'locked']); 
            $table->enum('user_role', ['householder', 'Agent', 'systemRHA']); 
            $table->rememberToken();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        DB::table('users')->insert([
            'user_name' => 'administrator',
            'first_name' => 'admin',
            'last_name' => 'super',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'user_telephone' => '0783503691',
            'user_status' => 'active',
            'user_role' => 'systemRHA',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
