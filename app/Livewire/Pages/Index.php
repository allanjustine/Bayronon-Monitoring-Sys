<?php

namespace App\Livewire\Pages;

use App\Models\Employee;
use App\Models\Payment;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

class Index extends Component
{
    #[Layout('components.layouts.home')]

    #[Title('Home')]

    public string $search = '';

    #[Computed]
    #[On('items:refresh')]
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
            ->inRandomOrder()
            ->get();
    }

    #[Computed]
    public function totalPayments()
    {
        return Payment::query()
            ->sum('amount');
    }

    public function render()
    {
        return view('livewire.pages.index');
    }
}
