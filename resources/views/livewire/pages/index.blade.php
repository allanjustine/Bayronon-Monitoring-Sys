<div>
    <div class="flex justify-between p-5">
        <div>
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Mga naay bayronon</h1>
        </div>
        <div class="flex gap-2 items-center">
            <flux:input type="search" placeholder="Search..." wire:model.live.debounce.500ms="search" />
            <livewire:pages.add-utang />
        </div>
    </div>
    <div class="w-full overflow-y-auto h-[calc(100vh-80px)] p-5">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-5">
            @each('livewire.pages.list', $this->employees, 'employee', 'livewire.pages.empty')
        </div>
    </div>
</div>
