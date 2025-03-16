<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'olimpiade_name',
        'olimpiade_logo',
        'olimpiade_loadinglogo',
        'olimpiade_banner',
    ];

    public static function getOlimpiade()
    {
        $setting = Setting::first();
        if ($setting) {
            return $setting;
        }
        Setting::setOlimpiade('Olimpiade', '/image/icon.png', '/image/loading.gif', '/image/background/dashboard.png');
        return Setting::first();
    }

    public static function setOlimpiade($name, $logo, $loadinglogo, $banner)
    {
        $setting = Setting::first();
        if (!$setting) {
            $setting = new Setting();
        }
        $setting->olimpiade_name = $name;
        if ($logo) {
            $setting->olimpiade_logo = $logo;
        }
        if ($loadinglogo) {
            $setting->olimpiade_loadinglogo = $loadinglogo;
        }
        if ($banner) {
            $setting->olimpiade_banner = $banner;
        }
        $setting->save();
    }
}
