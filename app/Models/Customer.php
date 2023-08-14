<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'mobile_no',
        'added_by',
        'customer_type',
    ];
    public function payments()
    {
        return $this->hasMany(Payment::class);
        return $this->belongsToMany(Payment::class, 'customer_payment');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    

    
}
