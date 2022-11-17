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
        Schema::create('order_items_details', function (Blueprint $table) {
            $table->id('oid_id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_cetg_id');
            $table->unsignedBigInteger('product_subcetg_id');
            $table->unsignedBigInteger('product_brand_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            $table->double('unit_price');
            $table->integer('discount')->default(0);
            $table->double('total_amount');
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
        Schema::dropIfExists('order_items_details');
    }
};
