<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = [];

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_payments', 'payment_id', 'employee_id')
            ->withPivot('amount')
            ->withTimestamps();
    }

    public function employeeRemainingBillings($paid = 0)
    {
        return $this->amount - $paid;
    }

    public function isNoBillings($paid = 0)
    {
        return $this->amount <= $paid;
    }
}
