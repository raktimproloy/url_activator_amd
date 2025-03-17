<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;
use App\Models\Pricing;
use App\Models\Subscription;

class NewsletterController extends Controller
{
    public function index()
    {
        $newsletters = Newsletter::all();
        return view('newsletters.index', compact('newsletters'));
    }

    public function edit($id)
    {
        $newsletters = Newsletter::findOrFail($id);
        return view('newsletters.edit', compact('newsletters'));
    }
    public function update(Request $request, $id)
    {
        // Find the Pricing by ID
        $newsletters = Newsletter::findOrFail($id);
    
        // Update the pricing
        $newsletters->update([
            'email' => $request->email,
            'status' => $request->status
        ]);
        
    
        // Redirect back with success message
        return redirect()->route('newsletters')->with('success', 'Subscriptions updated successfully!');
    }
    
    

    public function destroy($id)
    {
        $newsletter = Newsletter::findOrFail($id);
        $newsletter->delete();

        return redirect()->route('newsletters')->with('success', 'Subscriptions deleted successfully!');
    }
}
