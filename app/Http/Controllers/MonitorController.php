<?php

namespace App\Http\Controllers;

use App\Models\Monitor;
use App\Models\MonitorSummary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MonitorController extends Controller
{
    public function index(Request $request)
    {
        $offset = $request->query("offset", 0);
        $daftarpantau = MonitorSummary::limit(10)->offset($offset * 10)->get();
        return view("admin.monitor.index", ["offset" => $offset, "daftarpantau" => $daftarpantau]);
    }

    public function pantau($id, Request $request)
    {
        $offset = $request->query("offset", 0);
        $monitor = Monitor::where("user_id", $id)->orderBy("created_at", "desc")->limit(10)->offset($offset)->get();
        $summary = MonitorSummary::where("user_id", $id)->first();
        return view("admin.monitor.pantau", ["monitor" => $monitor, 'summary' => $summary, "offset" => $offset, "pantau" => $id]);
    }

    public function listen(Request $request)
    {
        $data = $request->validate([
            "*.code" => "required",
            "*.message" => "required",
            "*.data" => "nullable",
        ]);

        DB::beginTransaction();
        $summary = [];
        foreach ($data as $defect) {
            $defect["user_id"] = Auth::id();
            Monitor::create($defect);
            if ($defect["code"] == "tab") {
                $summary["is_focused"] = $defect["message"] == "visible";
            } else if ($defect["code"] == "screen") {
                $summary["is_fullscreen"] = $defect["message"] == "fullscreen";
                $summary["screen_window_size"] = $defect["data"];
            }
        }
        if ($summary) {
            $summary["user_id"] = Auth::id();
            MonitorSummary::updateOrCreate(["user_id" => $summary["user_id"]], $summary);
        }
        DB::commit();

        return response()->json([
            "code" => 200,
            "message" => "Monitored",
        ]);
    }
}
