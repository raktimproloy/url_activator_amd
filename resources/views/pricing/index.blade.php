<x-layouts.app title="Dashboard">

    <div class="container">
        <h2 class="text-2xl font-bold text-white">Pricing Plans</h2>
        <a href="{{ route('pricing.add') }}" class="btn btn-primary mb-4 inline-block bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">Add New Pricing</a>
        <table class="min-w-full table-auto text-white mt-4 bg-gray-800 shadow-md rounded-lg">
            <thead class="bg-gray-900">
                <tr>
                    <th class="px-4 py-2">Title</th>
                    <th class="px-4 py-2">Slug</th>
                    <th class="px-4 py-2">Tag</th>
                    <th class="px-4 py-2">Amount</th>
                    <th class="px-4 py-2">Currency</th>
                    <th class="px-4 py-2">Duration</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Includes</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pricings as $pricing)
                <tr class="bg-gray-700 border-b border-gray-600">
                    <td class="px-4 py-2">{{ $pricing->title }}</td>
                    <td class="px-4 py-2">{{ $pricing->slug }}</td>
                    <td class="px-4 py-2">{{ $pricing->tag }}</td>
                    <td class="px-4 py-2">{{ $pricing->amount }}</td>
                    <td class="px-4 py-2">{{ $pricing->currency }}</td>
                    <td class="px-4 py-2">{{ $pricing->duration }}</td>
                    <td class="px-4 py-2">{{ $pricing->status }}</td>
                    <td class="px-4 py-2">
                        @if($pricing->include)
                            <button type="button" class="btn btn-info text-blue-500 hover:text-blue-700 underline" data-modal-toggle="includes-modal-{{ $pricing->id }}">View Includes</button>
                        @else
                            None
                        @endif
                    </td>
                    <td class="px-4 py-2 flex space-x-2">
                        <a href="{{ route('pricings.edit', $pricing->id) }}" class="btn btn-warning bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded">Edit</a>
                        <form action="{{ route('pricings.destroy', $pricing->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>

                <!-- Includes Modal -->
                <div id="includes-modal-{{ $pricing->id }}" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
                    <div class="bg-gray-800 text-white p-8 rounded-lg w-96 transition-transform transform scale-95 opacity-0" id="modal-content-{{ $pricing->id }}">
                        <h3 class="text-xl font-semibold mb-4">Includes for {{ $pricing->tag }}</h3>
                        <ul class="space-y-2 mb-6">
                            @foreach($pricing->include as $item)
                                <li class="text-lg">{{ $item }}</li>
                            @endforeach
                        </ul>
                        <button class="mt-4 w-full bg-red-600 text-white py-2 px-4 rounded" data-modal-toggle="includes-modal-{{ $pricing->id }}">Close</button>
                    </div>
                </div>

                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        // Toggle modal visibility with smooth transition
        const modalToggles = document.querySelectorAll('[data-modal-toggle]');
        modalToggles.forEach(toggle => {
            toggle.addEventListener('click', () => {
                const modalId = toggle.getAttribute('data-modal-toggle');
                const modal = document.getElementById(modalId);
                const modalContent = modal.querySelector('div');

                // Toggle modal visibility
                modal.classList.toggle('hidden');
                
                // Apply animation
                if (!modal.classList.contains('hidden')) {
                    setTimeout(() => {
                        modalContent.classList.remove('scale-95', 'opacity-0');
                        modalContent.classList.add('scale-100', 'opacity-100');
                    }, 10);
                } else {
                    modalContent.classList.remove('scale-100', 'opacity-100');
                    modalContent.classList.add('scale-95', 'opacity-0');
                }
            });
        });
    </script>

</x-layouts.app>
