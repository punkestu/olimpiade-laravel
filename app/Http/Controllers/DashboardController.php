<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'admin') return $this->adminDashboard();

        $olimpiade = User::find(Auth::id())->olimpiade;
        if (!$olimpiade) {
            Auth::logout();
            return redirect()->route('register')->withErrors('Anda belum terdaftar pada olimpiade manapun');
        }
        $olimpiade->start_date = Carbon::parse($olimpiade->start_date, 'Asia/Jakarta');
        $olimpiade->end_date = Carbon::parse($olimpiade->end_date, 'Asia/Jakarta');
        $now = Carbon::now('Asia/Jakarta');
        return view('user.dashboard', compact('olimpiade', 'now'));
    }

    private function adminDashboard()
    {
        return view('admin.dashboard');
    }
}
