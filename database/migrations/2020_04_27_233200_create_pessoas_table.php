<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoasTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->char('tipo_pessoa', 1);
            $table->string('cnpj_cpf', 14);
            $table->string('razao_social', 120)->nullable();
            $table->string('inscricao_estadual', 20)->nullable();
            $table->boolean('ativo')->nullable()->default(true);
            $table->char('sexo', 1)->nullable();
            $table->string('observacao')->nullable();
            $table->bigInteger('telefone_id')->unsigned();
            $table->bigInteger('email_id')->unsigned();
            $table->bigInteger('ramo_atividade_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::table('pessoas', function (Blueprint $table) {
            $table->foreign('telefone_id')->references('id')->on('telefones');
            $table->foreign('email_id')->references('id')->on('emails');
            $table->foreign('ramo_atividade_id')->references('id')->on('ramo_atividades');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('pessoas');
    }
}
