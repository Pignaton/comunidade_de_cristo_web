<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Links extends Model
{
    use HasFactory;

    protected $table = 'links';
    protected $primaryKey = 'cod_links';
    public $timestamps = false;
}
