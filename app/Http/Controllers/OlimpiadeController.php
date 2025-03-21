<?php

namespace App\Http\Controllers;

use App\Models\Images;
use App\Models\Olimpiade;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OlimpiadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $olimpiades = Olimpiade::with(["participants"])->get();
        foreach ($olimpiades as $olimpiade) {
            $olimpiade->start_date = Carbon::parse($olimpiade->start_date, 'Asia/Jakarta');
            $olimpiade->end_date = Carbon::parse($olimpiade->end_date, 'Asia/Jakarta');
        }
        $now = Carbon::now('Asia/Jakarta');
        return view('admin.olimpiade.index', compact('olimpiades', 'now'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $images = Images::all();
        return view('admin.olimpiade.create', compact("images"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', function ($_, $value, $fail) {
                if (Olimpiade::where('slug', Str::slug($value))->exists()) {
                    $fail('Nama tidak bisa digunakan');
                }
            }],
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'start_date' => 'required',
            'start_time' => 'required',
            'end_date' => ['required', function ($_, $value, $fail) use ($request) {
                $value = Carbon::parse($request->end_date . ' ' . $request->end_time, "Asia/Jakarta");
                $start_date = Carbon::parse($request->start_date . ' ' . $request->start_time, "Asia/Jakarta");
                if ($value <= $start_date) {
                    $fail('Tanggal Selesai harus setelah Tanggal Mulai');
                }
            }],
            'end_time' => 'required',
        ], [
            'name.required' => 'Nama harus diisi',
            'description.required' => 'Deskripsi harus diisi',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'File harus berformat jpeg, png, jpg, gif, atau svg',
            'image.max' => 'Ukuran file maksimal 2MB',
            'start_date.required' => 'Tanggal Mulai harus diisi',
            'start_time.required' => 'Waktu Mulai harus diisi',
            'end_date.required' => 'Tanggal Selesai harus diisi',
            'end_time.required' => 'Waktu Selesai harus diisi',
        ]);
        if ($request->hasFile('image'))
            $data['image'] = $request->file('image')->store('olimpiade', 'public');
        else
            $data['image'] = '';
        $data['start_date'] = Carbon::parse($request->start_date . ' ' . $request->start_time)->format("Y-m-d H:i:s");
        $data['end_date'] = Carbon::parse($request->end_date . ' ' . $request->end_time)->format("Y-m-d H:i:s");
        $data['slug'] = Str::slug($request->name);
        Olimpiade::create($data);
        return redirect()->route('olimpiade.index')->with('success', 'Olimpiade berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Olimpiade $olimpiade)
    {
        $olimpiade = Olimpiade::with(["questions"])->find($olimpiade->id);
        if ($olimpiade == null) return abort(404);
        $olimpiade->start_date = Carbon::parse($olimpiade->start_date, 'Asia/Jakarta');
        $olimpiade->end_date = Carbon::parse($olimpiade->end_date, 'Asia/Jakarta');
        $images = Images::all();
        return view('admin.olimpiade.show', compact('olimpiade', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Olimpiade $olimpiade)
    {
        $olimpiade = Olimpiade::find($olimpiade->id);
        if ($olimpiade == null) return abort(404);
        $start_date = Carbon::parse($olimpiade->start_date);
        $end_date = Carbon::parse($olimpiade->end_date);
        $olimpiade["start_time"] = $start_date->format('H:i');
        $olimpiade["start_date"] = $start_date->format('d/m/Y');
        $olimpiade["end_time"] = $end_date->format('H:i');
        $olimpiade["end_date"] = $end_date->format('d/m/Y');
        $images = Images::all();
        return view('admin.olimpiade.edit', compact('olimpiade', 'images'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Olimpiade $olimpiade)
    {
        $data = $request->validate([
            'name' => ['required', function ($_, $value, $fail) use ($olimpiade) {
                if (Olimpiade::where('slug', Str::slug($value))->where('id', '!=', $olimpiade->id)->exists()) {
                    $fail('Nama tidak bisa digunakan');
                }
            }],
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'start_date' => 'required',
            'start_time' => 'required',
            'end_date' => ['required', function ($_, $value, $fail) use ($request) {
                $value = Carbon::parse($request->end_date . ' ' . $request->end_time, "Asia/Jakarta");
                $start_date = Carbon::parse($request->start_date . ' ' . $request->start_time, "Asia/Jakarta");
                if ($value <= $start_date) {
                    $fail('Tanggal Selesai harus setelah Tanggal Mulai');
                }
            }],
            'end_time' => 'required',
        ], [
            'name.required' => 'Nama harus diisi',
            'description.required' => 'Deskripsi harus diisi',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'File harus berformat jpeg, png, jpg, gif, atau svg',
            'image.max' => 'Ukuran file maksimal 2MB',
            'start_date.required' => 'Tanggal Mulai harus diisi',
            'start_time.required' => 'Waktu Mulai harus diisi',
            'end_date.required' => 'Tanggal Selesai harus diisi',
            'end_time.required' => 'Waktu Selesai harus diisi',
        ]);
        if ($request->hasFile('image'))
            $data['image'] = $request->file('image')->store('olimpiade', 'public');
        $data['start_date'] = Carbon::parse($request->start_date . ' ' . $request->start_time, "Asia/Jakarta")->format("Y-m-d H:i:s");
        $data['end_date'] = Carbon::parse($request->end_date . ' ' . $request->end_time, "Asia/Jakarta")->format("Y-m-d H:i:s");
        $data['slug'] = Str::slug($request->name);
        Olimpiade::find($olimpiade->id)->update($data);
        return redirect()->route('olimpiade.index')->with('success', 'Olimpiade berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Olimpiade::destroy($request->id);
        return redirect()->route('olimpiade.index')->with('success', 'Olimpiade berhasil dihapus');
    }
}
