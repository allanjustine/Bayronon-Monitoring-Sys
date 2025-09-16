<div>
    <flux:modal.trigger name="delete-utang-{{ $id }}">
        <flux:button variant="danger">Delete</flux:button>
    </flux:modal.trigger>

    <flux:modal name="delete-utang-{{ $id }}" class="min-w-[22rem]">
        <form wire:submit.prevent='deleteUtang'>
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Delete utang?</flux:heading>

                    <flux:text class="mt-2">
                        <p>You're about to delete this utang of "{{ $utangan }}" amount of {{ $amount }}.</p>
                        <p>This action cannot be reversed.</p>
                    </flux:text>
                </div>

                <div class="flex gap-2">
                    <flux:spacer />

                    <flux:modal.close>
                        <flux:button variant="ghost">Cancel</flux:button>
                    </flux:modal.close>

                    <flux:button type="submit" variant="danger">Delete</flux:button>
                </div>
            </div>
        </form>
    </flux:modal>
</div>
