<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded = [];

    public function utangs()
    {
        return $this->hasOne(Utang::class);
    }

    public function payments()
    {
        return $this->belongsToMany(Payment::class, 'employee_payments', 'employee_id', 'payment_id')
            ->withPivot('amount')
            ->withTimestamps();
    }

    public function totalBillings($totalPayments = 0)
    {
        return $totalPayments - $this->payments->sum('pivot.amount');
    }

    public function noBillings($billingAmount = 0)
    {
        return $this->payments->sum('pivot.amount') >= $billingAmount;
    }

    public function isPaid($amount)
    {
        return (int) $amount === 0;
    }
}
