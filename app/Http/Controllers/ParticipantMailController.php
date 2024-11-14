<?php

namespace App\Http\Controllers;

use App\Mail\ParticipantMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ParticipantMailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

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

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
