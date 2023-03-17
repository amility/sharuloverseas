<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('order_type', array('family', 'guest'))->default('family');
            $table->string('order_no', 100)->nullable();
            $table->bigInteger('customer_id');
            $table->integer('terms_condition_id');
            $table->decimal('shipping_price', 12, 2)->nullable();
            $table->decimal('total_price', 12, 2)->nullable();
            $table->string('courier_id', 100)->nullable();
            $table->string('tracking_id', 100)->nullable();
            $table->timestamp('order_date')->nullable();
            $table->timestamp('expected_delivery')->nullable();
            $table->timestamp('order_confirm_date')->nullable();
            $table->timestamp('order_dispatch_date')->nullable();
            $table->timestamp('order_delivered_date')->nullable();
            $table->timestamp('order_rejected_date')->nullable();
            $table->timestamp('order_undelivered_date')->nullable();
            $table->timestamp('delivery_date')->nullable();
            $table->enum('status', array('placed','confirmed','dispatched','delivered','rejected','undelivered','cancelled'))->default('placed'); 
            $table->string('order_notes')->nullable();           
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
        Schema::dropIfExists('orders');
    }
}
