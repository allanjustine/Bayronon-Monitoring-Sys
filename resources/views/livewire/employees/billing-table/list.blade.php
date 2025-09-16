<tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-150" wire:key="{{ $billing->id }}">
    <td class="px-6 py-4 whitespace-nowrap">
        <span class="text-sm font-medium text-gray-900 dark:text-white">{{ $billing->title }}</span>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <span class="text-sm text-gray-900 dark:text-white">{{ $billing->description }}</span>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <span class="text-sm text-gray-900 dark:text-white">
            ₱{{ number_format($billing->amount, '2', '.', ',') }}
        </span>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <span class="text-sm text-gray-900 dark:text-white">
            @if ($billing->isNoBillings($billing->employee_payments_sum))
                <span class="bg-green-600 font-bold text-sm text-green-100 px-2 py-1 rounded-md">Paid</span>
            @else
                ₱{{ number_format($billing->employeeRemainingBillings($billing->employee_payments_sum), '2', '.', ',') }}
            @endif
        </span>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
        <div class="flex gap-2">
            @if ($billing->isNoBillings($billing->employee_payments_sum))
                -
            @else
                <livewire:employees.billing-table.pay :$billing :employee_id="$this->id" :remaining_billings="$billing->employeeRemainingBillings($billing->employee_payments_sum)" :key="'add-payment-' . $billing->id" />
            @endif
        </div>
    </td>
</tr>
