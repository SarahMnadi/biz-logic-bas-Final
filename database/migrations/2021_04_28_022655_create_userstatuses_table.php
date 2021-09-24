<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserstatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userstatuses', function (Blueprint $table) {
            
            $table->id();
            $table->string('user_id');
            $table->string('fingerprint_id')->nullable();
            $table->string('card_uid')->nullable();
            $table->boolean('ready_to_enroll')->default(0);
            $table->boolean('enrollment_status')->default(0);
            $table->boolean('card_registered')->default(0);
            $table->boolean('ready_to_add_card')->default(0);
            $table->boolean('delete_status')->default(0);
            $table->timestamps();
            // $table->foreign('user_id')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userstatuses');
    }
}
