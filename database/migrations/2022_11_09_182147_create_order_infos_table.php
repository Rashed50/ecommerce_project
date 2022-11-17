<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_infos', function (Blueprint $table) {
            $table->id('order_id');
            $table->string('order_date');
            $table->string('delivery_date');
            $table->integer('order_type_id');
            $table->integer('insert_by_id')->default(1);
            $table->integer('payment_type_id')->default(1);
            $table->double('total_amount');
            $table->double('pay_amount');
            $table->float('discount')->default(0);
            $table->integer('transection_id')->nullable();
            $table->text('order_address')->nullable();
            $table->text('delivery_address')->nullable();
            $table->string('customer_phone_no');
            $table->integer('delivery_by_id')->default(1);
            $table->string('order_status_id')->default(1);
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
        Schema::dropIfExists('order_infos');
    }
};
