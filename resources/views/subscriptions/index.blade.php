<x-layouts.app title="Dashboard">
    <div class="container">
        <h2 class="text-2xl font-bold text-white mb-4">Subscriptions View</h2>

        <!-- Search and Filters -->
        <div class="bg-gray-800 p-6 rounded-lg shadow-md mb-6">
            <!-- Search Input -->
            <form id="searchForm" action="{{ route('subscriptions.index') }}" method="GET" class="mb-6">
                <div class="flex items-center gap-4">
                    <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}" class="px-4 py-2 rounded-lg bg-gray-700 text-white w-full">
                    <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">Search</button>
                    <a href="{{ route('subscriptions.index') }}" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg">Reset</a>
                </div>

                <!-- Checkboxes for Column Selection -->
                <div class="mt-4 grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="columns[]" value="user_id" {{ in_array('user_id', request('columns', [])) ? 'checked' : '' }} class="rounded bg-gray-700">
                        <span class="text-white">User ID</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="columns[]" value="email" {{ in_array('email', request('columns', [])) ? 'checked' : '' }} class="rounded bg-gray-700">
                        <span class="text-white">Email</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="columns[]" value="name" {{ in_array('name', request('columns', [])) ? 'checked' : '' }} class="rounded bg-gray-700">
                        <span class="text-white">Name</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="columns[]" value="phone" {{ in_array('phone', request('columns', [])) ? 'checked' : '' }} class="rounded bg-gray-700">
                        <span class="text-white">Phone</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="columns[]" value="country" {{ in_array('country', request('columns', [])) ? 'checked' : '' }} class="rounded bg-gray-700">
                        <span class="text-white">Country</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="columns[]" value="stripe_id" {{ in_array('stripe_id', request('columns', [])) ? 'checked' : '' }} class="rounded bg-gray-700">
                        <span class="text-white">Stripe ID</span>
                    </label>
                    <!-- Add more columns as needed -->
                </div>
            </form>

            <!-- Filters -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <select name="type" class="px-4 py-2 rounded-lg bg-gray-700 text-white w-full" form="searchForm">
                    <option value="">All Types</option>
                    <option value="monthly" {{ request('type') == 'monthly' ? 'selected' : '' }}>Monthly</option>
                    <option value="yearly" {{ request('type') == 'yearly' ? 'selected' : '' }}>Yearly</option>
                </select>
                <select name="stripe_status" class="px-4 py-2 rounded-lg bg-gray-700 text-white w-full" form="searchForm">
                    <option value="">All Stripe Statuses</option>
                    <option value="active" {{ request('stripe_status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ request('stripe_status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
                <select name="currency" class="px-4 py-2 rounded-lg bg-gray-700 text-white w-full" form="searchForm">
                    <option value="">All Currencies</option>
                    <option value="usd" {{ request('currency') == 'usd' ? 'selected' : '' }}>USD</option>
                    <option value="eur" {{ request('currency') == 'eur' ? 'selected' : '' }}>EUR</option>
                </select>
                <select name="package_slug" class="px-4 py-2 rounded-lg bg-gray-700 text-white w-full" form="searchForm">
                    <option value="">All Packages</option>
                    @foreach($packageSlugs as $slug)
                        <option value="{{ $slug }}" {{ request('package_slug') == $slug ? 'selected' : '' }}>{{ $slug }}</option>
                    @endforeach
                </select>
                <select name="payment_method" class="px-4 py-2 rounded-lg bg-gray-700 text-white w-full" form="searchForm">
                    <option value="">All Payment Methods</option>
                    <option value="card" {{ request('payment_method') == 'card' ? 'selected' : '' }}>Card</option>
                    <option value="paypal" {{ request('payment_method') == 'paypal' ? 'selected' : '' }}>PayPal</option>
                </select>
                <select name="payment_status" class="px-4 py-2 rounded-lg bg-gray-700 text-white w-full" form="searchForm">
                    <option value="">All Payment Statuses</option>
                    <option value="paid" {{ request('payment_status') == 'paid' ? 'selected' : '' }}>Paid</option>
                    <option value="unpaid" {{ request('payment_status') == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                </select>
                <input type="date" name="created_at" value="{{ request('created_at') }}" class="px-4 py-2 rounded-lg bg-gray-700 text-white w-full" form="searchForm">
            </div>
        </div>

        <!-- Table -->
        <table class="min-w-full table-auto text-white bg-gray-800 shadow-md rounded-lg">
            <thead class="bg-gray-900">
                <tr>
                    <th class="px-4 py-2">User Id</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Phone</th>
                    <th class="px-4 py-2">Country</th>
                    <th class="px-4 py-2">Type</th>
                    <th class="px-4 py-2">Stripe Id</th>
                    <th class="px-4 py-2">Session Id</th>
                    <th class="px-4 py-2">Stripe Status</th>
                    <th class="px-4 py-2">Stripe Price</th>
                    <th class="px-4 py-2">Currency</th>
                    <th class="px-4 py-2">Quantity</th>
                    <th class="px-4 py-2">Invoice Id</th>
                    <th class="px-4 py-2">Order Id</th>
                    <th class="px-4 py-2">Package Slug</th>
                    <th class="px-4 py-2">Payment Method</th>
                    <th class="px-4 py-2">Payment Status</th>
                    <th class="px-4 py-2">Subscription Id</th>
                    <th class="px-4 py-2">End At</th>
                    <th class="px-4 py-2">Created At</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subscriptions as $subscription)
                <tr class="bg-gray-700 border-b border-gray-600">
                    <td class="px-4 py-2">{{ $subscription->user_id }}</td>
                    <td class="px-4 py-2">{{ $subscription->email }}</td>
                    <td class="px-4 py-2">{{ $subscription->name }}</td>
                    <td class="px-4 py-2">{{ $subscription->phone }}</td>
                    <td class="px-4 py-2">{{ $subscription->country }}</td>
                    <td class="px-4 py-2">{{ $subscription->type }}</td>
                    <td class="px-4 py-2">{{ $subscription->stripe_id }}</td>
                    <td class="px-4 py-2">{{ $subscription->stripe_session_id }}</td>
                    <td class="px-4 py-2">{{ $subscription->stripe_status }}</td>
                    <td class="px-4 py-2">{{ $subscription->stripe_price }}</td>
                    <td class="px-4 py-2">{{ $subscription->currency }}</td>
                    <td class="px-4 py-2">{{ $subscription->quantity }}</td>
                    <td class="px-4 py-2">{{ $subscription->invoice_id }}</td>
                    <td class="px-4 py-2">{{ $subscription->order_id }}</td>
                    <td class="px-4 py-2">{{ $subscription->package_slug }}</td>
                    <td class="px-4 py-2">{{ $subscription->payment_method }}</td>
                    <td class="px-4 py-2">{{ $subscription->payment_status }}</td>
                    <td class="px-4 py-2">{{ $subscription->subscription }}</td>
                    <td class="px-4 py-2">{{ $subscription->ends_at }}</td>
                    <td class="px-4 py-2">{{ $subscription->created_at }}</td>
                    <td class="px-4 py-2 flex space-x-2">
                        <a href="{{ route('subscriptions.edit', $subscription->id) }}" class="btn btn-warning bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded">Edit</a>
                        <form action="{{ route('subscriptions.destroy', $subscription->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="mt-6">
            {{ $subscriptions->links() }}
        </div>
    </div>
</x-layouts.app>