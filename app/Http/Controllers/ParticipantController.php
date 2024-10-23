<?php

namespace App\Http\Controllers;

use App\Models\Olimpiade;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ParticipantController extends Controller
{
    public function index(Request $request)
    {
        $olimpiade_filter = Olimpiade::find($request->olimpiade);
        $olimpiades = Olimpiade::all();
        if ($request->olimpiade && $olimpiade_filter) {
            $participants = User::with(["point", "olimpiade"])->where('role', 'user')->where('olimpiade_id', $request->olimpiade)->get();
            $olimpiade_filter = $olimpiade_filter->name;
        } else {
            $participants = User::with(["point", "olimpiade"])->where('role', 'user')->get();
        }
        return view('admin.participant.index', compact('participants', 'olimpiade_filter', 'olimpiades'));
    }

    public function create()
    {
        $olimpiades = Olimpiade::all();
        return view('admin.participant.create', compact('olimpiades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'olimpiade_id' => 'required',
        ]);

        $participant = new User();
        $participant->name = $request->name;
        $participant->email = $request->email;
        $participant->olimpiade_id = $request->olimpiade_id;
        $participant->password = bcrypt("secret1234");
        $participant->role = 'user';
        $participant->login_id = Str::random(10) . $request->olimpiade_id;
        $participant->save();

        return redirect()->route('participant')->with('success', 'Peserta berhasil ditambahkan');
    }

    public function show($id)
    {
        $participant = User::find($id);
        return view('admin.participant.show', compact('participant'));
    }

    public function changePassword($id)
    {
        $participant = User::find($id);
        return view('admin.participant.edit', compact('participant'));
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|confirmed',
        ]);

        $participant = User::find($id);
        $participant->password = bcrypt($request->password);
        $participant->save();

        return redirect()->route('participant')->with('success', 'Password berhasil diubah');
    }

    public function destroy($id)
    {
        $participant = User::find($id);
        $participant->delete();

        return redirect()->route('participant')->with('success', 'Peserta berhasil dihapus');
    }
}
