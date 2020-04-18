<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('papers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->boolean('type');
            $table->boolean('published_at');
            $table->boolean('publish_place');
            $table->integer('pages');
            $table->integer('references');
            $table->integer('college_id')->unsigned()->index();
            $table->integer('department_id')->unsigned()->index();
            $table->integer('magazine_id')->unsigned()->index();
            $table->integer('conference_id')->unsigned()->index();
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('college_id')->references('id')->on('colleges');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('magazine_id')->references('id')->on('magazines');
            $table->foreign('conference_id')->references('id')->on('conferences');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('papers');
    }
}
