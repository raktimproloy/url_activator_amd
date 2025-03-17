<x-layouts.app title="Edit Pricing">
    <div class="max-w-4xl mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold text-white mb-6">Edit Packages</h1>

        <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
            <form method="POST" action="{{ route('packages.update', $packages->id) }}">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Tag -->
                    <div>
                        <label for="user_id" class="block text-sm font-semibold text-gray-300">User Id</label>
                        <input type="text" id="user_id" name="user_id" value="{{ $packages->user_id }}" required class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Enter User Id">
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-semibold text-gray-300">Status</label>
                        <input type="text" id="status" name="status" value="{{ $packages->status }}" required class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Enter Status">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Tag -->
                    <div>
                        <label for="package_slug" class="block text-sm font-semibold text-gray-300">Package Slug</label>
                        <input type="text" id="package_slug" name="package_slug" value="{{ $packages->package_slug }}" required class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Enter Package Slug">
                    </div>

                    <div>
                        <label for="url_count" class="block text-sm font-semibold text-gray-300">URL Count</label>
                        <input type="text" id="url_count" name="url_count" value="{{ $packages->url_count }}" required class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Enter URL Count">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Tag -->
                    <div>
                        <label for="priority" class="block text-sm font-semibold text-gray-300">Priority</label>
                        <input type="text" id="priority" name="priority" value="{{ $packages->priority }}" required class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Enter Priority">
                    </div>
                    <div>
                        <label for="end_at" class="block text-sm font-semibold text-gray-300">End At</label>
                        <input type="text" id="end_at" name="end_at" value="{{ $packages->end_at }}" required class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Enter End At">
                    </div>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Tag -->
                    <div>
                        <label for="urls" class="block text-sm font-semibold text-gray-300">URLs</label>
                        <input type="text" id="urls" name="urls" value="{{ $packages->urls }}" required class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Enter URLs">
                    </div>
                </div>

                <div class="mt-6 flex justify-end">
                    <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition duration-200">Update Pricing</button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
