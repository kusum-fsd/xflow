<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'mtn_no',
        'USD_amt',
        'INR_amt',
        'remark',
        'deposit_type',
        'customer_id',
        'user_id',
    ];
    protected $hidden = ['transaction_no'];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
