@extends('partials.admin.main')
@section('content')
    <main class="flex-1 overflow-y-auto p-4 bg-gray-100">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Dashboard Overview</h1>
            <p class="text-gray-600">Welcome back, Admin!</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <div class="bg-white p-6 rounded-lg shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500">Total Penduduk</p>
                        <h3 class="text-2xl font-bold">{{ $totalPenduduk }}</h3>
                    </div>
                    <div class="bg-blue-100 p-3 rounded-full">
                        <i class="fas fa-users text-blue-600"></i>
                    </div>
                </div>
                <p class="text-green-500 text-sm mt-2">
                    <i class="fas fa-arrow-up"></i> 12% from last month
                </p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500">Surat Pengajuan</p>
                        <h3 class="text-2xl font-bold">{{ $suratPengajuan }}</h3>
                    </div>
                    <div class="bg-green-100 p-3 rounded-full">
                        <i class="fas fa-box text-green-600"></i>
                    </div>
                </div>
                <p class="text-green-500 text-sm mt-2">
                    <i class="fas fa-arrow-up"></i> 5% from last month
                </p>
            </div>

            {{-- <div class="bg-white p-6 rounded-lg shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500">Total Orders</p>
                        <h3 class="text-2xl font-bold">2,430</h3>
                    </div>
                    <div class="bg-yellow-100 p-3 rounded-full">
                        <i class="fas fa-shopping-cart text-yellow-600"></i>
                    </div>
                </div>
                <p class="text-red-500 text-sm mt-2">
                    <i class="fas fa-arrow-down"></i> 3% from last month
                </p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500">Revenue</p>
                        <h3 class="text-2xl font-bold">$12,450</h3>
                    </div>
                    <div class="bg-purple-100 p-3 rounded-full">
                        <i class="fas fa-dollar-sign text-purple-600"></i>
                    </div>
                </div>
                <p class="text-green-500 text-sm mt-2">
                    <i class="fas fa-arrow-up"></i> 8% from last month
                </p>
            </div> --}}
        </div>

        {{-- <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
            <div class="bg-white p-6 rounded-lg shadow lg:col-span-2">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-bold text-lg">Sales Overview</h3>
                    <div class="flex space-x-2">
                        <button class="px-3 py-1 text-sm bg-blue-100 text-blue-600 rounded">
                            Monthly
                        </button>
                        <button class="px-3 py-1 text-sm text-gray-500 hover:bg-gray-100 rounded">
                            Yearly
                        </button>
                    </div>
                </div>
                <div class="h-64 bg-gray-100 rounded flex items-center justify-center">
                    <p class="text-gray-500">Chart will be displayed here</p>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="font-bold text-lg mb-4">Recent Activities</h3>
                <div class="space-y-4">
                    <div class="flex items-start">
                        <div class="bg-blue-100 p-2 rounded-full mr-3">
                            <i class="fas fa-user-plus text-blue-600 text-sm"></i>
                        </div>
                        <div>
                            <p class="font-medium">New user registered</p>
                            <p class="text-gray-500 text-sm">2 minutes ago</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="bg-green-100 p-2 rounded-full mr-3">
                            <i class="fas fa-shopping-cart text-green-600 text-sm"></i>
                        </div>
                        <div>
                            <p class="font-medium">New order received</p>
                            <p class="text-gray-500 text-sm">15 minutes ago</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="bg-yellow-100 p-2 rounded-full mr-3">
                            <i class="fas fa-box text-yellow-600 text-sm"></i>
                        </div>
                        <div>
                            <p class="font-medium">Low stock alert</p>
                            <p class="text-gray-500 text-sm">1 hour ago</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="bg-purple-100 p-2 rounded-full mr-3">
                            <i class="fas fa-truck text-purple-600 text-sm"></i>
                        </div>
                        <div>
                            <p class="font-medium">Order shipped</p>
                            <p class="text-gray-500 text-sm">3 hours ago</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Orders Table -->
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-bold text-lg">Recent Orders</h3>
                <button class="px-3 py-1 text-sm bg-blue-600 text-white rounded hover:bg-blue-700">
                    View All
                </button>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Order ID
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Customer
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Date
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Amount
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                #ORD-0001
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                John Doe
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                2023-06-15
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                $125.00
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Completed</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <button class="text-blue-600 hover:text-blue-900">
                                    View
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                #ORD-0002
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                Jane Smith
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                2023-06-14
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                $89.50
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Processing</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <button class="text-blue-600 hover:text-blue-900">
                                    View
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                #ORD-0003
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                Robert Johnson
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                2023-06-13
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                $245.75
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Shipped</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <button class="text-blue-600 hover:text-blue-900">
                                    View
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div> --}}
    </main>
@endsection
