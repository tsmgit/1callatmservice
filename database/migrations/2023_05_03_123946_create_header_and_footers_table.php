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
        Schema::create('header_and_footers', function (Blueprint $table) {
            $table->id();
            $table->string('header_logo');
            $table->string('footer_logo');
            $table->string('fb_link');
            $table->string('twitter_link');
            $table->string('linkedin_link');
            $table->string('youtube_link');
            $table->string('mail');
            $table->string('phone');
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
        Schema::dropIfExists('header_and_footers');
    }
};
