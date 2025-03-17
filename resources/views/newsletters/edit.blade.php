<x-layouts.app title="Edit subscriptions">
    <div class="max-w-4xl mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold text-white mb-6">Edit subscriptions</h1>

        <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
            <form method="POST" action="{{ route('newsletters.update', $newsletters->id) }}">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Tag -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-300">Email</label>
                        <input type="text" id="email" name="email" value="{{ $newsletters->email }}"  class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Enter User Id">
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-semibold text-gray-300">Status</label>
                        <input type="text" id="status" name="status" value="{{ $newsletters->status }}"  class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Enter Type">
                    </div>
                </div>

                <div class="mt-6 flex justify-end">
                    <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition duration-200">Update Subscriptions</button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
