<x-layouts.app title="Edit Pricing">
    <div class="max-w-4xl mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold text-white mb-6">Edit User</h1>

        <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
            <form method="POST" action="{{ route('users.update', $user->id) }}">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Tag -->
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-300">Name</label>
                        <input type="text" id="name" name="name" value="{{ $user->name }}" class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Enter Name">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-300">Email</label>
                        <input type="text" id="email" name="email" value="{{ $user->email }}" class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Enter Email">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Tag -->
                    <div>
                        <label for="email_verified_at" class="block text-sm font-semibold text-gray-300">Email Verified At</label>
                        <input type="text" id="email_verified_at" name="email_verified_at" value="{{ $user->email_verified_at }}" class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Enter Email Verified At">
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-semibold text-gray-300">Status</label>
                        <input type="text" id="status" name="status" value="{{ $user->status }}" class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Enter Status">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Tag -->
                    <div>
                        <label for="package_manager_id" class="block text-sm font-semibold text-gray-300">Package Manager Id</label>
                        <input type="text" id="package_manager_id" name="package_manager_id" value="{{ $user->package_manager_id }}" class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Enter Package Manager Id">
                    </div>

                    <div>
                        <label for="stripe_id" class="block text-sm font-semibold text-gray-300">Stripe Id</label>
                        <input type="text" id="stripe_id" name="stripe_id" value="{{ $user->stripe_id }}" class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Enter Stripe Id">
                    </div>
                </div>

                <div class="mt-6 flex justify-end">
                    <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition duration-200">Update User</button>
                </div>
            </form>
        </div>
    </div>

</x-layouts.app>
