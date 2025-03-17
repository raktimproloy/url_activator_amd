<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        // Start with all contacts
        $query = Contact::query();

        // Search Logic
        if ($request->has('search') && $request->input('search') != '') {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        // Filter by Subject
        if ($request->has('subject') && $request->input('subject') != '') {
            $query->where('subject', $request->input('subject'));
        }

        // Sort by Created At (DSC or ASC)
        if ($request->has('sort') && in_array($request->input('sort'), ['asc', 'desc'])) {
            $query->orderBy('created_at', $request->input('sort'));
        } else {
            $query->orderBy('created_at', 'desc'); // Default sorting
        }

        // Get unique subjects for the filter dropdown
        $subjects = Contact::distinct()->pluck('subject');

        // Paginate the filtered contacts (e.g., 10 items per page)
        $contacts = $query->paginate(10);

        return view('contacts.index', compact('contacts', 'subjects'));
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully!');
    }
}