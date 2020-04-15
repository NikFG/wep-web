<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cidade extends Model {
    use SoftDeletes;
    public function estado() {
        return $this->belongsTo('App\Estado');
    }
}
