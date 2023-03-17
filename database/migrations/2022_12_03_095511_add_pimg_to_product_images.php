<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPimgToProductImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_images', function (Blueprint $table) {
            $table->unsignedBigInteger('varientid')->index()->nullable();
            $table->integer('isCustom_Image')->nullable();
            $table->integer('ViewTypeId')->nullable();
            $table->foreign('varientid')->references('id')->on('product_attribute_variant'); 
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_images', function (Blueprint $table) {
            $table->dropColumn('varientid');
            $table->dropColumn('isCustom_Image');
            $table->dropColumn('ViewTypeId');
        });
    }
}
