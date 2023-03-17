<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id');
            $table->string('transaction_no');            
            $table->bigInteger('order_id');
            $table->string('order_no');
            $table->decimal('amount', 12, 2)->nullable();            
            $table->string('payment_method')->nullable();
            $table->enum('status', array('0', '1'))->default('0');
            $table->timestamp('transaction_date')->nullable();
            $table->timestamp('order_date')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
