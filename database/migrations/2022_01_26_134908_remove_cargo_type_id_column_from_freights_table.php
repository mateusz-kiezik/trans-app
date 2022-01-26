<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveCargoTypeIdColumnFromFreightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('freights', function (Blueprint $table) {
            $table->dropColumn('cargo_type_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('freights', function (Blueprint $table) {
            $table->integer('cargo_type_id')->nullable();
        });
    }
}
