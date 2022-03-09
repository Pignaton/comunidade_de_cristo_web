<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $table = 'endereco';
    protected $primaryKey = 'cod_endereco';
    protected $hidden = [
        'cod_endereco',
        'cod_pessoa'
    ];

    public $timestamps = true;

}
