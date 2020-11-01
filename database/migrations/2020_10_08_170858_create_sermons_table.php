<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSermonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sermons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->unique();
            $table->uuid('author_id')->nullable(); //local publisher
            $table->uuid('series_id')->nullable(); //series if applicable
            $table->string('slug')->nullable();
            $table->text('title')->nullable();
            $table->string('sub_title')->nullable();
            $table->text('intro')->nullable();
            $table->text('theme')->nullable();
            $table->longText('info')->nullable();
            $table->uuid('preacher_id')->nullable(); //the preacher
            $table->uuid('category_id')->nullable();
            $table->longText('tags')->nullable(); //relative post
            $table->string('type')->nullable(); //
            $table->longText('keywords')->nullable();
            $table->string('banner')->nullable();
            $table->boolean('published')->nullable();
            $table->integer('hits')->default(0)->nullable();
            $table->integer('shares')->default(0)->nullable();
            $table->bigInteger('date')->nullable();
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
        Schema::dropIfExists('sermons');
    }
}
