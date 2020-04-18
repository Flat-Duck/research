<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaperTeacherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paper_teacher', function (Blueprint $table) {
            $table->integer('paper_id')->unsigned()->index();
            $table->integer('teacher_id')->unsigned()->index();
            
            $table->foreign('paper_id')->references('id')->on('papers');
            $table->foreign('teacher_id')->references('id')->on('teachers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paper_teacher');
    }
}
