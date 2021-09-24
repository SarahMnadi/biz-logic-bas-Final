<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->string('department_id')->unique();
            $table->string('branch_id');
            $table->string('department_name');
            $table->string('department_phone_number');
            $table->string('department_email');
            $table->string('department_address')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('branch_id')->references('branch_id')->on('branches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');
    }
}
