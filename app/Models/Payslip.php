<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payslip extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'amount', 'service_charge', 'total', 'paid_on', 'type', 'remarks'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
