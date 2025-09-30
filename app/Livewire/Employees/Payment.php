<?php

namespace App\Livewire\Employees;

use App\Models\Employee;
use App\Models\Payment as ModelsPayment;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

class Payment extends Component
{
    #[Title('Admin | Add Billings')]
    public int $id = 0;
    public string $name = '';

    public function mount(Employee $employee)
    {
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

    public function payAll()
    {
        $payments = ModelsPayment::query()
            ->whereDoesntHave(
                'employees',
                fn($q)
                =>
                $q->where('employee_id', $this->id)
            )
            ->get();

        $employee = Employee::findOrFail($this->id);

        $data = [];

        foreach ($payments as $payment) {
            $data[$payment->id] = [
                'amount' => $payment->amount
            ];
        }

        $employee->payments()->attach($data);

        $this->dispatch('toast', data: [
            'message'   => "{$this->name} payments marked all as paid successfully.",
            'type'      => 'success'
        ]);

        $this->dispatch('payments:refresh');

        return;
    }

    public function render()
    {
        return view('livewire.employees.payment');
    }
}
