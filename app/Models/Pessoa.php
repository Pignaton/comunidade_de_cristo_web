<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Pessoa extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pessoa';
    protected $primaryKey = 'cod_pessoa';
    public $timestamps = true;

    public function enderecoPessoa($cod_pessoa = null)
    {
        $query = DB::table('pessoa as p');
        $query->leftJoin('endereco as e', 'p.cod_pessoa', '=', 'e.cod_pessoa');
        $query->whereNull('deleted_at');
        if (!empty($cod_pessoa)) {
            $query->where('p.cod_pessoa', $cod_pessoa);
            $resul = $query->first();
        } else {
            $resul = $query->get();
        }

        return $resul;
    }
}
