<div wire:key='{{ $employee->id }}'>
    <flux:modal.trigger name="show-employee-details-{{ $employee->id }}">
        <div
            class="group relative bg-white dark:bg-gray-800 rounded-2xl shadow-sm hover:shadow-xl border border-gray-200 dark:border-gray-700 transition-all duration-300 hover:-translate-y-1 cursor-pointer overflow-hidden">
            <!-- Gradient Accent Line -->
            <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-blue-500 to-purple-600"></div>

            <div class="p-6">
                <!-- Header Section -->
                <div class="flex items-start justify-between mb-4">
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-1">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">{{ $employee->name }}</h3>
                            <flux:badge color="gray" size="sm" icon="briefcase">{{ $employee->position }}
                            </flux:badge>
                        </div>
                        <div class="flex items-center gap-2 text-sm">
                            <flux:icon name="building-office" class="w-4 h-4 text-gray-400" />
                            <span class="text-gray-600 dark:text-gray-300">{{ $employee->department }}</span>
                        </div>
                    </div>

                    <!-- Avatar/Icon with Gradient Background -->
                    <div class="relative">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl blur opacity-20 group-hover:opacity-30 transition-opacity">
                        </div>
                        <div class="relative p-3 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl">
                            <flux:icon name="user-circle" class="w-8 h-8 text-white" />
                        </div>
                    </div>
                </div>

                <!-- Stats Grid -->
                <div class="grid grid-cols-2 gap-4 mt-4">
                    <!-- Total Billings -->
                    <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-3">
                        <span
                            class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Bayronon</span>
                        <div class="mt-1 flex items-baseline gap-1">
                            <span class="text-2xl font-bold text-gray-900 dark:text-white">₱</span>
                            <span
                                class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                                {{ number_format($employee->totalBillings($this->totalPayments), 2, '.', ',') }}
                            </span>
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-3">
                        <span
                            class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Status</span>
                        <div class="mt-2">
                            @if ($employee->isPaid($employee->totalBillings($this->totalPayments)))
                                <flux:badge color="green" icon="check-circle" size="sm" class="gap-1">Paid
                                </flux:badge>
                            @else
                                <flux:badge color="red" icon="exclamation-triangle" size="sm" class="gap-1">
                                    Kuwangan pa</flux:badge>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Utang Section -->
                <div class="mt-4 pt-4 border-t border-gray-100 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-600 dark:text-gray-300">Utang sa tindahan</span>
                        @if ($employee?->utangs?->isZeroUtang() || !$employee?->utangs)
                            <flux:badge color="green" icon="check" size="sm">No Utang</flux:badge>
                        @else
                            <span class="text-lg font-bold text-red-500 dark:text-red-400">
                                ₱{{ number_format($employee?->utangs?->amount, 2, '.', ',') }}
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Hover Indicator -->
            <div
                class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-500 to-purple-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300">
            </div>
        </div>
    </flux:modal.trigger>

    <flux:modal name="show-employee-details-{{ $employee->id }}" class="sm:max-w-5xl">
        <div class="space-y-8">
            <!-- Modal Header -->
            <div class="flex items-start justify-between">
                <div>
                    <div class="flex items-center gap-3 mb-2">
                        <div class="p-2 bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg">
                            <flux:icon name="receipt-percent" class="w-5 h-5 text-white" />
                        </div>
                        <flux:heading size="xl">{{ $employee->name }}</flux:heading>
                    </div>
                    <flux:text class="text-gray-600 dark:text-gray-400">
                        Showing all payment records and transactions
                    </flux:text>
                </div>

                <!-- Utang Summary Badge -->
                <div class="flex items-center gap-2">
                    <flux:badge color="gray" icon="building-office">{{ $employee->department }}</flux:badge>
                    <flux:badge color="gray" icon="briefcase">{{ $employee->position }}</flux:badge>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="grid grid-cols-4 gap-4">
                <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                    <span class="text-sm text-gray-500 dark:text-gray-400">Total Paid</span>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white mt-1">
                        ₱{{ number_format($employee->payments_sum_employee_paymentsamount ?? 0, 2, '.', ',') }}
                    </p>
                </div>
                <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                    <span class="text-sm text-gray-500 dark:text-gray-400">Remaining Balance</span>
                    <p class="text-2xl font-bold text-red-500 mt-1">
                        ₱{{ number_format($employee->totalBillings($this->totalPayments), 2, '.', ',') }}
                    </p>
                </div>
                <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                    <span class="text-sm text-gray-500 dark:text-gray-400">Total Billings</span>
                    <p class="text-2xl font-bold text-purple-500 mt-1">
                        ₱{{ number_format($employee->totalBillings($this->totalPayments) + ($employee->payments_sum_employee_paymentsamount ?? 0), 2, '.', ',') }}
                    </p>
                </div>
                <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                    <span class="text-sm text-gray-500 dark:text-gray-400">Store Utang</span>
                    @if ($employee?->utangs?->isZeroUtang() || !$employee?->utangs)
                        <flux:badge color="green" size="sm" class="mt-2">No Utang</flux:badge>
                    @else
                        <p class="text-2xl font-bold text-orange-500 mt-1">
                            ₱{{ number_format($employee?->utangs?->amount, 2, '.', ',') }}
                        </p>
                    @endif
                </div>
            </div>

            <!-- Payments Table -->
            <div class="bg-gray-50 dark:bg-gray-800/50 rounded-xl p-6">
                <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Payment History</h4>
                <div class="max-h-[400px] overflow-y-auto rounded-lg border border-gray-200 dark:border-gray-700">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-100 dark:bg-gray-800 sticky top-0">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Title</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Description</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Amount</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Date</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-800">
                            @each('livewire.pages.billing-list', $employee->payments, 'billing', 'livewire.pages.billing-empty')
                        </tbody>
                        <tfoot class="sticky bottom-0 bg-gray-100 dark:bg-gray-800">
                            @if ($employee->payments_sum_employee_paymentsamount > 0)
                                <tr>
                                    <td colspan="2" class="px-6 py-3 text-right font-semibold">Total Paid:</td>
                                    <td class="px-6 py-3 font-bold text-green-600 dark:text-green-400">
                                        ₱{{ number_format($employee->payments_sum_employee_paymentsamount, 2, '.', ',') }}
                                    </td>
                                    <td></td>
                                </tr>
                            @endif
                            @if ($employee->totalBillings($this->totalPayments) > 0)
                                <tr>
                                    <td colspan="2" class="px-6 py-3 text-right font-semibold">Remaining Balance:
                                    </td>
                                    <td class="px-6 py-3 font-bold text-red-600 dark:text-red-400">
                                        ₱{{ number_format($employee->totalBillings($this->totalPayments), 2, '.', ',') }}
                                        <flux:tooltip position="right" toggleable>
                                            <flux:button size="xs" icon="information-circle" variant="ghost"
                                                wire:click="remainingBillings({{ $employee->id }})"
                                                class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors" />

                                            <flux:tooltip.content
                                                class="!w-[300px] !max-w-[350px] !p-4 !bg-white dark:!bg-gray-800 !shadow-xl !rounded-xl !border !border-gray-200 dark:!border-gray-700">
                                                <!-- Header with Gradient -->
                                                <div class="flex items-center gap-2 mb-3">
                                                    <div
                                                        class="p-1.5 bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg">
                                                        <flux:icon name="chart-pie" class="w-4 h-4 text-white" />
                                                    </div>
                                                    <div>
                                                        <h4 class="font-bold text-gray-900 dark:text-white">Remaining
                                                            Balance</h4>
                                                        <p class="text-xs text-gray-500 dark:text-gray-400">Unpaid
                                                            items breakdown</p>
                                                    </div>
                                                </div>

                                                <flux:separator class="my-2" />

                                                <!-- Items List with better spacing and visual feedback -->
                                                <div
                                                    class="space-y-3 max-h-[250px] overflow-y-auto pr-1 custom-scrollbar">
                                                    @forelse ($this->items as $item)
                                                        <div
                                                            class="group/item p-2 hover:bg-gray-50 dark:hover:bg-gray-700/50 rounded-lg transition-all">
                                                            <div class="flex items-start justify-between gap-2">
                                                                <div class="flex-1 min-w-0">
                                                                    <div class="flex items-center gap-1.5">
                                                                        <span
                                                                            class="w-1.5 h-1.5 bg-red-500 rounded-full"></span>
                                                                        <span
                                                                            class="font-semibold text-sm text-gray-700 dark:text-gray-200 truncate"
                                                                            title="{{ $item->title }}">
                                                                            {{ Str::limit($item->title, 20) }}
                                                                        </span>
                                                                    </div>

                                                                    <!-- Amount Details -->
                                                                    <div class="mt-1.5 grid grid-cols-2 gap-2 text-xs">
                                                                        <div>
                                                                            <span
                                                                                class="text-gray-500 dark:text-gray-400">Total:</span>
                                                                            <span
                                                                                class="ml-1 font-medium text-gray-700 dark:text-gray-300">
                                                                                ₱{{ number_format($item->amount, 2, '.', ',') }}
                                                                            </span>
                                                                        </div>
                                                                        <div>
                                                                            <span
                                                                                class="text-gray-500 dark:text-gray-400">Paid:</span>
                                                                            <span
                                                                                class="ml-1 font-medium text-green-600 dark:text-green-400">
                                                                                ₱{{ number_format($item->paid_total ?? 0, 2, '.', ',') }}
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- Remaining Amount Badge -->
                                                                <div class="flex-shrink-0">
                                                                    @php
                                                                        $remaining =
                                                                            $item->amount - ($item->paid_total ?? 0);
                                                                    @endphp
                                                                    <span
                                                                        class="inline-flex items-center px-2 py-1 bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-300 text-xs font-bold rounded-md">
                                                                        ₱{{ number_format($remaining, 2, '.', ',') }}
                                                                    </span>
                                                                </div>
                                                            </div>

                                                            <!-- Progress Bar -->
                                                            @php
                                                                $percentage =
                                                                    $item->amount > 0
                                                                        ? (($item->paid_total ?? 0) / $item->amount) *
                                                                            100
                                                                        : 0;
                                                            @endphp
                                                            <div class="mt-2">
                                                                <div
                                                                    class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-1.5">
                                                                    <div class="bg-gradient-to-r from-blue-500 to-purple-600 h-1.5 rounded-full transition-all duration-300"
                                                                        style="width: {{ $percentage }}%"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @empty
                                                        <div class="text-center py-6">
                                                            <div
                                                                class="inline-flex p-2 bg-gray-100 dark:bg-gray-700 rounded-full mb-2">
                                                                <flux:icon name="check-circle"
                                                                    class="w-5 h-5 text-gray-400" />
                                                            </div>
                                                            <p class="text-sm text-gray-600 dark:text-gray-300">No
                                                                remaining items</p>
                                                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                                                All bills are paid</p>
                                                        </div>
                                                    @endforelse
                                                </div>

                                                <!-- Footer Summary -->
                                                @if (count($this->items) > 0)
                                                    <div
                                                        class="mt-3 pt-3 border-t border-gray-200 dark:border-gray-700">
                                                        <div class="flex items-center justify-between">
                                                            <span
                                                                class="text-xs font-medium text-gray-600 dark:text-gray-400">Total
                                                                Remaining:</span>
                                                            <span
                                                                class="text-sm font-bold text-red-600 dark:text-red-400">
                                                                ₱{{ number_format(collect($this->items)->sum(fn($item) => $item->amount - ($item->paid_total ?? 0)), 2, '.', ',') }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                @endif
                                            </flux:tooltip.content>
                                        </flux:tooltip>
                                    </td>
                                    <td></td>
                                </tr>
                            @endif
                        </tfoot>
                    </table>
                </div>
            </div>

            <!-- Add Utang Form -->
            <div class="bg-gradient-to-r from-blue-50 to-purple-50 dark:from-gray-800 dark:to-gray-800 rounded-xl p-6">
                <div class="flex items-center gap-3 mb-4">
                    <div class="p-2 bg-blue-500 rounded-lg">
                        <flux:icon name="plus" class="w-4 h-4 text-white" />
                    </div>
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Add Store Utang</h4>
                </div>

                <form wire:submit='storeUtang({{ $employee->id }})'
                    wire:confirm="Sure naka nga mag add kag utang balig {{ $amount }}?"
                    class="flex items-end gap-4">
                    <div class="flex-1">
                        <flux:label>Enter Amount</flux:label>
                        <div class="relative mt-1">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-500">₱</span>
                            <flux:input type="number" placeholder="0.00" wire:model.live.debounce.500ms="amount"
                                class="pl-8" />
                        </div>
                        @error('amount')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <flux:button type="submit" variant="primary" color="blue" wire:target='amount'
                        wire:loading.attr='disabled'>
                        <div class="flex gap-1 items-center">
                            <flux:icon name="plus" class="w-4 h-4" />
                            <span>Add Utang</span>
                        </div>
                    </flux:button>
                </form>
            </div>

            <!-- Modal Footer -->
            <div class="flex justify-end pt-4 border-t border-gray-200 dark:border-gray-700">
                <flux:modal.close>
                    <flux:button variant="ghost" size="sm">Close</flux:button>
                </flux:modal.close>
            </div>
        </div>
    </flux:modal>
</div>
