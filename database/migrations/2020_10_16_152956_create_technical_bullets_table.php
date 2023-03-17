<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechnicalBulletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('technical_bullets', function (Blueprint $table) {
            $table->id();
            
             $table->text('technical_bullets1');
             $table->text('technical_bullets2');
             $table->text('technical_bullets3');
             $table->text('technical_bullets4');
             $table->text('technical_bullets5');
             $table->text('technical_bullets6');
             $table->text('technical_bullets7');
             $table->text('technical_bullets8');
             $table->text('technical_bullets9');
             $table->text('technical_bullets10');
             $table->text('technical_bullets11');
             $table->text('technical_bullets12');
             $table->text('technical_bullets13');
             $table->text('technical_bullets14');
             $table->text('technical_bullets15');
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
        Schema::dropIfExists('technical_bullets');
    }
}
