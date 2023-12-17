<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchemeMaster extends Model
{
    use HasFactory;
    protected $table = 'scheme_master';
    protected $fillable = ['scheme_type','insurer_id','scheme_name','nav','isdelete'];
}
