<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionReport extends Model
{
    use HasFactory;
    protected $table = 'transaction_report';
    protected $fillable = ['trxn_type','trxn_mode','employee_name','group_name','invester','inverster_id','pan_no','type','trxn_date','folio_no','scheme','nav','no_units','gross_amount','stamp_duty','broker_charge','trxn_charge','invest_amount','balance_unit','post_Date','tr_no','exit_load','stt','tds','isin','demat_account','file_id','isdelete'];
}
