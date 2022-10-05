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
        Schema::create('subcategories', function (Blueprint $table) {
            $table->id('subcategory_id');
            $table->unsignedBigInteger('category_id');
            $table->string('subcategory_name_en');
            $table->string('subcategory_name_bn');
            $table->string('subcategory_slug_en');
            $table->string('subcategory_slug_bn');
            $table->boolean('subcategory_status', ['1', '0'])->default('1');
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
        Schema::dropIfExists('subcategories');
    }
};
