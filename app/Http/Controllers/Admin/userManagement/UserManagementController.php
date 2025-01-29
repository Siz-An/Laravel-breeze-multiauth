<?php

namespace App\Http\Controllers\Admin\userManagement;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    public function manageUser()
    {
        $users = User::paginate(10);
        return view('admin.user.manageUser', compact('users'));
    }

    // Display all users
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.user.manageUser', compact('users'));
    }

    // Store a new user
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:users|regex:/^[a-zA-Z0-9_]+$/',
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:users',
            'contact' => 'nullable|digits_between:7,15',
            'address' => 'nullable|string|max:255',
            'password' => [
                'required',
                'string',
                'min:6',
            ],
        ], [
            'username.regex' => 'Username can only contain letters, numbers, and underscores.',
            'contact.digits_between' => 'Contact number must be between 7 and 15 digits.',
            'password.regex' => 'Password must me 6 character long.',
        ]);
    
        User::create([
            'username' => trim($validated['username']),
            'name' => trim($validated['name']),
            'email' => isset($validated['email']) ? trim($validated['email']) : null,
            'contact' => isset($validated['contact']) ? trim($validated['contact']) : null,
            'address' => isset($validated['address']) ? trim($validated['address']) : null,
            'password' => Hash::make($validated['password']),
        ]);
    
        return redirect()->route('admin.user.index')->with('success', 'User created successfully.');
    }
    

    public function edit(User $user)
    {
        return view('admin.user.editUser', compact('user'));
    }
    
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $user->id . '|regex:/^[a-zA-Z0-9_]+$/',
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:users,email,' . $user->id,
            'contact' => 'nullable|digits_between:7,15',
            'address' => 'nullable|string|max:255',
            'password' => [
                'nullable',
                'string',
                'min:8',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'
            ],
        ], [
            'username.regex' => 'Username can only contain letters, numbers, and underscores.',
            'contact.digits_between' => 'Contact number must be between 7 and 15 digits.',
            'password.regex' => 'Password must include at least one uppercase letter, one lowercase letter, and one number.',
        ]);
    
        $user->update([
            'username' => trim($validated['username']),
            'name' => trim($validated['name']),
            'email' => isset($validated['email']) ? trim($validated['email']) : $user->email,
            'contact' => isset($validated['contact']) ? trim($validated['contact']) : $user->contact,
            'address' => isset($validated['address']) ? trim($validated['address']) : $user->address,
            'password' => isset($validated['password']) ? Hash::make($validated['password']) : $user->password,
        ]);
    
        return redirect()->route('admin.user.index')->with('success', 'User updated successfully.');
    }
    
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.user.index')->with('success', 'User deleted successfully.');
    }
}