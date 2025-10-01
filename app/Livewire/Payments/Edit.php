<?php

namespace App\Livewire\Payments;

use App\Events\RefreshEvent;
use App\Models\Payment;
use Flux\Flux;
use Livewire\Component;

class Edit extends Component
{
    public int $id = 0;
    public string $title = '';
    public string $description = '';
    public int $amount = 0;

    public function mount($payment)
    {
        $this->id = $payment->id;
        $this->title = $payment->title;
        $this->description = $payment->description;
        $this->amount = $payment->amount;
    }

    protected function rules()
    {
        return [
            'title'         => ['required', 'string', 'min:2', 'max:255'],
            'description'   => ['required', 'string', 'min:2', 'max:255'],
            'amount'        => ['required', 'numeric', 'gte:1'],
        ];
    }

    public function updatePayment()
    {
        $this->validate();

        $payment = Payment::findOrFail($this->id);

        $payment->update([
            'title'         => $this->title,
            'description'   => $this->description,
            'amount'        => $this->amount
        ]);

        $this->dispatch('toast', data: [
            'message'   => "{$payment->title} updated successfully.",
            'type'      => 'success'
        ]);

        Flux::modal("edit-payment-{$payment->id}")->close();

        $this->dispatch('payments:refresh');

        RefreshEvent::dispatch();

        return;
    }

    public function render()
    {
        return view('livewire.payments.edit');
    }
}
