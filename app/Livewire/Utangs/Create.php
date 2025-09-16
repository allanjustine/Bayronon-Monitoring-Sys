<?php

namespace App\Livewire\Utangs;

use App\Models\Employee;
use App\Models\Utang;
use Flux\Flux;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class Create extends Component
{
    public string $employee = "";
    public int $amount = 0;

    protected function rules()
    {
        return [
            'employee'          => ['required', Rule::exists('employees', 'id')],
            'amount'            => ['required', 'numeric', 'gte:1']
        ];
    }

    #[Computed]
    #[On('employees:refresh')]
    public function employees()
    {
        return Employee::query()
            ->orderBy('name')
            ->whereDoesntHave('utangs')
            ->get(['id', 'name']);
    }

    public function storeUtang()
    {
        $this->validate();

        $utang = Utang::create([
            'employee_id'   => $this->employee,
            'amount'        => $this->amount
        ]);

        $this->dispatch('toast', data: [
            'message'   => "Utang ni {$utang->employee->name} added successfully.",
            'type'      => 'success'
        ]);

        $this->dispatch('utangs:refresh');

        Flux::modal('create-utang')->close();

        $this->reset();

        return;
    }

    public function render()
    {
        return view('livewire.utangs.create');
    }
}
