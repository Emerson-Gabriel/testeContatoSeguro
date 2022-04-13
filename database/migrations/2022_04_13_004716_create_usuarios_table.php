<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tusuarios', function (Blueprint $table) {
            $table->increments('idUsuario');
            $table->string('nome', 150);
            $table->string('email', 100);
            $table->string('telefone', 20)->nullable();
            $table->date('dataNasc')->nullable();
            $table->string('cidade', 100)->nullable();
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
        Schema::dropIfExists('tusuarios');
    }
}
