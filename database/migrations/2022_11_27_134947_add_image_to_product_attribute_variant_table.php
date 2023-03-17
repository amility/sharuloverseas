<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageToProductAttributeVariantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_attribute_variant', function (Blueprint $table) {
                $table->string('front_image')->nullable();
                $table->string('back_image')->nullable();
                $table->string('left_image')->nullable();
                $table->string('right_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_attribute_variant', function (Blueprint $table) {
            $table->dropColumn('front_image');
            $table->dropColumn('back_image');
            $table->dropColumn('right_image');
            $table->dropColumn('light_image');
        });
    }
}
