<tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-150" wire:key="{{ $payment->id }}">
    <td class="px-6 py-4 whitespace-nowrap">
        <span class="text-sm font-medium text-gray-900 dark:text-white">{{ $payment->title }}</span>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <span class="text-sm text-gray-900 dark:text-white">{{ $payment->description }}</span>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <span class="text-sm text-gray-900 dark:text-white">₱{{ number_format($payment->amount, '2', '.', ',') }}</span>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <span
            class="text-sm text-gray-900 dark:text-white">{{ $payment?->employees_count === 0 ? 'No billing(s).' : "{$payment?->employees_count} billing(s) record." }}</span>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
        {{ $payment->created_at->format('M d, Y h:i A') }}
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
        <div class="flex gap-2">
            <livewire:payments.edit :$payment :key="'edit-' . $payment->id" />
            <livewire:payments.delete :$payment :key="'delete-' . $payment->id" />
        </div>
    </td>
</tr>
