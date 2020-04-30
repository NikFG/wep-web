<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecosTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->id();
            $table->string('rua', 60);
            $table->string('cep', 8);
            $table->string('bairro', 60);
            $table->integer('numero')->nullable();
            $table->string('complemento', 100)->nullable();
            $table->string('latitude', 45)->nullable();
            $table->string('longitude', 45)->nullable();
            $table->text('observacao')->nullable();
            $table->bigInteger('cidade_id')->unsigned();
            $table->bigInteger('pessoa_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::table('enderecos', function (Blueprint $table) {
            $table->foreign('cidade_id')->references('id')->on('cidades');
            $table->foreign('pessoa_id')->references('id')->on('pessoas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('enderecos');
    }
}
