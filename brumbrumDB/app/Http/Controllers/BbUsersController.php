<?php

namespace App\Http\Controllers;

use App\Models\Bbusers;
use Illuminate\Http\Request;

class BbUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = BbUsers::latest()->paginate(5);

        return view('user.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  \App\BbUsers  $user
     * @return \Illuminate\Http\Response
     */
    public function show(BbUsers $user)
    {
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BbUsers  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(BbUsers $user)
    {
        // return view('user.edit', compact('user'));
        return view('user.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BbUsers  $user
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(BbUsers $user)
    {
        $user->delete();

        return redirect()->route('user.index')
                        ->with('success', 'User deleted successfully');
    }
}
