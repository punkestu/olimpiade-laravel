<?php

namespace App\Http\Controllers;

use App\Models\Olimpiade;
use Illuminate\Http\Request;

class PointExportController extends Controller
{
    public function export($id) {
        $olimpiade = Olimpiade::find($id);
        $participants = $olimpiade->participants;

        $filename = 'tmp/Point ' . $olimpiade->name . '.csv';
        $handle = fopen($filename, 'w+');

        fputcsv($handle, ['Nama', 'Asal Sekolah', 'Kelas', 'Nilai']);

        foreach ($participants as $participant) {
            fputcsv($handle, [$participant->name, $participant->asal_sekolah, $participant->kelas, $participant->point->sum('poin') - $participant->minusPoint->count()]);
        }

        fclose($handle);

        $headers = [
            'Content-Type' => 'text/csv',
        ];

        return response()->download($filename, 'Point ' . $olimpiade->name . '.csv', $headers);
    }
}
