<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pagina extends Model
{
    use HasFactory;

    protected $table = 'pages';
    protected $primaryKey = 'cod_pagina';
    public $timestamps = false;
}
