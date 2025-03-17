<x-layouts.app title="Dashboard">
    <div class="container">
        <h2 class="text-2xl font-bold text-white">Subscriptions View</h2>

        <!-- Search and Filters -->
        <div class="my-4 flex flex-wrap gap-4">
            <!-- Search Input for User ID -->
            <form action="{{ route('packages.index') }}" method="GET" class="flex-grow">
                <input type="text" name="search" placeholder="Search by User ID" value="{{ request('search') }}" class="px-4 py-2 rounded-lg bg-gray-700 text-white w-full max-w-xs">
            </form>

            <!-- Filter Dropdowns -->
            <div class="flex flex-wrap gap-4">
                <!-- Sort by Created At (DSC) -->
                <form action="{{ route('packages.index') }}" method="GET">
                    <select name="sort" onchange="this.form.submit()" class="px-4 py-2 rounded-lg bg-gray-700 text-white">
                        <option value="">Sort By</option>
                        <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Newest First</option>
                        <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Oldest First</option>
                    </select>
                </form>

                <!-- Filter by Status -->
                <form action="{{ route('packages.index') }}" method="GET">
                    <select name="status" onchange="this.form.submit()" class="px-4 py-2 rounded-lg bg-gray-700 text-white">
                        <option value="">All Statuses</option>
                        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </form>

                <!-- Filter by Package Slug -->
                <form action="{{ route('packages.index') }}" method="GET">
                    <select name="package_slug" onchange="this.form.submit()" class="px-4 py-2 rounded-lg bg-gray-700 text-white">
                        <option value="">All Packages</option>
                        @foreach($packageSlugs as $slug)
                            <option value="{{ $slug }}" {{ request('package_slug') == $slug ? 'selected' : '' }}>{{ $slug }}</option>
                        @endforeach
                    </select>
                </form>

                <!-- Filter by URL Count -->
                <form action="{{ route('packages.index') }}" method="GET">
                    <select name="url_count" onchange="this.form.submit()" class="px-4 py-2 rounded-lg bg-gray-700 text-white">
                        <option value="">All URL Counts</option>
                        <option value="1" {{ request('url_count') == '1' ? 'selected' : '' }}>1</option>
                        <option value="5" {{ request('url_count') == '5' ? 'selected' : '' }}>5</option>
                        <option value="10" {{ request('url_count') == '10' ? 'selected' : '' }}>10</option>
                    </select>
                </form>

                <!-- Filter by Priority -->
                <form action="{{ route('packages.index') }}" method="GET">
                    <select name="priority" onchange="this.form.submit()" class="px-4 py-2 rounded-lg bg-gray-700 text-white">
                        <option value="">All Priorities</option>
                        <option value="1" {{ request('priority') == '1' ? 'selected' : '' }}>High</option>
                        <option value="2" {{ request('priority') == '2' ? 'selected' : '' }}>Mid</option>
                        <option value="3" {{ request('priority') == '3' ? 'selected' : '' }}>Low</option>
                    </select>
                </form>

                <!-- Filter by Started At -->
                <form action="{{ route('packages.index') }}" method="GET">
                    <input type="date" name="started_at" value="{{ request('started_at') }}" onchange="this.form.submit()" class="px-4 py-2 rounded-lg bg-gray-700 text-white">
                </form>

                <!-- Filter by End At -->
                <form action="{{ route('packages.index') }}" method="GET">
                    <input type="date" name="end_at" value="{{ request('end_at') }}" onchange="this.form.submit()" class="px-4 py-2 rounded-lg bg-gray-700 text-white">
                </form>

                <!-- Reset Filters Button -->
                <a href="{{ route('packages.index') }}" class="px-4 py-2 rounded-lg bg-red-600 hover:bg-red-700 text-white">Reset Filters</a>
            </div>
        </div>

        <!-- Table -->
        <table class="min-w-full table-auto text-white mt-4 bg-gray-800 shadow-md rounded-lg">
            <thead class="bg-gray-900">
                <tr>
                    <th class="px-4 py-2">User Id</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Package Slug</th>
                    <th class="px-4 py-2">Url count</th>
                    <th class="px-4 py-2">Urls</th>
                    <th class="px-4 py-2">Priority</th>
                    <th class="px-4 py-2">Started At</th>
                    <th class="px-4 py-2">End At</th>
                    <th class="px-4 py-2">Last Checked</th>
                    <th class="px-4 py-2">Created At</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($packages as $package)
                <tr class="bg-gray-700 border-b border-gray-600">
                    <td class="px-4 py-2">{{ $package->user_id }}</td>
                    <td class="px-4 py-2">{{ $package->status ? 'Active' : 'Inactive' }}</td>
                    <td class="px-4 py-2">{{ $package->package_slug }}</td>
                    <td class="px-4 py-2">{{ $package->url_count }}</td>
                    <td class="px-4 py-2">{{ $package->urls }}</td>
                    <td class="px-4 py-2">
                        @if($package->priority == 1) High
                        @elseif($package->priority == 2) Mid
                        @elseif($package->priority == 3) Low
                        @endif
                    </td>
                    <td class="px-4 py-2">{{ $package->started_at }}</td>
                    <td class="px-4 py-2">{{ $package->end_at }}</td>
                    <td class="px-4 py-2">{{ $package->last_checked }}</td>
                    <td class="px-4 py-2">{{ $package->created_at }}</td>
                    <td class="px-4 py-2 flex space-x-2">
                        <a href="{{ route('packages.edit', $package->id) }}" class="btn btn-warning bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded">Edit</a>
                        <form action="{{ route('packages.destroy', $package->id) }}" method="POST" class="inline-block">
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
        <div class="mt-4">
            {{ $packages->links() }}
        </div>
    </div>
</x-layouts.app>