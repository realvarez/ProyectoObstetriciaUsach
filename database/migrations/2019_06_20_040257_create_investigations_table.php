<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestigationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investigations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('resume_id')->unsigned();
            $table->string('name');
            $table->string('founding');
            $table->string('duration');
            $table->year('adjudication_time');            
            $table->timestamps();
            
            $table->foreign('resume_id')->references('id')->on('resumes')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('investigations');
    }
}
