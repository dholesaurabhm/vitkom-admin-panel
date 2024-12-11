<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralReport extends Model
{
    use HasFactory;
    protected $table = 'general_report';
    protected $fillable = ['id', 'proposer_name', 'pan_no', 'dob', 'mobile_no', 'email', 'policy_no', 'application_no', 'login_date', 'issue_date', 'gross_premium', 'payment_mode', 'plan_name', 'company_name', 'status', 'plan_type', 'premium_term', 'policy_term', 'sum_assured_risk_coverage', 'reason', 'remarks', 'mode', 'vehicle_reg_no','file_id','isdelete'];
}
