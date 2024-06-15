<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'plan_id',
        'payment_id',
        'amount',
        'currency',
        'status',
        'confirmation_method'
    ];

    public function plan()
    {
        return   $this->belongsTo(Plan::class);
    }

    public function user()
    {
        return   $this->belongsTo(User::class);
    }


}
