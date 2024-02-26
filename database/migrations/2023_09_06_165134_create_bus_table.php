<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus', function (Blueprint $table) {
            $table->id();
            $table->string('bus_name',20);
            $table->string('bus_source',20);
            $table->string('bus_desti',20);
            $table->integer('bus_fare');
            $table->integer('bus_distance');
            $table->integer('bus_travel_time');
            $table->integer('bus_total_seats');
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
        Schema::dropIfExists('bus');
    }
}
