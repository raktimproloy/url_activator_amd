<x-layouts.app title="Dashboard">
    <div class="container">
        <h2 class="text-2xl font-bold text-white">Subscriptions View</h2>

        <!-- Search and Filters -->
        <div class="my-4 flex space-x-4">
            <!-- Search Input -->
            <form action="{{ route('users.index') }}" method="GET" class="flex-grow">
                <input type="text" name="search" placeholder="Search by name or email" value="{{ request('search') }}" class="px-4 py-2 rounded-lg bg-gray-700 text-white w-full">
            </form>

            <!-- Filter Dropdowns -->
            <div class="flex space-x-4">
                <!-- Sort by Created At -->
                <form action="{{ route('users.index') }}" method="GET">
                    <select name="sort" onchange="this.form.submit()" class="px-4 py-2 rounded-lg bg-gray-700 text-white">
                        <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Oldest First</option>
                        <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Newest First</option>
                    </select>
                </form>

                <!-- Filter by Status -->
                <form action="{{ route('users.index') }}" method="GET">
                    <select name="status" onchange="this.form.submit()" class="px-4 py-2 rounded-lg bg-gray-700 text-white">
                        <option value="">All Statuses</option>
                        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </form>
            </div>
        </div>

        <!-- Table -->
        <table class="min-w-full table-auto text-white mt-4 bg-gray-800 shadow-md rounded-lg">
            <thead class="bg-gray-900">
                <tr>
                    <th class="px-4 py-2">User Id</th>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Verified</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">P/M Id</th>
                    <th class="px-4 py-2">Stripe Id</th>
                    <th class="px-4 py-2">Created At</th>
                    <th class="px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="bg-gray-700 border-b border-gray-600">
                    <td class="px-4 py-2">{{ $user->id }}</td>
                    <td class="px-4 py-2">{{ $user->name }}</td>
                    <td class="px-4 py-2">{{ $user->email }}</td>
                    <td class="px-4 py-2">{{ $user->email_verified_at }}</td>
                    <td class="px-4 py-2">{{ $user->status }}</td>
                    <td class="px-4 py-2">{{ $user->package_manager_id }}</td>
                    <td class="px-4 py-2">{{ $user->stripe_id }}</td>
                    <td class="px-4 py-2">{{ $user->created_at }}</td>
                    <td class="px-4 py-2 flex space-x-2">
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded">Edit</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.app>