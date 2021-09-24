<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
        
            $table->string('room_id')->unique();
            $table->string('device_token')->nullable();
            $table->string('room_name');
            $table->string('room_security_level');
            $table->timestamps();
            $table->softDeletes();
            // $table->foreign('organization_id')
            // ->references('organization_id')->on('organizations');
            // $table->foreign('device_token')->references('device_token')->on('devices');
         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
