<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldTempresas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tempresas', function (Blueprint $table) {
            $table->integer('idUsuario')->unsigned();
        });

        Schema::table('tempresas', function($table) {
            $table->foreign('idUsuario')->references('idUsuario')->on('tusuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tempresas', function (Blueprint $table) {
            $table->dropColumn('idUsuario');
        });
    }
}
