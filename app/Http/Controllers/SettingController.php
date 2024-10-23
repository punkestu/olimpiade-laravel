<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function index()
    {
        return view('setting.index');
    }

    public function changePassword()
    {
        return view('setting.change-password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ], [
            'current_password.required' => 'Password lama harus diisi',
            'new_password.required' => 'Password baru harus diisi',
            'confirm_password.required' => 'Konfirmasi password harus diisi',
            'confirm_password.same' => 'Konfirmasi password tidak sama dengan password baru',
        ]);

        $user = User::find(Auth::id());

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['Password lama tidak sesuai']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route("setting")->with('success', 'Password berhasil diupdate');
    }
}
