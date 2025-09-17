<div wire:key='{{ $employee->id }}'>
    <flux:modal.trigger name="show-employee-details-{{ $employee->id }}" class="cursor-pointer">
        <div
            class="bg-dark-200 border border-dark-400 p-6 rounded-2xl shadow-lg card-hover dark:bg-gray-700 dark:hover:bg-gray-800 hover:scale-105 transition-all duration-300 ease-in-out">
            <div class="flex justify-between items-start mb-4">
                <div class="flex flex-col">
                    <h2 class="text-lg font-semibold text-gray-700 dark:text-white">{{ $employee->name }}</h2>
                    <span class="text-xs text-gray-500 dark:text-gray-200">{{ $employee->position }}</span>
                    <span class="text-xs text-gray-500 dark:text-gray-200">{{ $employee->department }}</span>
                </div>
                <div class="p-2 rounded-lg bg-dark-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-accent-purple" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
            <div class="flex gap-2">
                <p class="dark:text-gray-300 text-gray-600 mb-1 font-bold">Bayronon:</p>
                <p class="stat-value from-accent-green to-accent-blue font-bold">
                    ₱{{ number_format($employee->totalBillings($this->totalPayments), '2', '.', ',') }}
                </p>
            </div>
            <div class="flex gap-2">
                <p class="dark:text-gray-300 text-gray-600 mb-1 font-bold">Bayronon Status:</p>
                <p class="stat-value from-accent-green to-accent-blue font-bold">
                    @if ($employee->isPaid($employee->totalBillings($this->totalPayments)))
                        <span class="bg-green-600 font-bold text-sm text-green-100 px-2 py-1 rounded-md">Paid</span>
                    @else
                        <span class="bg-red-600 font-bold text-sm text-red-100 px-2 py-1 rounded-md">Kuwangan pa</span>
                    @endif
                </p>
            </div>
            <div class="mt-4 pt-4 border-t border-dark-300">
                <p class="dark:text-gray-300 text-gray-600 flex gap-2">
                    <span class='font-bold'>
                        Utang:
                    </span>
                    @if ($employee?->utangs?->isZeroUtang() || !$employee?->utangs)
                        <span class="bg-green-600 font-bold text-sm text-green-100 px-2 py-1 rounded-md">No Utang</span>
                    @else
                        <span
                            class="font-medium text-gray-700 dark:text-white">₱{{ number_format($employee?->utangs?->amount, '2', '.', ',') }}
                        </span>
                    @endif
                </p>
            </div>
        </div>
    </flux:modal.trigger>

    <flux:modal name="show-employee-details-{{ $employee->id }}" class="w-full sm:w-10/12">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">{{ $employee->name }} bayronon details...</flux:heading>
                <flux:text class="mt-2">Showing all {{ $employee->name }} bayronons.</flux:text>
            </div>

            <div class="max-h-[600px] overflow-y-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700 sticky top-0">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:dark:text-gray-300 text-gray-600 uppercase tracking-wider">
                                Title
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:dark:text-gray-300 text-gray-600 uppercase tracking-wider">
                                Description
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:dark:text-gray-300 text-gray-600 uppercase tracking-wider">
                                Paid
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:dark:text-gray-300 text-gray-600 uppercase tracking-wider">
                                Paid At
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @each('livewire.pages.billing-list', $employee->payments, 'billing', 'livewire.pages.billing-empty')
                        @if ($employee->payments_sum_employee_paymentsamount > 0)
                            <tr class="bg-gray-100 dark:bg-gray-700 sticky bottom-0">
                                <td colspan="2" class="px-6 py-4 whitespace-nowrap text-end font-bold">
                                    Total:
                                </td>
                                <td colspan="3" class="px-6 py-4 whitespace-nowrap">
                                    ₱{{ number_format($employee->payments_sum_employee_paymentsamount, '2', '.', ',') }}
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <div class="flex">
                <flux:spacer />
                <flux:modal.close>
                    <flux:button variant="outline">Close</flux:button>
                </flux:modal.close>
            </div>
        </div>
    </flux:modal>

</div>
