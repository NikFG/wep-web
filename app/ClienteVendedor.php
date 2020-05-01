<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteVendedor extends Model {
    protected $primaryKey = ['cliente_id', 'vendedor_id'];

    protected $table = 'clientes_vendedores';
}
