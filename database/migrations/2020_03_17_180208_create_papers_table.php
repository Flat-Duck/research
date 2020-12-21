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
            $table->integer('pages');
            $table->integer('references');
            $table->integer('college_id')->unsigned()->index();
            $table->integer('department_id')->unsigned()->index();
            $table->integer('magazine_id')->nullable()->unsigned()->index();
            $table->integer('conference_id')->nullable()->unsigned()->index();
            $table->integer('classification_id')->nullable()->unsigned()->index();
       //   $table->string('publish_place');
            $table->timestamp('published_at');
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('classification_id')->references('id')->on('classificationS');
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
