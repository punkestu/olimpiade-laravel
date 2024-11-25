<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Spatie\Browsershot\Browsershot;
use Spatie\LaravelPdf\Facades\Pdf;

class QuestionExportController extends Controller
{
    public function exportPdf()
    {
        $html = View::make('question.pdf', ['questions' => Question::all()])->render();
        $result = Browsershot::html($html)
            ->setNodeBinary(env('NODE_BINARY')) // Pull from .env
            ->setNpmBinary(env('NPM_BINARY'))  // Pull from .env
            ->pdf();

        return response($result)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="generated.pdf"');
        //return view('question.pdf', ['questions' => Question::all()]);
    }
}
