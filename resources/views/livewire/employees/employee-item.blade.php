<tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-150" wire:key="{{ $employee->id }}">
    <td class="px-6 py-4 whitespace-nowrap">
        <span class="text-sm font-medium text-gray-900 dark:text-white">{{ $employee->name }}</span>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <span class="text-sm text-gray-900 dark:text-white">{{ $employee->position }}</span>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <span class="text-sm text-gray-900 dark:text-white">{{ $employee->department }}</span>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <span
            class="text-sm text-gray-900 dark:text-white">₱{{ number_format($employee->totalBillings($this->totalPayments), '2', '.', ',') }}</span>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        @if ($employee->isPaid($employee->totalBillings($this->totalPayments)))
            <span class="bg-green-600 font-bold text-sm text-green-100 px-2 py-1 rounded-md">Paid</span>
        @else
            <span class="bg-red-600 font-bold text-sm text-red-100 px-2 py-1 rounded-md">Utangan pa</span>
        @endif
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
        {{ $employee->created_at->format('M d, Y h:i A') }}
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
        <div class="flex gap-2">
            <livewire:employees.edit :$employee :key="'edit-' . $employee->id" />
            <livewire:employees.delete :$employee :key="'delete-' . $employee->id" />
            <a wire:navigate href="{{ route('payments.show', $employee->id) }}"
                class="text-sm text-white py-1.5 px-3 cursor-pointer items-center flex bg-yellow-500 hover:bg-yellow-600 rounded-md">Add
                Billings</a>
        </div>
    </td>
</tr>
