<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->nullable();
            $table->string('name')->nullable();
            $table->boolean('modify_users')->nullable();
            $table->boolean('modify_roles')->nullable();
            $table->boolean('modify_wsf_outline')->nullable();
            $table->boolean('modify_pages')->nullable();
            $table->boolean('modify_sermons')->nullable();
            $table->boolean('modify_service')->nullable();
            $table->boolean('modify_site_info')->nullable();
            $table->boolean('modify_sliders')->nullable();
            $table->boolean('modify_testimony')->nullable();
            $table->boolean('modify_files')->nullable();
            $table->boolean('modify_unique')->nullable();
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
        Schema::dropIfExists('roles');
    }
}
