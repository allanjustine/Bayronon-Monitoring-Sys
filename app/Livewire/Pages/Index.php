<?php

namespace App\Livewire\Pages;

use App\Events\RefreshEvent;
use App\Models\Employee;
use App\Models\Payment;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Index extends Component
{
    #[Layout('components.layouts.home')]

    #[Title('Home')]

    public string $search = '';

    #[Validate(['required', 'numeric', 'gte:1'])]
    public int $amount = 1;

    #[Computed]
    #[On('items:refresh')]
    #[On('echo:refresh-items,RefreshEvent')]
    public function employees()
    {
        return Employee::query()
            ->withSum('payments', 'employee_payments.amount')
            ->when(
                $this->search,
                fn($query)
                =>
                $query->where(
                    fn($q)
                    =>
                    $q->whereAny([
                        'name',
                        'position',
                        'department'
                    ], 'LIKE', "%{$this->search}%")
                )
            )
            ->orderBy('name')
            ->get();
    }

    #[Computed]
    public function totalPayments()
    {
        return Payment::query()
            ->sum('amount');
    }

    public function storeUtang($employee_id)
    {
        $this->validate();

        $employee = Employee::findOrFail($employee_id);

        $employee_utang = $employee?->utangs?->amount ?: 0;

        $employee_utang += $this->amount;

        $employee->utangs()->updateOrCreate([
            'employee_id'   => $employee->id
        ], [
            'amount'        => $employee_utang
        ]);

        $this->reset();

        $this->dispatch('toast', data: [
            'message' => 'Your new utang has been added successfully.',
            'type'    => 'success'
        ]);

        $this->dispatch('items:refresh');

        RefreshEvent::dispatch();

        return;
    }

    public function render()
    {
        return view('livewire.pages.index');
    }
}
