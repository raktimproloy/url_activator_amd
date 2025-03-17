<x-layouts.app title="Dashboard">

    <div class="container">
        <h2 class="text-2xl font-bold text-white">Subscriptions View</h2>
        <a href="{{ route('register') }}" class="btn btn-primary mb-4 inline-block bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">Add New Admin</a>
        <table class="min-w-full table-auto text-white mt-4 bg-gray-800 shadow-md rounded-lg">
            <thead class="bg-gray-900">
                <tr>
                    <th class="px-4 py-2">User Id</th>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Created At</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($admins as $admin)
                <tr class="bg-gray-700 border-b border-gray-600">
                    <td class="px-4 py-2">{{ $admin->id }}</td>
                    <td class="px-4 py-2">{{ $admin->name }}</td>
                    <td class="px-4 py-2">{{ $admin->email }}</td>
                    <td class="px-4 py-2">{{ $admin->created_at }}</td>
                    <td class="px-4 py-2 flex space-x-2">
                        <a href="{{ route('admin.edit', $admin->id) }}" class="btn btn-warning bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded">Edit</a>
                        <form action="{{ route('admin.destroy', $admin->id) }}" method="POST" class="inline-block">
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
