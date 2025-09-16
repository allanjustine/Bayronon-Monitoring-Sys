<div>
    <flux:modal.trigger name="edit-utang-{{ $id }}">
        <flux:button class="!bg-blue-500 hover:!bg-blue-600">Edit</flux:button>
    </flux:modal.trigger>

    <flux:modal name="edit-utang-{{ $id }}" class="md:w-96">
        <form wire:submit.prevent='updateUtang'>
            <div class="space-y-3">
                <div>
                    <flux:heading size="lg">Edit utang</flux:heading>
                    <flux:text class="mt-2 text-wrap">Edit {{ $utangan }} utang to your bayronon monitoring
                        system.
                    </flux:text>
                </div>

                <flux:input label="Amount" type="number" placeholder="Enter amount" wire:model='amount' />

                <div class="flex gap-2">
                    <flux:spacer />


                    <flux:modal.close>
                        <flux:button variant="ghost">Cancel</flux:button>
                    </flux:modal.close>
                    <flux:button type="submit" variant="primary">Update</flux:button>
                </div>
            </div>
        </form>
    </flux:modal>
</div>
