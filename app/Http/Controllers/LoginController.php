<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function getToken(Request $request)
    {
        $user = User::find($request->id);
        if ($user) {
            $token = $user->createToken("sanctum");

            return [
                'code' => 200,
                'message' => "successfully create token",
                'data' => [
                    'token' => $token->plainTextToken
                ]
            ];
        }

        return response()->json([
            'code' => 400,
            'message' => "user may not exists",
        ], 400);
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'login_id' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'login_id' => 'The provided credentials do not match our records.',
        ])->onlyInput('login_id');
    }
}
