<x-layouts.app title="Edit Pricing">
    <div class="max-w-4xl mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold text-white mb-6">Edit Pricing</h1>

        <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
            <form method="POST" action="{{ route('pricings.update', $pricing->id) }}">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Tag -->
                    <div>
                        <label for="title" class="block text-sm font-semibold text-gray-300">Title</label>
                        <input type="text" id="title" name="title" value="{{ $pricing->title }}" required class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Enter Tag">
                    </div>

                    <div>
                        <label for="slug" class="block text-sm font-semibold text-gray-300">Slug</label>
                        <input type="text" id="slug" name="slug" value="{{ $pricing->slug }}" required class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Enter Tag">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Tag -->
                    <div>
                        <label for="description" class="block text-sm font-semibold text-gray-300">Description</label>
                        <input type="text" id="description" name="description" value="{{ $pricing->description }}" required class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Enter Tag">
                    </div>

                    <!-- Theme Color -->
                    <div>
                        <label for="status" class="block text-sm font-semibold text-gray-300">Status</label>
                        <select id="status" name="status" class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500">
                            <option value="0" {{ $pricing->status == '0' ? 'selected' : '' }}>Active</option>
                            <option value="1" {{ $pricing->status == '1' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Tag -->
                    <div>
                        <label for="tag" class="block text-sm font-semibold text-gray-300">Tag</label>
                        <input type="text" id="tag" name="tag" value="{{ $pricing->tag }}" required class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Enter Tag">
                    </div>

                    <!-- Theme Color -->
                    <div>
                        <label for="theme_color" class="block text-sm font-semibold text-gray-300">Theme Color</label>
                        <select id="theme_color" name="theme_color" class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500">
                            <option value="theme1" {{ $pricing->theme_color == 'theme1' ? 'selected' : '' }}>Theme 1</option>
                            <option value="theme2" {{ $pricing->theme_color == 'theme2' ? 'selected' : '' }}>Theme 2</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Tag -->
                    <div>
                        <label for="amount" class="block text-sm font-semibold text-gray-300">Amount</label>
                        <input type="text" id="amount" name="amount" value="{{ $pricing->amount }}" required class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Enter Tag">
                    </div>

                    <!-- Theme Color -->
                    <div>
                        <label for="duration" class="block text-sm font-semibold text-gray-300">Duration</label>
                        <select id="duration" name="duration" class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500">
                            <option value="monthly" {{ $pricing->duration == 'monthly' ? 'selected' : '' }}>Monthly</option>
                            <option value="yearly" {{ $pricing->duration == 'yearly' ? 'selected' : '' }}>Yearly</option>
                        </select>
                    </div>
                </div>


                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Tag -->
                    <div>
                        <label for="stripe_id" class="block text-sm font-semibold text-gray-300">Stripe Id</label>
                        <input type="text" id="stripe_id" name="stripe_id" value="{{ $pricing->stripe_id }}" class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Enter Tag">
                    </div>

                    <!-- Theme Color -->
                    <div>
                        <label for="currency" class="block text-sm font-semibold text-gray-300">Currency</label>
                        <select id="currency" name="currency" class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500">
                            <option value="bdt" {{ $pricing->currency == 'bdt' ? 'selected' : '' }}>BDT</option>
                            <option value="usd" {{ $pricing->currency == 'usd' ? 'selected' : '' }}>USD</option>
                        </select>
                    </div>
                </div>


                <div class="mt-6">
                    <!-- Include (Array Input) -->
                    <label for="include" class="block text-sm font-semibold text-gray-300">Include</label>
                    
                    <!-- This is the visible input where the user can type the data -->
                    <input type="text" id="includeInput" name="includeInput" class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Press Enter to Add Item">
                
                    <!-- Hidden input to store the array of 'Include' items as a JSON string -->
                    <input type="hidden" id="include" name="include" value="{{ json_encode($pricing->include) }}"> 
                
                    <!-- Display added includes -->
                    <div id="includeList" class="mt-4">
                        <!-- Added items will appear here -->
                        @foreach($pricing->include as $item)
                            <div class="flex items-center gap-2 bg-gray-600 text-white px-4 py-2 rounded-md mt-2">
                                <span>{{ $item }}</span>
                                <button type="button" class="text-red-500" onclick="removeIncludeItem(this, '{{ $item }}')">×</button>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mt-6 flex justify-end">
                    <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition duration-200">Update Pricing</button>
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript to handle 'Include' array -->
    <script>
        let includes = @json($pricing->include); // Initialize with existing includes from backend

        // Add item when Enter is pressed
        document.getElementById('includeInput').addEventListener('keypress', function (e) {
            if (e.key === 'Enter' && this.value.trim() !== '') {
                e.preventDefault();
                const includeList = document.getElementById('includeList');
                const newItemValue = this.value.trim();
                
                // Add new item to includes array
                includes.push(newItemValue);
                document.getElementById('include').value = JSON.stringify(includes); // Update hidden input field with JSON string

                // Create new item display
                const newItem = document.createElement('div');
                newItem.classList.add('flex', 'items-center', 'gap-2', 'bg-gray-600', 'text-white', 'px-4', 'py-2', 'rounded-md', 'mt-2');
                newItem.innerHTML = `
                    <span>${newItemValue}</span>
                    <button type="button" class="text-red-500" onclick="removeIncludeItem(this, '${newItemValue}')">×</button>
                `;
                includeList.appendChild(newItem);

                // Clear the input field after adding the item
                this.value = '';
            }
        });

        // Remove an item from the includes list
        function removeIncludeItem(button, value) {
            // Remove the value from the array
            includes = includes.filter(item => item !== value);

            // Update hidden input field with updated array
            document.getElementById('include').value = JSON.stringify(includes);

            // Remove the displayed item from the list
            button.parentElement.remove();
        }
    </script>
</x-layouts.app>
