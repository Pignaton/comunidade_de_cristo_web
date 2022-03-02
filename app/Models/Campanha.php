<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campanha extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'campanha';
    protected $primaryKey = 'cod_campanha';
    public $timestamps = true;
    protected $fillable = [
        'nom_campanha'
    ];
}
