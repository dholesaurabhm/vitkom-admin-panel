<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthReport extends Model
{
    use HasFactory;
    protected $table = 'health_report';
    protected $fillable = ['client_id','tar_no','transaction_type','plan_type','company_name','plan_name','plan_id','proposer_name','application_no','policy_no','sum_assured','gross_premium','net_premium','endorsement_premium','total_permium','login_date','issue_date','risk_date','risk_exp_date','post_date','status','reason','remark','policy_copy','vehicle_no','mode','pan_no','file_id','isdelete'];
}
