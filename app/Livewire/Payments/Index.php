<?php

namespace App\Livewire\Payments;

use App\Models\Payment;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    #[Title('Payments')]

    public string $search = '';

    #[Computed]
    #[On('payments:refresh')]
    public function payments()
    {
        return Payment::query()
            ->withCount('employees')
            ->when(
                $this->search,
                fn($query)
                =>
                $query->where(
                    fn($q)
                    =>
                    $q->whereAny([
                        'title',
                        'description',
                        'amount'
                    ], 'LIKE', "%{$this->search}%")
                )
            )
            ->latest()
            ->paginate(10);
    }
    public function render()
    {
        return view('livewire.payments.index');
    }
}
