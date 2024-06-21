<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Visualizacao extends Model
{
    use HasFactory;

    protected $table = 'visualizacao';
    protected $primaryKey = 'cod_visualizacao';
    public $timestamps = false;
    protected $fillable = [
        'cod_visualizacao',
        'cod_pagina',
        'visualizacao_data'
    ];
}
