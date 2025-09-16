<div>
    <flux:modal.trigger name="create-payment">
        <flux:button>Add new payment</flux:button>
    </flux:modal.trigger>

    <flux:modal name="create-payment" class="md:w-96">
        <form wire:submit.prevent='storePayment'>
            <div class="space-y-3">
                <div>
                    <flux:heading size="lg">Add new payment</flux:heading>
                    <flux:text class="mt-2">Add new payment to your bayronon monitoring system.</flux:text>
                </div>

                <flux:input label="Title" placeholder="Enter title" wire:model='title' />

                <flux:input label="Description" placeholder="Enter description" wire:model='description' />

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
