<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freights', function (Blueprint $table) {
            $table->id();
            $table->integer('start_address_id');
            $table->integer('first_stop_address_id')->nullable();
            $table->integer('second_stop_address_id')->nullable();
            $table->integer('end_address_id');
            $table->date('start_date');
            $table->time("start_time_from");
            $table->time('start_time_to')->nullable();
            $table->date('end_date');
            $table->time('end_time_from');
            $table->time('end_time_to')->nullable();
            $table->integer('truck_type_id');
            $table->integer('truck_id');
            $table->integer('cargo_type_id');
            $table->integer('cargo_id');
            $table->integer('freight_type_id');
            $table->integer('forwarder_id');
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
        Schema::dropIfExists('freights');
    }
}
