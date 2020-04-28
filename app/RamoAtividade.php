<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RamoAtividade extends Model {
    use SoftDeletes;

    public function pessoa() {
        return $this->hasMany('App\Pessoa');
    }
}
