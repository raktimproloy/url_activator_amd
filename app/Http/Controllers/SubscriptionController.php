<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function index(Request $request)
    {
        // Start with all subscriptions
        $query = Subscription::query();

        // Search Logic
        if ($request->has('search') && $request->input('search') != '') {
            $search = $request->input('search');
            $columns = $request->input('columns', []);

            if (!empty($columns)) {
                $query->where(function ($q) use ($search, $columns) {
                    foreach ($columns as $column) {
                        $q->orWhere($column, 'like', "%{$search}%");
                    }
                });
            }
        }

        // Filters
        if ($request->has('type') && $request->input('type') != '') {
            $query->where('type', $request->input('type'));
        }
        if ($request->has('stripe_status') && $request->input('stripe_status') != '') {
            $query->where('stripe_status', $request->input('stripe_status'));
        }
        if ($request->has('currency') && $request->input('currency') != '') {
            $query->where('currency', $request->input('currency'));
        }
        if ($request->has('package_slug') && $request->input('package_slug') != '') {
            $query->where('package_slug', $request->input('package_slug'));
        }
        if ($request->has('payment_method') && $request->input('payment_method') != '') {
            $query->where('payment_method', $request->input('payment_method'));
        }
        if ($request->has('payment_status') && $request->input('payment_status') != '') {
            $query->where('payment_status', $request->input('payment_status'));
        }
        if ($request->has('created_at') && $request->input('created_at') != '') {
            $query->whereDate('created_at', $request->input('created_at'));
        }

        // Get unique package slugs for the filter dropdown
        $packageSlugs = Subscription::distinct()->pluck('package_slug');

        // Paginate the filtered subscriptions (e.g., 10 items per page)
        $subscriptions = $query->paginate(10);

        return view('subscriptions.index', compact('subscriptions', 'packageSlugs'));
    }

    public function edit($id)
    {
        $subscription = Subscription::findOrFail($id);
        return view('subscriptions.edit', compact('subscription'));
    }

    public function update(Request $request, $id)
    {
        // Find the Subscription by ID
        $subscription = Subscription::findOrFail($id);

        // Update the subscription
        $subscription->update([
            'user_id' => $request->user_id,
            'type' => $request->type,
            'stripe_id' => $request->stripe_id,
            'stripe_session_id' => $request->stripe_session_id,
            'stripe_status' => $request->stripe_status,
            'stripe_price' => $request->stripe_price,
            'currency' => $request->currency,
            'quantity' => $request->quantity,
            'invoice_id' => $request->invoice_id,
            'order_id' => $request->order_id,
            'package_slug' => $request->package_slug,
            'payment_method' => $request->payment_method,
            'payment_status' => $request->payment_status,
            'subscription' => $request->subscription,
            'ends_at' => $request->ends_at
        ]);

        // Redirect back with success message
        return redirect()->route('subscriptions.index')->with('success', 'Subscription updated successfully!');
    }

    public function destroy($id)
    {
        $subscription = Subscription::findOrFail($id);
        $subscription->delete();

        return redirect()->route('subscriptions.index')->with('success', 'Subscription deleted successfully!');
    }
}