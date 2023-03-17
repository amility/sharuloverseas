<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id')->index()->nullable();
            $table->unsignedBigInteger('sub_category_id')->index()->nullable();
            $table->unsignedBigInteger('brand_id')->index()->nullable();
            $table->string('prod_sku')->nullable();
            $table->string('prod_name');
            $table->string('prod_slug');
            $table->integer('prod_price');
            $table->integer('total_stock');
            $table->text('prod_description')->nullable();
            $table->text('prod_details')->nullable();
            $table->text('prod_specification')->nullable();
            $table->string('image')->nullable();
            $table->string('prod_pdf')->nullable();
            $table->string('prod_video_url')->nullable();
            $table->enum('is_active', ['0', '1'])->default('1');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('sub_category_id')->references('id')->on('categories');
            $table->foreign('brand_id')->references('id')->on('brands');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
