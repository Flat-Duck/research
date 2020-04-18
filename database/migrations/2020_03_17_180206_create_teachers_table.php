<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('gender');
            $table->string('phone');
            $table->string('email');
            $table->integer('qualification_id')->unsigned()->index();
            $table->integer('nationality_id')->unsigned()->index();
            $table->integer('college_id')->unsigned()->index();
            $table->integer('department_id')->unsigned()->index();
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('qualification_id')->references('id')->on('qualifications');
            $table->foreign('nationality_id')->references('id')->on('nationalities');
            $table->foreign('college_id')->references('id')->on('colleges');
            $table->foreign('department_id')->references('id')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
