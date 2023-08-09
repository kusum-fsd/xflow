<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_type',
        'MIN_no',
        'USD_in',
        'INR_in',
        'deposit_type',
        'remark',
    ];
}
