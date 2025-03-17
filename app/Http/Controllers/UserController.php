<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Start with all users
        $query = User::query();

        // Search by name or email
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        // Filter by status
        if ($request->has('status') && in_array($request->input('status'), ['active', 'inactive'])) {
            $query->where('status', $request->input('status') == 'active');
        }

        // Sort by created_at
        if ($request->has('sort') && in_array($request->input('sort'), ['asc', 'desc'])) {
            $query->orderBy('created_at', $request->input('sort'));
        } else {
            $query->orderBy('created_at', 'desc'); // Default sorting
        }

        // Get the filtered and sorted users
        $users = $query->get();

        return view('users.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Find the User by ID
        $user = User::findOrFail($id);

        // Update the user
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => $request->email_verified_at,
            'status' => filter_var($request->status, FILTER_VALIDATE_BOOLEAN),
            'package_manager_id' => $request->package_manager_id,
            'stripe_id' => $request->stripe_id
        ]);

        // Redirect back with success message
        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }
}