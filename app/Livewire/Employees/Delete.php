<?php

namespace App\Livewire\Employees;

use App\Events\RefreshEvent;
use App\Models\Employee;
use Flux\Flux;
use Livewire\Component;

class Delete extends Component
{
    public $employee;

    public function mount($employee)
    {
        $this->employee = $employee;
    }

    public function deleteEmployee()
    {
        $employee = Employee::findOrFail($this->employee->id);

        $employee->delete();

        $this->dispatch('toast', data: [
            'message'   => "{$employee->name} deleted successfully.",
            'type'      => 'success'
        ]);

        Flux::modal("delete-employee-{$employee->id}")->close();

        $this->dispatch('employees:refresh');

        RefreshEvent::dispatch();

        return;
    }

    public function render()
    {
        return view('livewire.employees.delete');
    }
}
