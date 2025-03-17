<x-layouts.app title="Edit subscriptions">
    <div class="max-w-4xl mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold text-white mb-6">Edit subscriptions</h1>

        <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
            <form method="POST" action="{{ route('subscriptions.update', $subscriptions->id) }}">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Tag -->
                    <div>
                        <label for="user_id" class="block text-sm font-semibold text-gray-300">User Id</label>
                        <input type="text" id="user_id" name="user_id" value="{{ $subscriptions->user_id }}"  class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Enter User Id">
                    </div>

                    <div>
                        <label for="type" class="block text-sm font-semibold text-gray-300">Type</label>
                        <input type="text" id="type" name="type" value="{{ $subscriptions->type }}"  class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Enter Type">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Tag -->
                    <div>
                        <label for="stripe_id" class="block text-sm font-semibold text-gray-300">Stripe Id</label>
                        <input type="text" id="stripe_id" name="stripe_id" value="{{ $subscriptions->stripe_id }}"  class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Enter Stripe Id">
                    </div>

                    <div>
                        <label for="stripe_session_id" class="block text-sm font-semibold text-gray-300">Stripe Session Id</label>
                        <input type="text" id="stripe_session_id" name="stripe_session_id" value="{{ $subscriptions->stripe_session_id }}"  class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Enter Stripe Session Id">
                    </div>
                    
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Tag -->
                    <div>
                        <label for="stripe_status" class="block text-sm font-semibold text-gray-300">Stripe Status</label>
                        <input type="text" id="stripe_status" name="stripe_status" value="{{ $subscriptions->stripe_status }}"  class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Enter Stripe Status">
                    </div>

                    <div>
                        <label for="stripe_price" class="block text-sm font-semibold text-gray-300">Stripe Price</label>
                        <input type="text" id="stripe_price" name="stripe_price" value="{{ $subscriptions->stripe_price }}"  class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Enter Stripe Price">
                    </div>
                    
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Tag -->
                    <div>
                        <label for="currency" class="block text-sm font-semibold text-gray-300">Currency</label>
                        <input type="text" id="currency" name="currency" value="{{ $subscriptions->currency }}"  class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Enter Currency">
                    </div>

                    <div>
                        <label for="quantity" class="block text-sm font-semibold text-gray-300">Quantity</label>
                        <input type="text" id="quantity" name="quantity" value="{{ $subscriptions->quantity }}"  class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Enter Quantity">
                    </div>
                    
                </div>


                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Tag -->
                    <div>
                        <label for="invoice_id" class="block text-sm font-semibold text-gray-300">Invoice Id</label>
                        <input type="text" id="invoice_id" name="invoice_id" value="{{ $subscriptions->invoice_id }}" class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Enter Invoice Id">
                    </div>

                    <div>
                        <label for="order_id" class="block text-sm font-semibold text-gray-300">Order Id</label>
                        <input type="text" id="order_id" name="order_id" value="{{ $subscriptions->order_id }}" class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Enter Order Id">
                    </div>

                    
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Tag -->
                    <div>
                        <label for="package_slug" class="block text-sm font-semibold text-gray-300">Package Slug</label>
                        <input type="text" id="package_slug" name="package_slug" value="{{ $subscriptions->package_slug }}" class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Enter Package Slug">
                    </div>

                    <div>
                        <label for="payment_method" class="block text-sm font-semibold text-gray-300">Payment Method</label>
                        <input type="text" id="payment_method" name="payment_method" value="{{ $subscriptions->payment_method }}" class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Enter Order Payment Method">
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Tag -->
                    <div>
                        <label for="payment_status" class="block text-sm font-semibold text-gray-300">Payment Status</label>
                        <input type="text" id="payment_status" name="payment_status" value="{{ $subscriptions->payment_status }}" class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Enter Payment Status">
                    </div>

                    <div>
                        <label for="subscription" class="block text-sm font-semibold text-gray-300">Subscription</label>
                        <input type="text" id="subscription" name="subscription" value="{{ $subscriptions->subscription }}" class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Enter Subscription">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Tag -->
                    <div>
                        <label for="ends_at" class="block text-sm font-semibold text-gray-300">Ends At</label>
                        <input type="text" id="ends_at" name="ends_at" value="{{ $subscriptions->ends_at }}" class="mt-2 w-full px-4 py-2  bg-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500" placeholder="Enter Ends At">
                    </div>
                </div>

                <div class="mt-6 flex justify-end">
                    <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition duration-200">Update Subscriptions</button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
