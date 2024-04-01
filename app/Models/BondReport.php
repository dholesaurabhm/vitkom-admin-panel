<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BondReport extends Model
{
    use HasFactory;
    protected $table = 'bond_report';
    protected $fillable = ['client_id','date_from','client_code','client_name','scrip_name','bond_name','tot_purchase','tot_sale','platform','status','pan_no','file_id','isdelete'];
}
