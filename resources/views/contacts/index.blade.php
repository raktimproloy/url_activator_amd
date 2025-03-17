<x-layouts.app title="Dashboard">
    <div class="container">
        <h2 class="text-2xl font-bold text-white mb-4">Subscriptions View</h2>

        <!-- Search and Filters -->
        <div class="bg-gray-800 p-6 rounded-lg shadow-md mb-6">
            <!-- Search Input -->
            <form id="searchForm" action="{{ route('contacts.index') }}" method="GET" class="mb-6">
                <div class="flex items-center gap-4">
                    <input type="text" name="search" placeholder="Search by name, email, or phone" value="{{ request('search') }}" class="px-4 py-2 rounded-lg bg-gray-700 text-white w-full">
                    <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">Search</button>
                    <a href="{{ route('contacts.index') }}" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg">Reset</a>
                </div>
            </form>

            <!-- Filters -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Sort by Created At (DSC) -->
                <select name="sort" class="px-4 py-2 rounded-lg bg-gray-700 text-white w-full" form="searchForm">
                    <option value="">Sort By</option>
                    <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Newest First</option>
                    <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Oldest First</option>
                </select>
                <!-- Filter by Subject -->
                <select name="subject" class="px-4 py-2 rounded-lg bg-gray-700 text-white w-full" form="searchForm">
                    <option value="">All Subjects</option>
                    @foreach($subjects as $subject)
                        <option value="{{ $subject }}" {{ request('subject') == $subject ? 'selected' : '' }}>{{ $subject }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Table -->
        <table class="min-w-full table-auto text-white bg-gray-800 shadow-md rounded-lg">
            <thead class="bg-gray-900">
                <tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Phone</th>
                    <th class="px-4 py-2">Subject</th>
                    <th class="px-4 py-2">Message</th>
                    <th class="px-4 py-2">Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                <tr class="bg-gray-700 border-b border-gray-600">
                    <td class="px-4 py-2">{{ $contact->name }}</td>
                    <td class="px-4 py-2">{{ $contact->email }}</td>
                    <td class="px-4 py-2">{{ $contact->phone }}</td>
                    <td class="px-4 py-2">{{ $contact->subject }}</td>
                    <td class="px-4 py-2">{{ $contact->message }}</td>
                    <td class="px-4 py-2">{{ $contact->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="mt-6">
            {{ $contacts->links() }}
        </div>
    </div>
</x-layouts.app>