<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AnswerController extends Controller
{
    public function quiz()
    {
        if (Auth::user()->role == 'admin' || Auth::user()->finish) {
            return redirect()->route('dashboard');
        }
        $start_time = Carbon::parse(Auth::user()->olimpiade->start_date, 'Asia/Jakarta');
        $end_time = Carbon::parse(Auth::user()->olimpiade->end_date, 'Asia/Jakarta');
        if (Carbon::now('Asia/Jakarta')->lt($start_time) || Carbon::now('Asia/Jakarta')->gt($end_time)) {
            return redirect()->route('dashboard');
        }
        $room = Auth::user()->olimpiade->slug . "-olimpiade12345";
        $questions = Question::select(['id', 'question', 'answer1', 'answer2', 'answer3', 'answer4'])
            ->where('olimpiade_id', Auth::user()->olimpiade->id)->get();
        return view('user.quiz', compact('questions', 'start_time', 'end_time', 'room'));
    }

    public function peekExpandTime()
    {
        $start_time = Carbon::parse(Auth::user()->olimpiade->start_date, 'Asia/Jakarta');
        $end_time = Carbon::parse(Auth::user()->olimpiade->end_date, 'Asia/Jakarta');
        return response()->json([
            "code" => 200,
            "data" => [
                "start_time" => $start_time->format('Y-m-d H:i:s'),
                "end_time" => $end_time->format('Y-m-d H:i:s')
            ]
        ]);
    }

    public function submit(Request $request)
    {
        if (Auth::user()->finish) {
            return redirect()->route("dashboard");
        }
        $answers = $request->validate([
            "*.question_id" => "required|exists:questions,id",
            "*.answer" => "required"
        ]);
        DB::beginTransaction();
        try {
            $count = 0;
            $answered_questions = [];
            foreach ($answers as $answer) {
                $answer["user_id"] = Auth::id();
                Answer::updateOrCreate(["question_id" => $answer["question_id"], "user_id" => $answer["user_id"]], $answer);
                $count++;
                $answered_questions[] = $answer["question_id"];
            }
            DB::commit();
            return response()->json([
                "code" => 200,
                "message" => "created " . $count . " answer",
                "data" => [
                    "created" => $count,
                    "answered" => $answered_questions
                ]
            ]);
        } catch (Exception $err) {
            DB::rollBack();
            return response()->json([
                "code" => 500,
                "error" => "internal error",
            ], 500);
        }
    }

    public function finish()
    {
        $user = User::find(Auth::id());
        $user->finish = true;
        $user->save();
        return response()->json([
            "code" => 200,
            "message" => "finish"
        ]);
    }
}
