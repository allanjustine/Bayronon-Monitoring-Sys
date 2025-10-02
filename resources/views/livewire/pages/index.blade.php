<div>
    <div class="flex justify-between p-5">
        <div class="flex gap-4 items-center ml-5">
            <img src="{{ asset('logo/no-money.png') }}" alt="Logo" class="w-12 h-12" />
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white hidden md:block">Mga naay bayronon</h1>
        </div>
        <div class="flex gap-2 items-center">
            <flux:input type="search" placeholder="Search..." wire:model.live.debounce.500ms="search" />
            <livewire:pages.add-utang />
        </div>
    </div>
    <div class="w-full overflow-y-auto h-[calc(100vh-90px)] pt-5 px-5">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-5">
            @each('livewire.pages.list', $this->employees, 'employee', 'livewire.pages.empty')
        </div>
        <footer class="bg-gray-700 p-5 w-full mt-5">
            <div class="w-full flex justify-center flex-col items-center text-sm">
                <p>&copy; {{ date('Y') }} mga naay bayronon.</p>
                <a href="{{ route('login') }}" wire:navigate class="text-blue-500 hover:text-blue-500 hover:underline">Login</a>
            </div>
        </footer>
    </div>
</div>
