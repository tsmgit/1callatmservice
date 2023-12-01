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
        Schema::create('product_request_quotes', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('company');
            $table->string('email');
            $table->string('rma_no');
            $table->string('address');
            $table->string('phone');
            $table->string('message');
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
        Schema::dropIfExists('product_request_quotes');
    }
};
