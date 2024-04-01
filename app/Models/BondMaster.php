<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BondMaster extends Model
{
    use HasFactory;
    protected $table = 'bond_master';
    protected $fillable = ['client_id','start_date','client_code','client_name','scrip_name','bond_name','total','platform','isdelete'];
}
