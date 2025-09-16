<?php

namespace App\Livewire\Employees;

use App\Models\Employee;
use Flux\Flux;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{
    public string $name = '';
    public string $position = '';
    public string $department = '';

    protected function rules()
    {
        return [
            'name'          => ['required', 'string', 'min:2', 'max:255', Rule::unique('employees', 'name')],
            'position'      => ['required', 'string', 'min:2', 'max:255'],
            'department'    => ['required', 'string', 'min:2', 'max:255'],
        ];
    }

    public function storeEmployee()
    {
        $this->validate();

        $employee = Employee::create([
            'name'          => $this->name,
            'position'      => $this->position,
            'department'    => $this->department
        ]);

        $this->dispatch('toast', data: [
            'message'   => "{$employee->name} added successfully.",
            'type'      => 'success'
        ]);

        Flux::modal('create-employee')->close();

        $this->dispatch('employees:refresh');

        $this->reset();

        return;
    }

    public function render()
    {
        return view('livewire.employees.create');
    }
}
