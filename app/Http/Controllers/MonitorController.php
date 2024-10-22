<?php

namespace App\Http\Controllers;

use App\Models\Monitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MonitorController extends Controller
{
    public function index(Request $request)
    {
        $offset = $request->query("offset", 0);
        $pantau = $request->query("pantau");
        $daftarpantau = [];
        if ($pantau) {
            $monitor = Monitor::where("user_id", $pantau)->orderBy("created_at", "desc")->limit(10)->offset($offset)->get();
        } else {
            $daftarpantau = Monitor::select("users.id", "users.login_id")->join("users", "user_id", "users.id")->distinct()->get();
            $monitor = Monitor::orderBy("created_at", "desc")->limit(10)->offset($offset)->get();
        }
        return view("admin.monitor.index", ["monitor" => $monitor, "offset" => $offset, "pantau" => $pantau, "daftarpantau" => $daftarpantau]);
    }
    public function listen(Request $request)
    {
        $data = $request->validate([
            "*.code" => "required",
            "*.message" => "required",
            "*.data" => "nullable",
        ]);

        DB::beginTransaction();
        foreach ($data as $defect) {
            $defect["user_id"] = Auth::id();
            Monitor::create($defect);
        }
        DB::commit();

        return response()->json([
            "code" => 200,
            "message" => "Monitored",
        ]);
    }
}
