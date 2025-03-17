<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\Pricing;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return view('admin.index', compact('admins'));
    }


    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.edit', compact('admin'));
    }
    public function update(Request $request, $id)
    {
        // Find the Pricing by ID
        $admin = Admin::findOrFail($id);
    
    
        // Update the pricing
        $admin->update([
            'name' => $request->name,
            'email' => $request->email
        ]);
        
    
        // Redirect back with success message
        return redirect()->route('admin')->with('success', 'Admin updated successfully!');
    }
    
    

    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        return redirect()->route('admin')->with('success', 'Admin deleted successfully!');
    }
}
