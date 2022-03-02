<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Culto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'culto';

    protected $primaryKey = 'cod_culto';

    protected $fillable = [
        'nom_culto',
        'dia_culto',
        'ind_periodo'
    ];

    public function listaCulto()
    {
        return Culto::where('status', 'A')->get();
    }
}
