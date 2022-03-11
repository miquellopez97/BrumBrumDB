<?php

namespace App\Http\Controllers;

use App\Models\Bbusers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ApibbuserController extends Controller
{
    public function index()
    {
        return response()->json(Bbusers::all(), 200);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:Bbusers',
            'name' => 'required|max:40',
            'surname' => 'required|max:40',
            'password' => 'required',
            'rol' => 'required|max:20',
            'detail' => 'max:500',
            'otherInformation' => 'max:500'
        ]);

        $validateData['password'] = Hash::make($request->password);

        $user = Bbusers::create($validateData, 200);

        $success['token'] =  $user->createToken('appToken')->accessToken;

        return response()->json([$user,$success], 200);
    }

    public function show($user)
    {
        $bbusers = Bbusers::where('email', $user)->first();

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

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }

        $bbusers = $request->user();
        $tokenResult = $bbusers->createToken('Personal Access Token');

        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer'
        ]);
    }

    public function logout()
    {
        Auth()->logout();

        // $request->user()->token()->revoke();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    public function indexFilter(Request $request)
    {
        return response()->json(Bbusers::whereIn('rol', [$request->value])->get(), 200);
    }
}
