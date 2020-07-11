<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imoveis extends Model
{
    public $fillable = [ 
        "id_imoveis",
        "uuid",
        "email",
        "rua",
        "numero",
        "complemento",
        "bairro",
        "cidade",
        "estado"
    ];

    public $timestamps = false;
    protected $primaryKey = 'id_imoveis';
}
