<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonitorSummary extends Model
{
    protected $table = "monitor_summaries";
    protected $fillable = ["user_id", "is_focused", "is_fullscreen", "screen_window_size"];
    protected $casts = [
        "is_focused" => "boolean",
        "is_fullscreen" => "boolean",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
