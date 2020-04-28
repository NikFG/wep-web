<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Endereco extends Model {
    use SoftDeletes;

    public function cidade() {
        return $this->belongsTo('App\Cidade');
    }
    public function pessoa() {
        return $this->belongsTo('App\Pessoa');
    }
}
