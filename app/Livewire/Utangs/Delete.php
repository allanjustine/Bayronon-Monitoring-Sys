<?php

namespace App\Livewire\Utangs;

use App\Events\RefreshEvent;
use App\Models\Utang;
use Flux\Flux;
use Livewire\Component;

class Delete extends Component
{

    public string $utangan = '';
    public int $amount = 0;
    public int $id = 0;

    public function mount($utang)
    {
        $this->utangan = $utang->employee->name;
        $this->amount = $utang->amount;
        $this->id = $utang->id;
    }

    public function deleteUtang()
    {
        $utang = Utang::findOrFail($this->id);

        $utang->delete();

        $this->dispatch('toast', data: [
            'message'   => "{$utang->employee->name} deleted successfully.",
            'type'      => 'success'
        ]);

        Flux::modal("delete-utang-{$utang->id}")->close();

        $this->dispatch('utangs:refresh');

        RefreshEvent::dispatch();

        return;
    }

    public function render()
    {
        return view('livewire.utangs.delete');
    }
}
