<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannerImagesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner_images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('app_type')->nullable();
            $table->string('name')->nullable();
            $table->string('image_path');
            $table->text('title')->nullable();
            $table->text('description')->nullable();
            $table->string('alt_name')->nullable();
            $table->tinyInteger('preference')->unique();
            $table->enum('is_active', ['0', '1'])->default('1');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('banner_images');
    }
}
