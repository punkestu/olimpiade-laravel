<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParticipantResetController extends Controller
{
    public function reset()
    {
        DB::transaction(function () {
            User::where('role', 'user')->update(['finish' => 0, 'is_login' => 0]);
            Answer::all()->each->delete();
        });
        return redirect()->back()->with('success', 'Berhasil mereset semua peserta');
    }

    public function resetOne($id)
    {
        DB::transaction(function () use ($id) {
            User::where('id', $id)->update(['finish' => 0, 'is_login' => 0]);
            Answer::where('user_id', $id)->delete();
        });
        return redirect()->back()->with('success', 'Berhasil mereset peserta');
    }
}
