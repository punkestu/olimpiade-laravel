<?php

namespace App\Http\Controllers;

use App\Imports\ParticipantImport;
use App\Models\Olimpiade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class ParticipantImportController extends Controller
{
    public function import(Request $request) 
    {
        $request->validate([
            'participant_sheet' => 'required|file|mimes:xlsx,xls,csv|max:2048',
            'olimpiade_id' => 'required|exists:olimpiades,id'
        ]);

        Log::info("Importing....");

        $olimpiade = Olimpiade::find($request->olimpiade_id);
        Excel::import(new ParticipantImport($olimpiade), $request->file('participant_sheet')->getRealPath(), null, \Maatwebsite\Excel\Excel::XLSX);

        Log::info("Imported");
                 
        return back()->with('success', 'Users imported successfully.');
    }
}
