<?php

namespace App\Livewire\Utangs;

use App\Models\Utang;
use Flux\Flux;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Edit extends Component
{
    public int $id = 0;
    public string $employee = '';
    public int $amount = 0;
    public string $utangan = '';

    public function mount($utang)
    {
        $this->id = $utang->id;
        $this->employee = $utang->employee_id;
        $this->utangan = $utang->employee->name;
        $this->amount = $utang->amount;
    }

    protected function rules()
    {
        return [
            'employee'      => ['required', Rule::exists('employees', 'id')],
            'amount'        => ['required', 'numeric', 'gte:0']
        ];
    }

    public function updateUtang()
    {
        $this->validate();

        $utang = Utang::findOrFail($this->id);

        $utang->update([
            'employee_id'   => $this->employee,
            'amount'        => $this->amount
        ]);

        $this->dispatch('toast', data: [
            'message'   => "Utang ni {$utang->employee->name} updated successfully.",
            'type'      => 'success'
        ]);

        Flux::modal("edit-utang-{$utang->id}")->close();

        $this->dispatch('utangs:refresh');

        return;
    }

    public function render()
    {
        return view('livewire.utangs.edit');
    }
}
