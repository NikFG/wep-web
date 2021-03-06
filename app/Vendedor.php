<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model {
    protected $table = 'vendedores';

    public function clientes() {
        return $this->belongsToMany('App\Cliente', 'clientes_vendedores');
    }
    public function pessoa() {
        return $this->belongsTo('App\Pessoa');
    }
}
