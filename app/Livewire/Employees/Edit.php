<?php

namespace App\Livewire\Employees;

use App\Models\Employee;
use Flux\Flux;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Edit extends Component
{
    public int $id = 0;
    public string $name = '';
    public string $position = '';
    public string $department = '';

    public function mount($employee)
    {
        $this->id = $employee->id;
        $this->name = $employee->name;
        $this->position = $employee->position;
        $this->department = $employee->department;
    }

    protected function rules()
    {
        return [
            'name'          => ['required', 'string', 'min:2', 'max:255', Rule::unique('employees', 'name')->ignore($this->id)],
            'position'      => ['required', 'string', 'min:2', 'max:255'],
            'department'    => ['required', 'string', 'min:2', 'max:255'],
        ];
    }

    public function updateEmployee()
    {
        $this->validate();

        $employee = Employee::findOrFail($this->id);

        $employee->update([
            'name'          => $this->name,
            'position'      => $this->position,
            'department'    => $this->department
        ]);

        $this->dispatch('toast', data: [
            'message'   => "{$employee->name} updated successfully.",
            'type'      => 'success'
        ]);

        Flux::modal("edit-employee-{$employee->id}")->close();

        $this->dispatch('employees:refresh');

        return;
    }

    public function render()
    {
        return view('livewire.employees.edit');
    }
}
