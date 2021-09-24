<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->string('branch_id')->unique();
            $table->string('organization_id');
            $table->string('branch_name');
            $table->string('branch_phone_number');
            $table->string('branch_email');
            $table->string('branch_address')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('organization_id')
            ->references('organization_id')->on('organizations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branches');
    }
}
