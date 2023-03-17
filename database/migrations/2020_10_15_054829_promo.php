<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\Schema;

class Promo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('promo', function (Blueprint $table) {
           $table->bigIncrements('id');
            $table->string('promo_name');
            $table->string('promo_code');
            $table->string('promo_price');
            $table->string('promo_type');
            $table->string('max_user');
            $table->string('min_amount');
            $table->string('upto_amount');
            $table->string('image')->nullable();
            $table->string('image_path')->nullable();
            $table->string('description');
            $table->boolean('status')->default('1');
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
        //
    }
}
