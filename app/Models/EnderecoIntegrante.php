<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnderecoIntegrante extends Model
{
    use HasFactory;

    protected $table = 'endereco_integrante';
    protected $primaryKey = 'cod_endereco_integrante';
    public $timestamps = true;
    protected $fillable = [
        'cod_integrante',
        'cep',
        'endereco',
        'bairro',
        'numero',
        'cidade',
        'estado'
    ];
}
