<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendedoresTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('vendedores', function (Blueprint $table) {
            $table->id();
            $table->boolean('callcenter');
            $table->boolean('externo');
            $table->bigInteger('pessoa_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('vendedores', function (Blueprint $table) {
            $table->foreign('pessoa_id')->references('id')->on('pessoas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('vendedores');
    }
}
