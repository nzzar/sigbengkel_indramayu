<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bengkel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BengkelController extends Controller
{
    
    public function nearby(Request $request)
    {
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        $radius = 5; // Radius dalam km

        $bengkels = Bengkel::selectRaw(
            "id, user_id, title, description_bengkel, adress, telepon, latitude, longitude, image,
            (6371 * acos(cos(radians(?)) * cos(radians(latitude)) * cos(radians(longitude) - radians(?)) + sin(radians(?)) * sin(radians(latitude)))) AS distance",
            [$latitude, $longitude, $latitude]
        )->having("distance", "<", $radius)
         ->orderBy("distance")
         ->get();

        return response()->json($bengkels);
    }

    public function bengkel(Request $request)
    {
        $data = Bengkel::all();

        return view('admin.layouts.tambahbengkel', compact('data'));
    }

    public function create(){
        return view('admin.layouts.create_bengkel');
    }

    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'title' => 'required',
        'description_bengkel' => 'required',
        'adress' => 'required',
        'telepon' => 'required',
        'latitude' => 'required',
        'longitude' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg|max:2048'
    ]);

    // Tambahkan dd di sini untuk memeriksa hasil validasi
    if ($validator->fails()) {
        // dd($validator->errors());
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $data['title'] = $request->title;
    $data['description_bengkel'] = $request->description_bengkel;
    $data['adress'] = $request->adress;
    $data['telepon'] = $request->telepon;
    $data['latitude'] = $request->latitude;
    $data['longitude'] = $request->longitude;
    $data['user_id'] = Auth::id(); // Tambahkan user ID dari pengguna yang login

    // Handle the file upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = date('Y-m-d') . '.' . $image->getClientOriginalName();
        $image->storeAs('public/photo-bengkel', $filename);
        $data['image'] = $filename;
    }

    Bengkel::create($data);

    return redirect('/admin/bengkel')->with('success', 'Data bengkel berhasil ditambahkan!');
}


    public function edit(Request $request, $id){
        $data = Bengkel::find($id);

        return view('admin.layouts.edit_bengkel', compact('data'));
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description_bengkel' => 'required',
            'adress' => 'required',
            'telepon' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data['user_id'] = Auth::id();
        $data['title'] = $request->title;
        $data['description_bengkel'] = $request->description_bengkel;
        $data['adress'] = $request->adress;
        $data['telepon'] = $request->telepon;
        $data['longitude'] = $request->longitude;
        $data['latitude'] = $request->latitude;

        // Handle the file upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = date('Y-m-d') . '.' . $image->getClientOriginalName();
            $image->storeAs('public/photo-bengkel', $filename);
            $data['image'] = $filename;
        }

        Bengkel::whereId($id)->update($data);

        return redirect('/admin/bengkel')->with('success', 'Data bengkel berhasil diperbarui!');
    }

    public function delete(Request $request, $id){
        $data = Bengkel::find($id);

        if($data){
            $data->delete();
        }
        return redirect('/admin/bengkel')->with('success', 'Data Bengkel Berhasil Dihapus');
    }

}
