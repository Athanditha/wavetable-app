<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
 // Display a listing of the items
 public function index()
 {
     $items = Item::all();
     return view('items.itemview', compact('items'));
 }
 public function showOnCustomerHome()
{
    // Fetch all items from the database
    $items = Item::all();

    // Return the customer.home view and pass the items to it
    return view('customer.home', compact('items'));
}

 public function show(Item $item)
 {
     return view('items.viewitem', compact('item'));
 }
 
 // Store a newly created item in storage
 public function store(Request $request)
 {
     $request->validate([
         'brand' => 'required|string|max:255',
         'name' => 'required|string|max:255',
         'category' => 'required|string|max:255',
         'description' => 'nullable|string',
         'sale_price' => 'required|numeric',
         'rental_rate' => 'required|numeric',
         'quantity' => 'required|integer',
         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
     ]);

     $imagePath = null;
     if ($request->hasFile('image')) {
         $image = $request->file('image');
         $imagePath = $image->store('itemimages', 'public');
     }

     Item::create([
         'brand' => $request->input('brand'),
         'name' => $request->input('name'),
         'category' => $request->input('category'),
         'description' => $request->input('description'),
         'sale_price' => $request->input('sale_price'),
         'rental_rate' => $request->input('rental_rate'),
         'quantity' => $request->input('quantity'),
         'image' => $imagePath,
     ]);

     return redirect()->route('items.index')->with('success', 'Item created successfully!');
 }

 // Update the specified item in storage
 public function update(Request $request, Item $item)
 {
     $request->validate([
         'brand' => 'required|string|max:255',
         'name' => 'required|string|max:255',
         'category' => 'required|string|max:255',
         'description' => 'nullable|string',
         'sale_price' => 'required|numeric',
         'rental_rate' => 'required|numeric',
         'quantity' => 'required|integer',
         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
     ]);

     $imagePath = $item->image;
     if ($request->hasFile('image')) {
         $image = $request->file('image');
         $imagePath = $image->store('itemimages', 'public');
     }

     $item->update([
         'brand' => $request->input('brand'),
         'name' => $request->input('name'),
         'category' => $request->input('category'),
         'description' => $request->input('description'),
         'sale_price' => $request->input('sale_price'),
         'rental_rate' => $request->input('rental_rate'),
         'quantity' => $request->input('quantity'),
         'image' => $imagePath,
     ]);

     return redirect()->route('items.index')->with('success', 'Item updated successfully!');
 }

 // Show the form for editing the specified item
 public function edit(Item $item)
 {
     return view('items.edititem', compact('item'));
 }

 // Remove the specified item from storage
 public function destroy(Item $item)
 {
     $item->delete();
     return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
 }
}
