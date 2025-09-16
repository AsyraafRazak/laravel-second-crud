<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;

class InventoryController extends Controller
{
    //make index function
    public function index()
    {
        $inventories = Inventory::all();
        return view('inventory.index', compact('inventories'));
    }
    public function create()
    {
        return view('inventory.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'qty' => 'required|integer',
        ]);

        Inventory::create($request->all());

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
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'qty' => 'required|integer',
        ]);
        $inventory->update($request->all());
        return redirect()->route('inventories.index')
                         ->with('success', 'Inventory item updated successfully.');
    }
    public function destroy(Inventory $inventory)
    {
        $inventory->delete();
        return redirect()->route('inventories.index')
                         ->with('success', 'Inventory item deleted successfully.');
    }
}
