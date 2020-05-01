<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PessoaVendedor extends Model {
    protected $primaryKey = ['cliente_id', 'vendedor_id'];

    protected $table = 'pessoas_vendedores';
}
