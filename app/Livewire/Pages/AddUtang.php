<?php

namespace App\Livewire\Pages;

use App\Events\RefreshEvent;
use App\Models\Employee;
use Flux\Flux;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Computed;
use Livewire\Component;

class AddUtang extends Component
{
    public int $amount = 1;
    public string $employee = "";

    protected function rules()
    {
        return [
            'amount'        => ['required', 'numeric', 'gte:1'],
            'employee'      => ['required', Rule::exists('employees', 'id')]
        ];
    }

    public function storeUtang()
    {
        $this->validate();

        $employee = Employee::findOrFail($this->employee);

        $employee_utang = $employee?->utangs?->amount ?: 0;

        $employee_utang += $this->amount;

        $employee->utangs()->updateOrCreate([
            'employee_id'   => $employee->id
        ], [
            'amount'        => $employee_utang
        ]);

        Flux::modal('add-utang')->close();

        $this->reset();

        $this->dispatch('toast', data: [
            'message' => 'Your new utang has been added successfully.',
            'type'    => 'success'
        ]);

        $this->dispatch('items:refresh');

        RefreshEvent::dispatch();

        return;
    }

    #[Computed]
    public function employees()
    {
        return Employee::query()
            ->orderBy('name')
            ->get();
    }

    public function render()
    {
        return view('livewire.pages.add-utang');
    }
}
