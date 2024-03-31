<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LifeReport extends Model
{
    use HasFactory;
    protected $table = 'life_report';
    protected $fillable = ['client_id','tar_no','plan_type','company_name','plan_name','plan_id','proposer_name','application_no','policy_no','sum_assured','gross_premium','net_premium','endorsement_premium','total_permium','permium_term','policy_term','mode_payment','login_date','issue_date','risk_date','post_date','status','reason','remark','mode','pan_no','file_id','isdelete'];
}
