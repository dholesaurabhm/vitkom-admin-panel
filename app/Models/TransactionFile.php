<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionFile extends Model
{
    use HasFactory;
    protected $table = 'transaction_files';
    protected $fillable = ['file_type','file_path','user_id','isdelete'];
}
