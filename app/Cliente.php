<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model {

    public function vendedores() {
        return $this->belongsToMany('App\Vendedor', 'clientes_vendedores');
    }
    public function pessoa() {
        return $this->belongsTo('App\Pessoa');
    }
}
