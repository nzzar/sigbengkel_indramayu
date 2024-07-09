<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sparepart;
use App\Models\Bengkel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SparepartController extends Controller
{
    public function sparepart()
    {
        $userId = Auth::id(); // Dapatkan ID pengguna yang sedang login
        $spareparts = Sparepart::where('user_id', $userId)->get(); // Ambil sparepart berdasarkan user_id
        $bengkels = Bengkel::all(); // Mengambil semua data bengkel
        return view('admin.layouts.tambahsparepart', compact('spareparts', 'bengkels'));
    }

    public function create()
    {
        $bengkels = Bengkel::all(); // Ambil semua data bengkel
        return view('admin.layouts.create_sparepart', compact('bengkels'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'bengkel_id' => 'required|exists:bengkels,id' // Validasi bengkel_id
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $sparepart = [
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => Auth::id(), // Tetapkan user_id sebagai ID pengguna yang sedang login
            'bengkel_id' => $request->bengkel_id
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = date('Y-m-d') . '_' . $image->getClientOriginalName();
            $path = 'public/photo-sparepart/' . $filename;

            $directory = dirname(storage_path('app/' . $path));
            if (!is_dir($directory)) {
                mkdir($directory, 0755, true);
            }

            $image->storeAs('public/photo-sparepart', $filename);
            $sparepart['image'] = $filename;
        }

        Sparepart::create($sparepart);

        return redirect('/admin/sparepart')->with('success', 'Data sparepart berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $sparepart = Sparepart::findOrFail($id);
        $bengkels = Bengkel::all(); // Ambil semua data bengkel
        return view('admin.layouts.edit_sparepart', compact('sparepart', 'bengkels'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'bengkel_id' => 'required|exists:bengkels,id' // Validasi bengkel_id
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $sparepart = Sparepart::findOrFail($id);
        $sparepart->title = $request->title;
        $sparepart->description = $request->description;
        $sparepart->bengkel_id = $request->bengkel_id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = date('Y-m-d') . '_' . $image->getClientOriginalName();
            $path = 'public/photo-sparepart/' . $filename;

            $directory = dirname(storage_path('app/' . $path));
            if (!is_dir($directory)) {
                mkdir($directory, 0755, true);
            }

            $image->storeAs('public/photo-sparepart', $filename);
            $sparepart->image = $filename;
        }

        $sparepart->save();

        return redirect('/admin/sparepart')->with('success', 'Data sparepart berhasil diperbarui!');
    }

    public function delete(Request $request, $id)
    {
        $sparepart = Sparepart::findOrFail($id);

        if ($sparepart) {
            $sparepart->delete();
        }

        return redirect('/admin/sparepart')->with('success', 'Data sparepart berhasil dihapus!');
    }
}
