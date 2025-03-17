<?php

namespace App\Http\Controllers;

use App\Models\PackageManager;
use Illuminate\Http\Request;

class PackageManagerController extends Controller
{
    public function index(Request $request)
    {
        // Start with all packages
        $query = PackageManager::query();

        // Search by User ID
        if ($request->has('search')) {
            $query->where('user_id', 'like', "%{$request->input('search')}%");
        }

        // Filter by Status
        if ($request->has('status') && in_array($request->input('status'), ['active', 'inactive'])) {
            $query->where('status', $request->input('status') == 'active');
        }

        // Filter by Package Slug
        if ($request->has('package_slug') && $request->input('package_slug') != '') {
            $query->where('package_slug', $request->input('package_slug'));
        }

        // Filter by URL Count
        if ($request->has('url_count') && $request->input('url_count') != '') {
            $query->where('url_count', $request->input('url_count'));
        }

        // Filter by Priority
        if ($request->has('priority') && $request->input('priority') != '') {
            $query->where('priority', $request->input('priority'));
        }

        // Filter by Started At
        if ($request->has('started_at') && $request->input('started_at') != '') {
            $query->whereDate('started_at', $request->input('started_at'));
        }

        // Filter by End At
        if ($request->has('end_at') && $request->input('end_at') != '') {
            $query->whereDate('end_at', $request->input('end_at'));
        }

        // Sort by Created At (DSC or ASC)
        if ($request->has('sort') && in_array($request->input('sort'), ['asc', 'desc'])) {
            $query->orderBy('created_at', $request->input('sort'));
        } else {
            $query->orderBy('created_at', 'desc'); // Default sorting
        }

        // Get unique package slugs for the filter dropdown
        $packageSlugs = PackageManager::distinct()->pluck('package_slug');

        // Paginate the filtered packages (e.g., 10 items per page)
        $packages = $query->paginate(10);

        return view('packages.index', compact('packages', 'packageSlugs'));
    }

    public function edit($id)
    {
        $packages = PackageManager::findOrFail($id);
        return view('packages.edit', compact('packages'));
    }

    public function update(Request $request, $id)
    {
        // Find the Package by ID
        $packages = PackageManager::findOrFail($id);

        // Update the package
        $packages->update([
            'user_id' => $request->user_id,
            'status' => filter_var($request->status, FILTER_VALIDATE_BOOLEAN),
            'package_slug' => $request->package_slug,
            'url_count' => $request->url_count,
            'urls' => $request->urls,
            'priority' => $request->priority,
            'end_at' => $request->end_at,
        ]);

        // Redirect back with success message
        return redirect()->route('packages.index')->with('success', 'Packages updated successfully!');
    }

    public function destroy($id)
    {
        $packages = PackageManager::findOrFail($id);
        $packages->delete();

        return redirect()->route('packages.index')->with('success', 'Packages deleted successfully!');
    }
}