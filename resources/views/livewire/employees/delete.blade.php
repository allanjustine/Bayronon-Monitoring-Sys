<div>
    <flux:modal.trigger name="delete-employee-{{ $employee->id }}">
        <flux:button variant="danger">Delete</flux:button>
    </flux:modal.trigger>

    <flux:modal name="delete-employee-{{ $employee->id }}" class="min-w-[22rem]">
        <form wire:submit.prevent='deleteEmployee'>
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Delete employee?</flux:heading>

                    <flux:text class="mt-2">
                        <p>You're about to delete this employee "{{ $employee->name }}".</p>
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
