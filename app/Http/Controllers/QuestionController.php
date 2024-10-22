<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'question' => 'required|string',
            'answer1' => 'required|string',
            'answer2' => 'required|string',
            'answer3' => 'required|string',
            'answer4' => 'required|string',
            'poin' => 'required|integer',
            'correct_answer' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('modal', "create-question")
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();
        $olimpiade_id = $request->query('olimpiade');
        $data['olimpiade_id'] = $olimpiade_id;

        Question::create($data);

        return redirect()->route('olimpiade.show', $data['olimpiade_id']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function update($question_id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'question' => 'required|string',
            'answer1' => 'required|string',
            'answer2' => 'required|string',
            'answer3' => 'required|string',
            'answer4' => 'required|string',
            'correct_answer' => 'required|integer',
            'poin' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('modal', "edit-question")
                ->with('question_id', $question_id)
                ->withErrors($validator)
                ->withInput();
        }

        $question = Question::find($question_id);
        $question->update($request->all());

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($question_id)
    {
        Question::destroy($question_id);

        return redirect()->back();
    }
}
