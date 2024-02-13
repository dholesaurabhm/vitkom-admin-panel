<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MutualFund extends Model
{
    use HasFactory;
    protected $table = 'mutual_funds';
    protected $fillable = ['client_id','amc_id','scheme_name','scheme_id','isin','folio_no','plan','purchase_date','nav','invested_amount','current_unit','current_value','current_nav','profit_loss','isdelete'];
}
