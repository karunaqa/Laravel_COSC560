<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Get all users
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        // Show form to create a new user
        return view('admin.users.create');
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'role' => 'required|string|in:user,admin,author', // Validate role
    ]);

    $validatedData['password'] = bcrypt($validatedData['password']);

    User::create($validatedData);

    return redirect()->route('admin.users.index')->with('success', 'User/Admin created successfully');
}

    public function show($id)
    {
        // Show a single user
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    public function edit($id)
    {
        // Show form to edit a user
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'password' => 'nullable|string|min:8|confirmed',
        'role' => 'required|string|in:user,admin,author', // Validate role
    ]);

    $user = User::findOrFail($id);

    if ($request->filled('password')) {
        $validatedData['password'] = bcrypt($validatedData['password']);
    } else {
        unset($validatedData['password']);
    }

    $user->update($validatedData);

    return redirect()->route('admin.users.index')->with('success', 'User/Admin updated successfully');
}

    public function destroy($id)
    {
        // Delete the user
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User/Admin deleted successfully');
    }
}
