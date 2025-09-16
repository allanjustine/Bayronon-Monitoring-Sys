<?php

namespace App\Livewire\Employees;

use App\Models\Employee;
use App\Models\Payment;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    #[Title('Employees')]

    public string $search = '';

    #[Computed]
    #[On('employees:refresh')]
    public function employees()
    {
        return Employee::query()
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
            ->latest()
            ->paginate(10);
    }

    #[Computed]
    public function totalPayments()
    {
        return Payment::query()
            ->sum('amount');
    }

    public function render()
    {
        return view('livewire.employees.index');
    }
}
