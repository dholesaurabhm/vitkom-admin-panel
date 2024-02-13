<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundISIN extends Model
{
    use HasFactory;
    protected $table = 'fund_isin';
    protected $fillable = ['isin','nav','plan_date','response'];
}
