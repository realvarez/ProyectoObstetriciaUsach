<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resumes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('academic_id')->unsigned();
            $table->bigInteger('academic_type_id')->unsigned();
            $table->bigInteger('hierarchy_id')->unsigned()->nullable();
            $table->bigInteger('teacher_category_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('birth_date');
            $table->Integer('hours');
            $table->string('area_competence');
            $table->timestamps();

            $table->foreign('academic_id')->references('id')->on('academics')->onDelete('cascade');
            $table->foreign('academic_type_id')->references('id')->on('academic_types')->onDelete('cascade');
            $table->foreign('hierarchy_id')->references('id')->on('hierarchies')->onDelete('cascade');
            $table->foreign('teacher_category_id')->references('id')->on('teacher_categories')->onDelete('cascade');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resumes');
    }
}
