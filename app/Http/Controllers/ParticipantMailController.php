<?php

namespace App\Http\Controllers;

use App\Mail\ParticipantMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ParticipantMailController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $participant = User::find($request->participant_id);
        if (!$participant) {
            return response()->json(['message' => 'Peserta tidak ditemukan'], 404);
        }
        $mail = new ParticipantMail($participant);
        Mail::to($participant->email)->send($mail);
        return response()->json([
            'message' => 'Email berhasil dikirim',
            "data" => [
                "email" => $participant->email,
                "name" => $participant->name,
            ]
        ], 200);
    }

    public function batchStore(Request $request)
    {
        $request->validate([
            "olimpiade_id" => "required|exists:olimpiades,id"
        ]);
        $participants = User::where('olimpiade_id', $request->olimpiade_id)->get();
        $count = 0;
        foreach ($participants as $participant) {
            if ($participant->sent_email) {
                continue;
            }
            $mail = new ParticipantMail($participant);
            Mail::to($participant->email)->send($mail);
            $participant->sent_email = true;
            $participant->save();
            $count++;
        }
        return response()->json([
            'message' => 'Email berhasil dikirim',
            "data" => [
                "sent_count" => $count
            ]
        ], 200);
    }
}
