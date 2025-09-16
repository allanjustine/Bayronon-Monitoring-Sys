<?php

namespace App\Livewire\Employees;

use App\Models\Employee;
use App\Models\Payment as ModelsPayment;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class Payment extends Component
{
    public int $id = 0;
    public string $name = '';

    public function mount($id)
    {
        $employee = Employee::findOrFail($id);

        $this->id = $employee->id;
        $this->name = $employee->name;
    }

    #[Computed]
    #[On('payments:refresh')]
    public function billings()
    {
        return ModelsPayment::query()
            ->withSum([
                'employees as employee_payments_sum' => fn($q) => $q->where('employee_id', $this->id)
            ], 'employee_payments.amount')
            ->get();
    }

    public function render()
    {
        return view('livewire.employees.payment');
    }
}
