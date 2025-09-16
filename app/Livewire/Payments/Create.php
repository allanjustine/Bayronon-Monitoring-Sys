<?php

namespace App\Livewire\Payments;

use App\Models\Payment;
use Flux\Flux;
use Livewire\Component;

class Create extends Component
{

    public string $title = '';
    public string $description = '';
    public int $amount = 0;

    protected function rules()
    {
        return [
            'title'         => ['required', 'string', 'min:2', 'max:255'],
            'description'   => ['required', 'string', 'min:2', 'max:255'],
            'amount'        => ['required', 'numeric', 'gte:1'],
        ];
    }

    public function storePayment()
    {
        $this->validate();

        $payment = Payment::create([
            'title'         => $this->title,
            'description'   => $this->description,
            'amount'        => $this->amount
        ]);

        $this->dispatch('toast', data: [
            'message'   => "{$payment->title} added successfully.",
            'type'      => 'success'
        ]);

        $this->dispatch('payments:refresh');

        Flux::modal('create-payment')->close();

        $this->reset();

        return;
    }

    public function render()
    {
        return view('livewire.payments.create');
    }
}
