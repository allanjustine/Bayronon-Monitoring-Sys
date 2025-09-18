<?php

namespace App\Livewire\Utangs;

use App\Models\Utang;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    #[Title('Admin | Utangs')]

    public string $search = '';

    #[Computed]
    #[On('utangs:refresh')]
    public function utangs()
    {
        return Utang::when(
            $this->search,
            fn($query)
            =>
            $query->where(
                fn($q)
                =>
                $q->where('amount', 'LIKE', "%{$this->search}%")
                    ->orWhereHas(
                        'employee',
                        fn($q)
                        =>
                        $q->whereAny([
                            'name',
                            'position',
                            'department'
                        ], 'LIKE', "%{$this->search}%")
                    )
            )
        )
            ->latest()->paginate(10);
    }

    public function render()
    {
        return view('livewire.utangs.index');
    }
}
