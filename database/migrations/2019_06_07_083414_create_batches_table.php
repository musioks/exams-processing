<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('academic_year_id');
            $table->unsignedBigInteger('term_id');
            $table->unsignedBigInteger('year_of_study_id');
            $table->string('name');
            $table->boolean('status')->default(1);
            $table->date('start_date');
            $table->date('end_date');
            $table->foreign('course_id')
                ->references('id')
                ->on('courses')
                ->onDelete('cascade');
            $table->foreign('academic_year_id')
                ->references('id')
                ->on('academic_years')
                ->onDelete('cascade');
            $table->foreign('term_id')
                ->references('id')
                ->on('semester_terms')
                ->onDelete('cascade');
            $table->foreign('year_of_study_id')
                ->references('id')
                ->on('year_of_studies')
                ->onDelete('cascade');
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
        Schema::dropIfExists('batches');
    }
}
