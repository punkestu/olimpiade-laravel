<?php

namespace App\Http\Controllers;

use App\Exports\PointExport;
use App\Models\Olimpiade;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PointExportController extends Controller
{
    public function export($id)
    {
        $olimpiade = Olimpiade::find($id);
        $participants = $olimpiade->participants;
        $filename = 'Point ' . $olimpiade->name . '.xlsx';
        $points = [[
            'Nama',
            'Asal Sekolah',
            'Kelas',
            'Poin',
            'Benar',
            'Salah',
            'Kosong',
            'Waktu Submit'
        ]];
        foreach ($participants as $participant) {
            $points[] = [
                $participant->name,
                $participant->asal_sekolah,
                $participant->kelas,
                $participant->point->count() > 0 ? $participant->point->sum('poin') - $participant->minusPoint->count() : "0",
                (string)$participant->point->count(),
                (string)$participant->minusPoint->count(),
                (string)($olimpiade->questions->count() - $participant->point->count() - $participant->minusPoint->count()),
                $participant->finish_time ?? "Kehabisan waktu"
            ];
        }

        return Excel::download(new PointExport($points), $filename);
    }
}
