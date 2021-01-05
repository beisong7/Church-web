<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_uploads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('url')->nullable();
            $table->string('uuid')->nullable();
            $table->string('model_id')->nullable();
            $table->string('ext')->nullable();
            $table->string('original_name')->nullable();
            $table->string('name')->nullable();
            $table->float('size', 14, 2)->nullable();
            $table->integer('width')->nullable();
            $table->bigInteger('time')->nullable();
            $table->boolean('valid')->nullable();
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
        Schema::dropIfExists('image_uploads');
    }
}
