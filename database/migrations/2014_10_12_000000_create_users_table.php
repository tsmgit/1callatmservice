<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('u_type');
            $table->string('name');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->text('address');
            $table->text('message');
            $table->string('image')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('status')->comment("1 = active, 0 = inactive");
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
