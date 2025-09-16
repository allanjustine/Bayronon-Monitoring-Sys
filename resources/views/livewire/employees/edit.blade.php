<div>
    <flux:modal.trigger name="edit-employee-{{ $id }}">
        <flux:button class="!bg-blue-500 hover:!bg-blue-600">Edit</flux:button>
    </flux:modal.trigger>

    <flux:modal name="edit-employee-{{ $id }}" class="md:w-96">
        <form wire:submit.prevent='updateEmployee'>
            <div class="space-y-3">
                <div>
                    <flux:heading size="lg">Edit employee</flux:heading>
                    <flux:text class="mt-2 text-wrap">Edit {{ $name }} employee to your bayronon monitoring system.
                    </flux:text>
                </div>

                <flux:input label="Name" placeholder="Enter name" wire:model='name' />

                <flux:input label="Position" placeholder="Enter position" wire:model='position' />

                <flux:input label="Department" placeholder="Enter department" wire:model='department' />

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
