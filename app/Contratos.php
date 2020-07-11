<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contratos extends Model
{
    public $fillable = [ 
        "id_contrato",
        "uuid",
        "tipo_pessoa",
        "documento",
        "email_contratante",
        "nome_completo",
        "imoveis_id"
    ];

    public $timestamps = false;
    protected $primaryKey = 'id_contrato';
}
