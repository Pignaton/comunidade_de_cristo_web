<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Integrante extends Model
{
    use HasFactory;

    protected $table = 'integrante';
    protected $primaryKey = 'cod_integrante';
    public $timestamps = true;
    protected $fillable = [
        'nome',
        'idade',
        'email',
        'data_nascimento'
    ];

    public function enderecoIntegrante()
    {
        return DB::table('integrante as a')
            ->leftJoin('endereco_integrante as b', 'a.cod_integrante', '=', 'b.cod_integrante')
            ->get();
    }
}
