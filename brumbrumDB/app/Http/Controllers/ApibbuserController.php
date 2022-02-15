<?php

namespace App\Http\Controllers;

use App\Models\Bbusers;
use Illuminate\Http\Request;

class ApibbuserController extends Controller
{
    public function index()
    {
        return response()->json(Bbusers::all(), 200);
    }

    public function store(Request $request)
    {
        $user = Bbusers::create($request->all(), 200);
        return response()->json($user, 200);
    }

    public function show($user)
    {
        $bbusers = Bbusers::find($user);
        return response()->json($bbusers, 200);
    }

    public function update(Request $request, $user)
    {
        $bbusers = Bbusers::find($user);
        $bbusers->fill($request->all())->save();
        return response()->json($bbusers, 200);
    }

    public function destroy($user)
    {
        $bbusers = Bbusers::find($user);
        $bbusers->forceDelete();
        return response()->noContent();
    }
}
