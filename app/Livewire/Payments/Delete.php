<?php

namespace App\Livewire\Payments;

use App\Models\Payment;
use Flux\Flux;
use Livewire\Component;

class Delete extends Component
{
    public $payment;

    public function mount($payment)
    {
        $this->payment = $payment;
    }

    public function deletePayment()
    {
        $payment = Payment::findOrFail($this->payment->id);

        $payment->delete();

        $this->dispatch('toast', data: [
            'message'   => "{$payment->title} deleted successfully.",
            'type'      => 'success'
        ]);

        Flux::modal("delete-payment-{$payment->id}")->close();

        $this->dispatch('payments:refresh');

        return;
    }

    public function render()
    {
        return view('livewire.payments.delete');
    }
}
