<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function dashboard(){
        // dd(auth()->user()->getRoleNames());

        return view('admin.dashboard');
    }

    public function pemilik(){
        $pemilik = User::get();

        return view('admin.layouts.tambahpemilik', compact('pemilik'));
    }

    public function create(){
        return view('admin.layouts.create_user');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $photo = $request->file('photo');
        $filename = date('Y-m-d').$photo->getClientOriginalName();
        $path = 'photo-user/'.$filename;

        Storage::disk('public')->put($path, file_get_contents($photo));

        $pemilik['name'] = $request->nama;
        $pemilik['email'] = $request->email;
        $pemilik['password'] = Hash::make($request->password);
        $pemilik['image'] = $filename;

        User::create($pemilik);

        return redirect('/admin/pemilik')->with('success', 'Data Pemilik Berhasil Ditambah');
    }

    public function edit($id){
        $pemilik = User::find($id);

        return view('admin.layouts.edit_user', compact('pemilik'));
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'nullable',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $pemilik = User::findOrFail($id);

        $updateData = [
            'name' => $request->nama,
            'email' => $request->email,
        ];

        if($request->password){
            $updateData['password'] = Hash::make($request->password);
        }

        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($pemilik->image) {
                Storage::disk('public')->delete('photo-user/' . $pemilik->image);
            }

            // Simpan foto baru
            $photo = $request->file('photo');
            $filename = date('Y-m-d').$photo->getClientOriginalName();
            $path = 'photo-user/' . $filename;


            Storage::disk('public')->put($path, file_get_contents($photo));
            $updateData['image'] = $filename;
        }

        $pemilik->update($updateData);

        return redirect('/admin/pemilik')->with('success', 'Data Pemilik Berhasil Diperbarui');
    }

    public function delete($id){
        $pemilik = User::find($id);

        if($pemilik){
            if ($pemilik->image) {
                Storage::disk('public')->delete('photo-user/' . $pemilik->image);
            }
            $pemilik->delete();
        }
        return redirect('/admin/pemilik')->with('success', 'Data Pemilik Berhasil Dihapus');
    }
}
