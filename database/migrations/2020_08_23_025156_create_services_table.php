<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->nullable();
            $table->string('title')->nullable(); //sunday service, midweek service,
            $table->string('theme')->nullable(); //example: Encounter with destiny...
            $table->boolean('sub_title')->nullable(); //fasting and prayer , anointing service
            $table->boolean('instruction')->nullable(); //come with your anointing oil
            $table->string('service_time')->nullable(); //  | 9:30 AM
            $table->string('service_link')->nullable();
            $table->bigInteger('date')->nullable();
            $table->boolean('active')->nullable();
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
        Schema::dropIfExists('services');
    }
}
