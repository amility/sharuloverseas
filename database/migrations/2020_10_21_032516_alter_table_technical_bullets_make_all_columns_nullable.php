<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableTechnicalBulletsMakeAllColumnsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('technical_bullets', function(Blueprint $table) {
            $table->text('technical_bullets1')->nullable()->change();
            $table->text('technical_bullets2')->nullable()->change();
            $table->text('technical_bullets3')->nullable()->change();
            $table->text('technical_bullets4')->nullable()->change();
            $table->text('technical_bullets5')->nullable()->change();
            $table->text('technical_bullets6')->nullable()->change();
            $table->text('technical_bullets7')->nullable()->change();
            $table->text('technical_bullets8')->nullable()->change();
            $table->text('technical_bullets9')->nullable()->change();
            $table->text('technical_bullets10')->nullable()->change();
            $table->text('technical_bullets11')->nullable()->change();
            $table->text('technical_bullets12')->nullable()->change();
            $table->text('technical_bullets13')->nullable()->change();
            $table->text('technical_bullets14')->nullable()->change();
            $table->text('technical_bullets15')->nullable()->change();
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
