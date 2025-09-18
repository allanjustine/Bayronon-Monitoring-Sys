<?php

namespace App\Traits;

use App\Models\Employee;
use App\Models\Payment;
use App\Models\Utang;
use Illuminate\Support\Facades\DB;

trait DashboardTrait
{
    public function dashboardData()
    {

        $totalEmployees = Employee::query()->count();
        $totalPayments = Payment::query()->count();
        $totalUtangs = Utang::query()->count();
        $totalAmountOfUtang = Utang::query()->sum('amount');
        $totalAmountOfPaymentsOfEmployees = DB::table('employee_payments')->sum('amount');
        $totalAmountOfPayments = Payment::query()->sum('amount');
        $totalAmountOfPaymentsToPay = $totalAmountOfPayments * $totalEmployees;
        $totalAmountOfPaymentsToPayLeft = $totalAmountOfPaymentsToPay - $totalAmountOfPaymentsOfEmployees;

        return [
            'totalEmployees'                 => $totalEmployees,
            'totalPayments'                  => $totalPayments,
            'totalUtangs'                    => $totalUtangs,
            'totalAmountOfUtang'             => $totalAmountOfUtang,
            'totalAmountOfPayments'          => $totalAmountOfPaymentsOfEmployees,
            'totalAmountOfPaymentsToPay'     => $totalAmountOfPaymentsToPay,
            'totalAmountOfPaymentsToPayLeft' => $totalAmountOfPaymentsToPayLeft,
        ];
    }
}
