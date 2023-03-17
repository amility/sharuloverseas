<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSalesPriceToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->float('mrp_price',10,2)->default('0');
            $table->string('front_image')->nullable();
            $table->string('back_image')->nullable();
            $table->string('left_image')->nullable();
            $table->string('right_image')->nullable();
            $table->integer('custom_product')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('mrp_price');
            $table->dropColumn('front_image');
            $table->dropColumn('back_image');
            $table->dropColumn('left_image');
            $table->dropColumn('right_image');
            $table->dropColumn('custom_product');

        });
    }
}
