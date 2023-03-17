<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductVariationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_variation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id')->index()->nullable();          
            $table->string('sku')->nullable();
            $table->float('regular_price',10,2);
            $table->float('sale_price',10,2);
            $table->integer('qty');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->enum('is_active', ['0', '1'])->default('1');
            $table->foreign('product_id')->references('id')->on('products');        
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
        Schema::dropIfExists('product_variation');
    }
}
