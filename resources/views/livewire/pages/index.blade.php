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
        <div class="flex justify-end mb-1">
            <div class="flex gap-1">
                <flux:button type="button" wire:click="handleFilter('is_utangan')"
                    class="{{ $this->is_utangan ? 'bg-blue-600!' : 'bg-blue-500!' }}" variant="ghost">
                    {{ $this->is_utangan ? 'Clear filter' : 'Filter by utangan' }}</flux:button>
                <flux:button type="button" wire:click="handleFilter('is_kuwangan')"
                    class="{{ $this->is_kuwangan ? 'bg-blue-600!' : 'bg-blue-500!' }}" variant="ghost">
                    {{ $this->is_kuwangan ? 'Clear filter' : 'Filter by kuwangan' }}</flux:button>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-5">
            @foreach (range(1, 10) as $item)
                <div class="w-full" wire:loading wire:target='handleFilter,search'>
                    <flux:card class="bg-white dark:bg-gray-800" wire:key='{{ $item }}'>
                        <div class="flex flex-col gap-6">
                            <div class="flex gap-12">
                                <div>
                                    <flux:skeleton class="w-42 h-7"></flux:skeleton>

                                    <flux:skeleton size="xl" class="mt-2 tabular-nums"></flux:skeleton>
                                </div>

                                <div>
                                    <flux:skeleton class="w-22"></flux:skeleton>

                                    <flux:skeleton size="lg" class="mt-2 tabular-nums"></flux:skeleton>
                                </div>
                            </div>
                            <div class="flex justify-between h-18 gap-1">

                                <flux:skeleton animate="shimmer" class="aspect-[4/1] size-full rounded-lg" />


                                <flux:skeleton animate="shimmer" class="aspect-[4/1] size-full rounded-lg" />
                            </div>

                            <flux:skeleton animate="shimmer" class="aspect-[4/1] size-full h-12 rounded-lg" />
                        </div>
                    </flux:card>
                </div>
            @endforeach
            @forelse ($this->employees as $employee)
                @include('livewire.pages.list', [$employee, $amount])
            @empty
                @include('livewire.pages.empty')
            @endforelse
        </div>
        <footer class="bg-gray-50 dark:bg-gray-800 p-5 w-full mt-5">
            <div class="flex flex-col items-center justify-center space-y-2 text-sm">
                <p class="text-gray-600 dark:text-gray-400">
                    &copy; {{ date('Y') }} mga naay bayronon.
                </p>

                @auth
                    <a href="{{ route('dashboard') }}" wire:navigate
                        class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 hover:underline transition-colors">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" wire:navigate
                        class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 hover:underline transition-colors">
                        Login
                    </a>
                @endauth
            </div>
        </footer>
    </div>
</div>
