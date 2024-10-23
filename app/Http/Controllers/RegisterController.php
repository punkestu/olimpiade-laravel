<?php

namespace App\Http\Controllers;

use App\Models\Olimpiade;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index()
    {
        $categories = Olimpiade::where('start_date', '>', now())->get();
        return view('register', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'category' => 'required|exists:olimpiades,id',
        ], [
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
            'password.required' => 'Password harus diisi',
            'password.confirmed' => 'Password tidak sama',
            'category.required' => 'Kategori harus diisi',
            'category.exists' => 'Kategori tidak valid',
        ]);
        $data["olimpiade_id"] = $data["category"];
        $data["login_id"] = Str::random(10) . $data["category"];

        User::create($data);

        return redirect()->route('reveal-login-id', $data["login_id"]);
    }

    public function revealLoginID($id)
    {
        return view('reveal-login-id', compact('id'));
    }
}
