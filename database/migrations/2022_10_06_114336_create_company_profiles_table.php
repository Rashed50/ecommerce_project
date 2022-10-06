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
        Schema::create('company_profiles', function (Blueprint $table) {
            $table->id('comp_id');
            $table->string('comp_name_en');
            $table->string('comp_name_bn');
            $table->string('comp_slug_en');
            $table->string('comp_slug_bn');
            $table->text('comp_address');
            $table->string('comp_email1');
            $table->string('comp_email2');
            $table->string('comp_phone1');
            $table->string('comp_phone2');
            $table->string('comp_mobile1');
            $table->string('comp_mobile2');
            $table->string('comp_profile_img');
            $table->string('comp_support_number');
            $table->string('comp_hotline_number');
            $table->longText('comp_description');
            $table->longText('comp_mission');
            $table->longText('comp_vission');
            $table->string('facebook_url');
            $table->string('linkedin_url');
            $table->string('twitter_url');
            $table->string('whatsapp_num');
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
        Schema::dropIfExists('company_profiles');
    }
};
