<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Display all users
    public function index()
    {
        $users = User::all(); // Fetch all users
        return view('custmgmt.custmain', compact('users')); // Pass users to the view
    }

    // Show the form for editing a user
    public function edit(User $user)
    {
        return view('custmgmt.editcust', compact('user'));
    }

    public function show(User $user)
    {
        return view('custmgmt.viewcust', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:8',
        ]);
    
        $user->update([
            'name' => $request->name, // Use 'name' here
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);
    
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }
    

    // Delete a user
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
