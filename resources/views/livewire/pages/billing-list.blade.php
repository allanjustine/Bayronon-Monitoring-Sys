<tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-150" wire:key="{{ $billing->id }}">
    <td class="px-6 py-4 whitespace-nowrap">
        <span class="text-sm font-medium text-gray-900 dark:text-white">{{ $billing->title }}</span>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <span class="text-sm text-gray-900 dark:text-white">{{ $billing->description }}</span>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <span class="text-sm text-gray-900 dark:text-white">
            ₱{{ number_format($billing->pivot->amount, '2', '.', ',') }}
        </span>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <span class="text-sm text-gray-900 dark:text-white">{{ $billing->pivot->created_at->format('M d, Y h:i A') }}</span>
    </td>
</tr>
