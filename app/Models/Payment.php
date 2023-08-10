<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function customers()
    {
        return $this->belongsToMany(Customer::class, 'customer_payment');
    }
    public function create($type)
{
    return view('admin.payments.create', compact('type'));
}
}
