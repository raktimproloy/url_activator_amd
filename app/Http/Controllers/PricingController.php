<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pricing;

class PricingController extends Controller
{
    public function index()
    {
        $pricings = Pricing::all();
        return view('pricing.index', compact('pricings'));
    }

    public function create()
    {
        return view('pricing.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'slug' => 'required|string',
            'description' => 'required|string',
            'tag' => 'required|string',
            'amount' => 'required|string',
            'duration' => 'required|string',
            'status' => 'required|string',
            'currency' => 'required|string',
            'theme_color' => 'required|string',
            'include' => 'nullable|string', // Accept as a JSON string
        ]);
    
        $includes = json_decode($request->include, true); // Convert JSON string to an array
    
        Pricing::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'description' => $request->description,
            'tag' => $request->tag,
            'amount' => $request->amount,
            'duration' => $request->duration,
            'status' => filter_var($request->status, FILTER_VALIDATE_BOOLEAN),
            'stripe_id' => $request->stripe_id,
            'url_count' => $request->url_count,
            'priority' => $request->priority,
            'currency' => $request->currency,
            'theme_color' => $request->theme_color,
            'include' => $includes, // Store as an array
        ]);
    
        return redirect()->route('pricing')->with('success', 'Pricing added successfully!');
    }
    

    public function edit($id)
    {
        $pricing = Pricing::findOrFail($id);
        return view('pricing.edit', compact('pricing'));
    }
    public function update(Request $request, $id)
    {
        // Find the Pricing by ID
        $pricing = Pricing::findOrFail($id);
    
        // Decode the 'include' array
        $includes = json_decode($request->include, true);
    
        // Update the pricing
        $pricing->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'description' => $request->description,
            'tag' => $request->tag,
            'amount' => $request->amount,
            'duration' => $request->duration,
            'status' => filter_var($request->status, FILTER_VALIDATE_BOOLEAN), // Ensure boolean
            'stripe_id' => $request->stripe_id,
            'url_count' => $request->url_count,
            'priority' => $request->priority,
            'currency' => $request->currency,
            'theme_color' => $request->theme_color,
            'include' => $includes,
        ]);
        
    
        // Redirect back with success message
        return redirect()->route('pricing')->with('success', 'Pricing updated successfully!');
    }
    
    

    public function destroy($id)
    {
        $pricing = Pricing::findOrFail($id);
        $pricing->delete();

        return redirect()->route('pricing')->with('success', 'Pricing deleted successfully!');
    }
}
