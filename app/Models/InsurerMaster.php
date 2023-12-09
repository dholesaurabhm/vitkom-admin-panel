<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsurerMaster extends Model
{
    use HasFactory;
    protected $table = 'insurer_master';
    protected $fillable = ['insurance_type','company_name','isdelete'];
}
