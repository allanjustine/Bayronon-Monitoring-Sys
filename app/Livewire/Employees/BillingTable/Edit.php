<?php

namespace App\Livewire\Employees\BillingTable;

use App\Models\Employee;
use Flux\Flux;
use Livewire\Component;

class Edit extends Component
{
    public int $id = 0;
    public int $employee_id = 0;
    public string $title = '';
    public int $amount = 0;
    public int $remaining_billings = 0;
    public int $billing_amount = 0;

    public function mount($billing, $employee_id, $remaining_billings)
    {
        $this->id = $billing->id;
        $this->employee_id = $employee_id;
        $this->title = $billing->title;
        $this->remaining_billings = $remaining_billings;
        $this->amount = $remaining_billings;
        $this->billing_amount = $billing->amount;
    }

    protected function rules()
    {
        return [
            'amount'        => ['required', 'numeric']
        ];
    }

    public function editPayment()
    {
        $this->validate();

        $employee = Employee::findOrFail($this->employee_id);

        if ($this->amount > $this->billing_amount) {
            $this->addError('amount', "Please enter an amount less than or equal to {$this->billing_amount}.");

            return $this->dispatch('toast', data: [
                'message'   => "Please enter an amount less than or equal to {$this->billing_amount}.",
                'type'      => 'error'
            ]);
        }

        $employee->payments()->detach($this->id);

        $employee->payments()->attach($this->id, [
            'amount' => $this->amount
        ]);

        Flux::modal("edit-payment-{$this->id}")->close();

        $this->dispatch('toast', data: [
            'message'   => "Payment updated successfully.",
            'type'      => 'success'
        ]);

        $this->dispatch('payments:refresh');

        $this->reset([
            'amount'
        ]);

        return;
    }

    public function render()
    {
        return view('livewire.employees.billing-table.edit');
    }
}
