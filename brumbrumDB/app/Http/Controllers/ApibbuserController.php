<?php

namespace App\Http\Controllers;

use App\Models\apibbuser;
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
        Bbusers::create($request->all());
    }

    public function show(Bbusers $bbusers)
    {
        return response()->json($bbusers, 200);
    }

    public function update(Request $request, Bbusers $bbusers)
    {
        $bbusers->fill($request->all())->save();
        return response()->json($bbusers, 200);
    }

    public function destroy(Bbusers $bbusers)
    {
        $bbusers->forceDelete();
        return response()->noContent();
    }
}
