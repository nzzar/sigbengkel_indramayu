<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sparepart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SparepartController extends Controller
{
    public function sparepart()
    {
        $sparepart = Sparepart::get();

        return view('admin.layouts.tambahsparepart', compact('sparepart'));
    }

    public function create(){
        return view('admin.layouts.create_sparepart');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $sparepart = [
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => Auth::id(), // User ID from the logged-in user
            'bengkel_id' => Auth::id() // Assuming bengkel_id is the same as user_id for now
        ];

        // Handle the file upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = date('Y-m-d') . '.' . $image->getClientOriginalName();
            $path = 'public/photo-user/' . $filename;

            // Ensure the directory exists
            $directory = dirname(storage_path('app/' . $path));
            if (!is_dir($directory)) {
                mkdir($directory, 0755, true);
            }

            // Store the image
            $image->storeAs('public/photo-sparepart', $filename);
            $sparepart['image'] = $filename;
        }

        Sparepart::create($sparepart);

        return redirect('/admin/sparepart')->with('success', 'Data sparepart berhasil ditambahkan!');
    }

    public function edit(Request $request, $id){
        $sparepart = Sparepart::find($id);

        return view('admin.layouts.edit_sparepart', compact('sparepart'));
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $sparepart = [
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => Auth::id(), // User ID from the logged-in user
            'bengkel_id' => Auth::id() // Assuming bengkel_id is the same as user_id for now
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = date('Y-m-d') . '.' . $image->getClientOriginalName();
            $path = 'public/photo-user/' . $filename;

            // Ensure the directory exists
            $directory = dirname(storage_path('app/' . $path));
            if (!is_dir($directory)) {
                mkdir($directory, 0755, true);
            }

            // Store the image
            $image->storeAs('public/photo-sparepart', $filename);
            $sparepart['image'] = $filename;
        }

        Sparepart::whereId($id)->update($sparepart);

        return redirect('/admin/sparepart')->with('success', 'Data sparepart berhasil diperbarui!');
    }
}
