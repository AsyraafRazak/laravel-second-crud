<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //make index function
    public function index(Request $request)
    {
        // $inventories = Inventory::all();
        $per_page = $request->input('per_page', 5); // Number of items per page, default to 5
        $inventories = Inventory::paginate($per_page, ['*'],'inventories_page');
        $deletedInventories = Inventory::onlyTrashed()->paginate($per_page, ['*'],'deleted_inventories_page');
        return view('inventory.index', compact('inventories', 'deletedInventories'));
    }
    public function create()
    {
        return view('inventory.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required',
                'description' => 'required',
                'qty' => 'required|integer',
            ],
            [
                'name.required' => 'The name field is required.',
                'description.required' => 'The description field is required.',
                'qty.required' => 'The quantity field is required.',
                'qty.integer' => 'The quantity must be an integer.',
            ]
        );

        $validated['user_id'] = Auth::id();

        Inventory::create($validated);

        return redirect()->route('inventories.index')
            ->with('success', 'Inventory item created successfully.');
    }
    public function show(Inventory $inventory)
    {
        return view('inventory.show', compact('inventory'));
    }
    public function edit(Inventory $inventory)
    {
        return view('inventory.edit', compact('inventory'));
    }
    public function update(Request $request, Inventory $inventory)
    {
        $validated = $request->validate(
            [
                'name' => 'required',
                'description' => 'required',
                'qty' => 'required|integer',
            ],
            [
                'name.required' => 'The name field is required.',
                'description.required' => 'The description field is required.',
                'qty.required' => 'The quantity field is required.',
                'qty.integer' => 'The quantity must be an integer.',
            ]
        );
        $inventory->update($validated);
        return redirect()->route('inventories.index')
            ->with('success', 'Inventory item updated successfully.');
    }
    public function destroy(Inventory $inventory)
    {
        $inventory->delete();
        return redirect()->route('inventories.index')
            ->with('success', 'Inventory item deleted successfully.');
    }

    public function restore($id)
    {
        $inventory = Inventory::withTrashed()->findOrFail($id);
        $inventory->restore();
        return redirect()->route('inventories.index')
            ->with('success', 'Inventory item restored successfully.');
    }

    public function forceDelete($id)
    {
        $inventory = Inventory::withTrashed()->findOrFail($id);
        $inventory->forceDelete();
        return redirect()->route('inventories.index')
            ->with('success', 'Inventory item permanently deleted successfully.');
    }
}
