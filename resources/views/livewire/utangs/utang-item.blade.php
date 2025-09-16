<tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-150" wire:key="{{ $utang->id }}">
    <td class="px-6 py-4 whitespace-nowrap">
        <span class="text-sm font-medium text-gray-900 dark:text-white">{{ $utang->employee->name }}</span>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <span class="text-sm text-gray-900 dark:text-white">{{ $utang->amount }}</span>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <flux:badge color="{{ $utang->isZeroUtang() ? 'green' : 'red' }}">
            {{ $utang->isZeroUtang() ? 'No Utang' : 'Utangan' }}</flux:badge>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
        {{ $utang->created_at->format('M d, Y h:i A') }}
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
        <div class="flex gap-2">
            <livewire:utangs.edit :$utang :key="'edit-' . $utang->id" />
            <livewire:utangs.delete :$utang :key="'delete-' . $utang->id" />
        </div>
    </td>
</tr>
