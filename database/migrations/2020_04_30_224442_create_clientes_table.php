<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->float('limite_credito')->nullable()->default(0)->unsigned();
            $table->boolean('bloqueado')->nullable()->default(false);
            $table->date('data_encerramento')->nullable();
            $table->date('data_nascimento')->nullable();
            $table->bigInteger('pessoa_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::table('clientes', function (Blueprint $table) {
            $table->foreign('pessoa_id')->references('id')->on('pessoas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('clientes');
    }
}
