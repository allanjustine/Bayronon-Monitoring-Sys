<div>
    <flux:modal.trigger name="add-payment-{{ $id }}">
        <flux:button class="!bg-blue-500 hover:!bg-blue-600">Pay</flux:button>
    </flux:modal.trigger>

    <flux:modal name="add-payment-{{ $id }}" class="md:w-96">
        <form wire:submit.prevent='addPayment'>
            <div class="space-y-3">
                <div>
                    <flux:heading size="lg">Add payment</flux:heading>
                    <flux:text class="mt-2 text-wrap">Add payment for {{ $title }} to your bayronon monitoring
                        system.
                    </flux:text>
                </div>

                <flux:input label="Amount" type="number" placeholder="Enter amount" wire:model='amount' />

                <div class="flex gap-2">
                    <flux:spacer />


                    <flux:modal.close>
                        <flux:button variant="ghost">Cancel</flux:button>
                    </flux:modal.close>
                    <flux:button type="submit" variant="primary">Add</flux:button>
                </div>
            </div>
        </form>
    </flux:modal>
</div>
