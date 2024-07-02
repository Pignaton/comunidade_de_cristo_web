<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SiteLogAcesso extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'site_log_acessos';
    public $timestamps = false;
}
