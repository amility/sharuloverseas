<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;

class AddCountryIdColumnToCitiesTable extends Migration
{
    public function up()
    {
        Schema::table('cities', function (Blueprint $table) {
            if(!Schema::hasColumn('cities', 'country_id'))
                $table->integer('country_id')->nullable();
        });
    }

    public function down()
    {
        Schema::table('cities', function (Blueprint $table) {
            if(Schema::hasColumn($this->getTableName(), 'country_id'))
                $table->dropColumn('country_id');
        });
    }

    protected function getTableName()
    {
        return Config::get('location.cities_table');
    }
}
