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
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('heading');
            $table->string('title');
            $table->string('description');
            $table->string('button_url');
            $table->string('about_heading');
            $table->string('about_title');
            $table->text('about_desc');
            $table->string('about_button_url');
            $table->string('about_image');
            $table->string('service_heading');
            $table->text('service_desc');
            $table->string('meta_title')->nullable();
            $table->string('meta_desc')->nullable();
            $table->string('meta_keyword')->nullable();
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
        Schema::dropIfExists('homes');
    }
};
