<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SiteSettingController extends Controller
{
    public function index()
    {
        return view('sitesetting.index');
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'olimpiade_name' => 'required|string',
        ], [
            'olimpiade_name.required' => 'Judul situs tidak boleh kosong',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $logo = false;
        $loadinglogo = false;
        $banner = false;
        if ($request->hasFile('olimpiade_logo')) {
            $validator = Validator::make($request->all(), [
                'olimpiade_logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ], [
                'olimpiade_logo.image' => 'Logo harus berupa gambar',
                'olimpiade_logo.mimes' => 'Logo harus berupa gambar dengan format jpeg, png, jpg, gif, atau svg',
                'olimpiade_logo.max' => 'Ukuran logo maksimal 2MB',
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $imageName = $request->olimpiade_logo->store('images', "public");
            $logo = '/storage/' . $imageName;
        }
        if ($request->hasFile('olimpiade_loadinglogo')) {
            $validator = Validator::make($request->all(), [
                'olimpiade_loadinglogo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ], [
                'olimpiade_loadinglogo.image' => 'Logo harus berupa gambar',
                'olimpiade_loadinglogo.mimes' => 'Logo harus berupa gambar dengan format jpeg, png, jpg, gif, atau svg',
                'olimpiade_loadinglogo.max' => 'Ukuran logo maksimal 2MB',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $imageName = $request->olimpiade_loadinglogo->store('images', "public");
            $loadinglogo = '/storage/' . $imageName;
        }
        if ($request->hasFile('olimpiade_banner')) {
            $validator = Validator::make($request->all(), [
                'olimpiade_banner' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ], [
                'olimpiade_banner.image' => 'Logo harus berupa gambar',
                'olimpiade_banner.mimes' => 'Logo harus berupa gambar dengan format jpeg, png, jpg, gif, atau svg',
                'olimpiade_banner.max' => 'Ukuran logo maksimal 2MB',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $imageName = $request->olimpiade_banner->store('images', "public");
            $banner = '/storage/' . $imageName;
        }

        Setting::setOlimpiade($request->olimpiade_name, $logo, $loadinglogo, $banner);

        return redirect()->route("sitesetting")->with('success', 'Situs berhasil diupdate');
    }
}
