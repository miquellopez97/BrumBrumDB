<?php

namespace App\Http\Controllers;

use App\Models\Bbusers;
use Illuminate\Http\Request;

class BbUsersController extends Controller
{
    public function index()
    {
        $users = BbUsers::all();

        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'name' => 'required',
            'surname',
            'password' => 'required',
            'rol' => 'required',
            'detail',
            'otherInformation',
        ]);

        $a = BbUsers::create($request->all());

        return redirect()->route('user.index')
                        ->with('success', 'User created successfully.');
    }

    public function show(BbUsers $user)
    {
        return view('user.show', compact('user'));
    }

    public function edit(BbUsers $user)
    {
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, BbUsers $user)
    {
        $request->validate([
            'Username',
            'Email',
            'Name',
            'Surname',
            'Password',
            'Rol',
            'Detail',
            'OtherInformation',
        ]);

        $user->update($request->all());

        return redirect()->route('user.index')
                        ->with('success', 'User updated successfully');
    }

    public function destroy(BbUsers $user)
    {
        $user->delete();

        return redirect()->route('user.index')
                        ->with('success', 'User deleted successfully');
    }
}
