<?php

namespace App\Http\Controllers;

use App\Models\Olimpiade;
use Illuminate\Support\Facades\View;
use Spatie\Browsershot\Browsershot;

class QuestionExportController extends Controller
{
    public function exportPdf($id)
    {
        $olimpiade = Olimpiade::find($id);
        $result = Browsershot::url('http://localhost:8000/questions/' . $id)
            ->setNodeBinary(env('NODE_BINARY')) // Pull from .env
            ->setNpmBinary(env('NPM_BINARY'))  // Pull from .env
            ->waitUntilNetworkIdle()
            ->pdf();

        return response($result)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="Soal ' . $olimpiade->name . '.pdf"');
    }

    public function questions($id)
    {
        $olimpiade = Olimpiade::find($id);
        $view = View::make('question.pdf', [
            'questions' => $olimpiade->questions,
            'olimpiade' => $olimpiade,
        ])->render();

        return $view;
    }
}
