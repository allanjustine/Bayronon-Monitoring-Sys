<div class="min-h-screen">
    <div class="px-4 py-8">
        <h1 class="text-3xl font-bold mb-8">Dashboard</h1>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
            <!-- Employee Card -->
            <div class="stat-card bg-white dark:bg-gray-800 rounded-xl p-6 shadow-md hover:shadow-lg">
                <div
                    class="w-12 h-12 rounded-lg bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center text-blue-500 mb-4">
                    <i class="fas fa-users text-xl"></i>
                </div>
                <div class="text-3xl font-bold mb-1">{{ $this->totals['totalEmployees'] }}</div>
                <div class="text-gray-500 dark:text-gray-400 font-medium">Total Employees</div>
            </div>

            <!-- Payments Card -->
            <div class="stat-card bg-white dark:bg-gray-800 rounded-xl p-6 shadow-md hover:shadow-lg">
                <div
                    class="w-12 h-12 rounded-lg bg-teal-100 dark:bg-teal-900/30 flex items-center justify-center text-teal-500 mb-4">
                    <i class="fas fa-credit-card text-xl"></i>
                </div>
                <div class="text-3xl font-bold mb-1">{{ $this->totals['totalPayments'] }}</div>
                <div class="text-gray-500 dark:text-gray-400 font-medium">Total Payments</div>
            </div>

            <!-- Utangs Card -->
            <div class="stat-card bg-white dark:bg-gray-800 rounded-xl p-6 shadow-md hover:shadow-lg">
                <div
                    class="w-12 h-12 rounded-lg bg-amber-100 dark:bg-amber-900/30 flex items-center justify-center text-amber-500 mb-4">
                    <i class="fas fa-exclamation-triangle text-xl"></i>
                </div>
                <div class="text-3xl font-bold mb-1">{{ $this->totals['totalUtangs'] }}</div>
                <div class="text-gray-500 dark:text-gray-400 font-medium">Total Has Utangs</div>
            </div>

            <!-- Amount Card -->
            <div class="stat-card bg-white dark:bg-gray-800 rounded-xl p-6 shadow-md hover:shadow-lg">
                <div
                    class="w-12 h-12 rounded-lg bg-rose-100 dark:bg-rose-900/30 flex items-center justify-center text-rose-500 mb-4">
                    <i class="fas fa-money-bill-wave text-xl"></i>
                </div>
                <div class="text-3xl font-bold mb-1">
                    ₱{{ number_format($this->totals['totalAmountOfUtang'], '2', '.', ',') }}</div>
                <div class="text-gray-500 dark:text-gray-400 font-medium">Total Amount of Utangs</div>
            </div>

            <!-- Payments Amount Card -->
            <div class="stat-card bg-white dark:bg-gray-800 rounded-xl p-6 shadow-md hover:shadow-lg">
                <div
                    class="w-12 h-12 rounded-lg bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center text-blue-500 mb-4">
                    <i class="fas fa-money-bill-wave text-xl"></i>
                </div>
                <div class="flex gap-1 mb-1 items-center">
                    <div class="text-3xl font-bold">
                        ₱{{ number_format($this->totals['totalAmountOfPayments'], '2', '.', ',') }}
                    </div>
                    <span
                        class="flex flex-col gap-1 text-xs dark:text-gray-300 text-gray-500 border-l border-r px-1 py-2 rounded-xl">
                        <span>₱{{ number_format($this->totals['totalAmountOfPaymentsToPayLeft'], '2', '.', ',') }}</span>
                        <span>Total amount of payments not paid</span>
                    </span>
                </div>
                <div class="text-gray-500 dark:text-gray-400 font-medium">Total Amount of Payments</div>
            </div>

            <!-- Payments Amount Card -->
            <div class="stat-card bg-white dark:bg-gray-800 rounded-xl p-6 shadow-md hover:shadow-lg">
                <div
                    class="w-12 h-12 rounded-lg bg-violet-100 dark:bg-violet-900/30 flex items-center justify-center text-violet-500 mb-4">
                    <i class="fas fa-money-bill-wave text-xl"></i>
                </div>
                <div class="text-3xl font-bold mb-1">
                    ₱{{ number_format($this->totals['totalAmountOfPaymentsToPay'], '2', '.', ',') }}</div>
                <div class="text-gray-500 dark:text-gray-400 font-medium">Total Amount of Payments To Pay</div>
            </div>
        </div>

        <!-- Charts & Activity -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Payment Trends Chart -->
            <div class="lg:col-span-2 bg-white dark:bg-gray-800 rounded-xl p-6 shadow-md">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-semibold">Payment Trends</h3>
                    <button class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                </div>
                <div
                    class="chart-placeholder h-64 rounded-lg flex items-center justify-center text-primary dark:text-blue-400 font-medium">
                    <i class="fas fa-chart-line mr-2"></i> Payment Activity Chart
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-md">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-semibold">Recent Activity</h3>
                    <button class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                </div>
                <div class="space-y-5">
                    <!-- Activity Item 1 -->
                    <div class="flex items-start">
                        <div
                            class="w-10 h-10 rounded-full bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center text-blue-500 mr-3 mt-1">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <div>
                            <div class="font-medium">New employee added</div>
                            <div class="text-sm text-gray-500 dark:text-gray-400">2 hours ago</div>
                        </div>
                    </div>

                    <!-- Activity Item 2 -->
                    <div class="flex items-start">
                        <div
                            class="w-10 h-10 rounded-full bg-teal-100 dark:bg-teal-900/30 flex items-center justify-center text-teal-500 mr-3 mt-1">
                            <i class="fas fa-money-check"></i>
                        </div>
                        <div>
                            <div class="font-medium">Payment processed</div>
                            <div class="text-sm text-gray-500 dark:text-gray-400">5 hours ago</div>
                        </div>
                    </div>

                    <!-- Activity Item 3 -->
                    <div class="flex items-start">
                        <div
                            class="w-10 h-10 rounded-full bg-amber-100 dark:bg-amber-900/30 flex items-center justify-center text-amber-500 mr-3 mt-1">
                            <i class="fas fa-exclamation-circle"></i>
                        </div>
                        <div>
                            <div class="font-medium">Utang status updated</div>
                            <div class="text-sm text-gray-500 dark:text-gray-400">Yesterday</div>
                        </div>
                    </div>

                    <!-- Activity Item 4 -->
                    <div class="flex items-start">
                        <div
                            class="w-10 h-10 rounded-full bg-rose-100 dark:bg-rose-900/30 flex items-center justify-center text-rose-500 mr-3 mt-1">
                            <i class="fas fa-chart-pie"></i>
                        </div>
                        <div>
                            <div class="font-medium">Financial report generated</div>
                            <div class="text-sm text-gray-500 dark:text-gray-400">2 days ago</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
