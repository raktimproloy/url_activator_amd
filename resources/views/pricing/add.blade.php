<x-layouts.app title="Pricing">
    <div class="max-w-4xl mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold text-white mb-6">Pricing</h1>

        <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
            <form method="POST" action="{{ route('pricings.store') }}">
            {{-- <form> --}}
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Tag -->
                    <div>
                        <label for="title" class="block text-sm font-semibold text-gray-300">Title</label>
                        <input type="text" id="title" name="title" required class="mt-2 w-full px-4 py-2 bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Enter Title">
                    </div>

                    <div>
                        <label for="slug" class="block text-sm font-semibold text-gray-300">Slug</label>
                        <input type="text" id="slug" name="slug" required class="mt-2 w-full px-4 py-2 bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Enter Slug">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Tag -->
                    <div>
                        <label for="description" class="block text-sm font-semibold text-gray-300">Description</label>
                        <input type="text" id="description" name="description" required class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Enter Description">
                    </div>

                    <!-- Theme Color -->
                    <div>
                        <label for="status" class="block text-sm font-semibold text-gray-300">Status</label>
                        <select id="status" name="status" class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500">
                            <option value="0">Active</option>
                            <option value="1">Inactive</option>
                        </select>
                    </div>

                    
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Tag -->
                    <div>
                        <label for="tag" class="block text-sm font-semibold text-gray-300">Tag</label>
                        <input type="text" id="tag" name="tag" required class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Enter Tag">
                    </div>

                    <!-- Theme Color -->
                    <div>
                        <label for="theme_color" class="block text-sm font-semibold text-gray-300">Theme Color</label>
                        <select id="theme_color" name="theme_color" class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500">
                            <option value="theme1">Theme 1</option>
                            <option value="theme2">Theme 2</option>
                        </select>
                    </div>

                    
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <!-- BD Amount Month -->
                    <div>
                        <label for="amount" class="block text-sm font-semibold text-gray-300">Amount</label>
                        <input type="text" id="amount" name="amount" required class="mt-2 w-full px-4 py-2 bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Enter Amount">
                    </div>
                    <!-- Dollar Amount Month -->
                    <div>
                        <label for="duration" class="block text-sm font-semibold text-gray-300">Duration</label>
                        <select id="duration" name="duration" class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500">
                            <option value="monthly">Monthly</option>
                            <option value="yearly">Yearly</option>
                        </select>
                    </div>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">

                    <!-- BD Amount Yearly -->
                    <div>
                        <label for="stripe_id" class="block text-sm font-semibold text-gray-300">Stripe Id</label>
                        <input type="text" id="stripe_id" name="stripe_id" class="mt-2 w-full px-4 py-2 bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Enter Stripe Id">
                    </div>
                    <div>
                        <label for="currency" class="block text-sm font-semibold text-gray-300">Currency</label>
                        <select id="currency" name="currency" class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500">
                            <option value="bdt">BDT</option>
                            <option value="usd">USD</option>
                        </select>
                    </div>
                </div>


                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">

                    <!-- BD Amount Yearly -->
                    <div>
                        <label for="priority" class="block text-sm font-semibold text-gray-300">Currency</label>
                        <select id="priority" name="priority" class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500">
                            <option value="1">High</option>
                            <option value="2">Mid</option>
                            <option value="3">Low</option>
                        </select>
                    </div>
                    <div>
                        <label for="url_count" class="block text-sm font-semibold text-gray-300">URL Count</label>
                        <input type="text" id="url_count" name="url_count" class="mt-2 w-full px-4 py-2 bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Enter URL Count">
                    </div>
                </div>

                <div class="mt-6">
                    <!-- Include (Array Input) -->
                    <label for="include" class="block text-sm font-semibold text-gray-300">Include</label>
                    
                    <!-- This is the visible input where the user can type the data -->
                    <input type="text" id="includeInput" name="includeInput" class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Press Enter to Add Item">
                
                    <!-- Hidden input to store the array of 'Include' items as a JSON string -->
                    <input type="hidden" id="include" name="include" value="[]"> 
                
                    <!-- Display added includes -->
                    <div id="includeList" class="mt-4">
                        <!-- Added items will appear here -->
                    </div>
                </div>

                <div class="mt-6 flex justify-end">
                    <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition duration-200">Save Pricing</button>
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript to handle 'Include' array -->
<!-- JavaScript to handle adding/removing items from 'Include' -->
<script>
    let includes = []; // Initialize an empty array to store includes

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
