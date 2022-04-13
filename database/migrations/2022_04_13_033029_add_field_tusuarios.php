<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldTusuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tusuarios', function (Blueprint $table) {
            $table->integer('idEmpresa')->unsigned();
        });

        Schema::table('tusuarios', function($table) {
            $table->foreign('idEmpresa')->references('idEmpresa')->on('tempresas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tusuarios', function (Blueprint $table) {
            $table->dropColumn('idEmpresa');
        });
    }
}
