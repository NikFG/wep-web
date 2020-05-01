<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoasVendedoresTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('pessoas_vendedores', function (Blueprint $table) {

            $table->bigInteger('cliente_id')->unsigned();
            $table->bigInteger('vendedor_id')->unsigned();
            $table->primary(['cliente_id', 'vendedor_id']);
            $table->timestamps();
        });
        Schema::table('pessoas_vendedores', function (Blueprint $table) {
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('vendedor_id')->references('id')->on('vendedores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('pessoas_vendedores');
    }
}
