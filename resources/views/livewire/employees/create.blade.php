<div>
    <flux:modal.trigger name="create-employee">
        <flux:button>Add new employee</flux:button>
    </flux:modal.trigger>

    <flux:modal name="create-employee" class="md:w-96">
        <form wire:submit.prevent='storeEmployee'>
            <div class="space-y-3">
                <div>
                    <flux:heading size="lg">Add new employee</flux:heading>
                    <flux:text class="mt-2">Add new employee to your bayronon monitoring system.</flux:text>
                </div>

                <flux:input label="Name" placeholder="Enter name" wire:model='name' />

                <flux:input label="Position" placeholder="Enter position" wire:model='position' />

                <flux:input label="Department" placeholder="Enter department" wire:model='department' />

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
