<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    // Display a listing of the customers
    public function index()
    {
        $customers = Customer::all();
        return view('custmgmt.custmain', compact('customers'));
    }


    // Store a newly created customer in storage
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|string|min:8',
            'contact_no' => 'required|string|max:20',
            'user_name' => 'required|string|max:255|unique:customers,user_name',
        ]);
    
        // Create and save the customer
        $customer = new Customer();
        $customer->first_name = $request->input('first_name');
        $customer->last_name = $request->input('last_name');
        $customer->email = $request->input('email');
        $customer->password = Hash::make($request->input('password')); // Password hashing
        $customer->contact_no = $request->input('contact_no');
        $customer->user_name = $request->input('user_name');
        $customer->role = 'customer'; // Set role to 'customer'
        $customer->save();
    
        // Redirect with success message
        return redirect()->route('customer.index')->with('success', 'Customer created successfully!');
    }
    
    // Display the specified customer
    public function show(Customer $customer)
    {
        return view('custmgmt.viewcust', compact('customer'));
    }

    // Show the form for editing the specified customer
    public function edit(Customer $customer)
    {
        return view('custmgmt.editcust', compact('customer'));
    }

    // Update the specified customer in storage
    public function update(Request $request, Customer $customer)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'password' => 'nullable|string|min:8',
            'contact_no' => 'required|string|max:20',
            'user_name' => 'required|string|max:255|unique:customers,user_name,' . $customer->id,
        ]);


        if ($request->has('password')) {
            $validatedData['password'] = Hash::make($request->input('password'));
        } else {
            unset($validatedData['password']);
        }

        // Update the customer data
        $customer->update($validatedData);

        return redirect()->route('customer.index')->with('success', 'Customer updated successfully!');
    }

    // Remove the specified customer from storage
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customer.index')->with('success', 'Customer deleted successfully!');
    }
}
