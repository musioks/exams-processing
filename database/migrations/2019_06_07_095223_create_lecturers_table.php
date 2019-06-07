<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLecturersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecturers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('firstname',250);
            $table->string('middlename',250)->nullable();
            $table->string('lastname',250);
            $table->string('gender',250)->nullable();
            $table->date('dob')->nullable();
            $table->string('marital_status')->default('single');
            $table->string('nationality')->default('Kenyan');
            $table->string('national_id')->nullable();
            $table->string('postal_address')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('email', 250)->unique();
            $table->string('employee_number')->unique();
            $table->boolean('login_status')->default(0);
            $table->string('photo')->nullable();
            $table->string('status')->default('ACTIVE');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('lecturers');
    }
}
