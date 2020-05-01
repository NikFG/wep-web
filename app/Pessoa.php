<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model {
    public function clientes() {
        return $this->hasMany('App\Cliente');
    }
    public function vendedores() {
        return $this->hasMany('App\Vendedor');
    }
}
