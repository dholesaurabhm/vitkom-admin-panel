<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundPlan extends Model
{
    use HasFactory;
    protected $table = 'fund_plans';
    protected $fillable = ['fund_id','scheme_code','isin_code','isin_reinvestment','scheme_name','nav','plan_date','response','isdelete'];
}
