<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model {

    public function vendedores() {
        return $this->belongsToMany('App\PessoaVendedor', 'pessos_vendedores')->withPivot(['horas_semanais']);
    }
    public function pessoa() {
        return $this->belongsTo('App\Pessoa');
    }
}
