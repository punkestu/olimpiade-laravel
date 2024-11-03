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

        $user = User::where("login_id", $credentials["login_id"])->first();
        if (!$user) {
            return redirect()->back()->withErrors([
                'login_id' => 'ID salah.',
            ])->onlyInput('login_id');
        }

        if ($user->is_login && $user->role != "admin") {
            return redirect()->back()->withErrors([
                'login_id' => 'ID sudah digunakan untuk login.',
            ])->onlyInput('login_id');
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user->is_login = true;
            $user->save();

            return redirect()->intended('dashboard');
        }

        return redirect()->back()->withErrors([
            'password' => 'Password salah.',
        ])->onlyInput('login_id');
    }
}
