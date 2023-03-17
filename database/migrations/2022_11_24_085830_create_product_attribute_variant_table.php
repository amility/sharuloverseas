<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAttributeVariantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attribute_variant', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id')->index()->nullable();
            $table->unsignedBigInteger('product_variation_id')->index()->nullable();          
            $table->unsignedBigInteger('attribute_id')->index()->nullable();
            $table->unsignedBigInteger('attibute_value_id')->index()->nullable();  
            $table->string('value');
            $table->foreign('product_id')->references('id')->on('products'); 
            $table->foreign('product_variation_id')->references('id')->on('product_variation'); 
            $table->foreign('attribute_id')->references('id')->on('attribute');        

            $table->foreign('attibute_value_id')->references('id')->on('attribute_value');   
       
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
        Schema::dropIfExists('product_attribute_variant');
    }
}
