<div>
    <flux:modal.trigger name="create-utang">
        <flux:button>Add new utang</flux:button>
    </flux:modal.trigger>

    <flux:modal name="create-utang" class="md:w-96">
        <form wire:submit.prevent='storeUtang'>
            <div class="space-y-3">
                <div>
                    <flux:heading size="lg">Add new utang</flux:heading>
                    <flux:text class="mt-2">Add new utang to your bayronon monitoring system.</flux:text>
                </div>

                <flux:select size="sm" placeholder="Choose employee..." wire:model='employee'>
                    @forelse ($this->employees as $index => $employee)
                        <flux:select.option wire:key='{{ $index }}' value="{{ $employee->id }}">
                            {{ $employee->name }}</flux:select.option>
                    @empty
                        <flux:select.option disabled>No employees found</flux:select.option>
                    @endforelse
                </flux:select>
                <flux:error name="employee" />

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
