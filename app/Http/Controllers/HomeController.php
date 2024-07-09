<?php

namespace App\Http\Controllers;

use App\Models\Bengkel;
use App\Models\Sparepart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $data = Bengkel::all();
        return view('userpage.layouts.main', compact('data'));
    }

    public function peta(){
        return view('userpage.maps');
    }

    public function bengkel(){
        $data = Bengkel::all();
        return view('userpage.bengkel', compact('data'));
    }

    public function detail_bengkel($id){
        $data = Bengkel::findOrFail($id);

        // Return view with the bengkel data
        return view('userpage.detail-bengkel', compact('data'));
    }

    public function sparepart(Request $request)
    {
        $bengkelId = $request->input('bengkel_id'); // Ambil input bengkel_id dari request

        if ($bengkelId) {
            // Jika ada bengkel yang dipilih, ambil spareparts dari bengkel tersebut
            $spareparts = Sparepart::where('bengkel_id', $bengkelId)->get();
        } else {
            // Jika tidak ada bengkel yang dipilih, ambil semua spareparts
            $spareparts = Sparepart::all();
        }

        $bengkels = Bengkel::all(); // Ambil semua data bengkel untuk dropdown

        return view('userpage.sparepart', compact('spareparts', 'bengkels', 'bengkelId'));
    }

    public function sparepart_bengkel($id)
{
    $spareparts = Sparepart::where('bengkel_id', $id)->get();
    $bengkel = Bengkel::findOrFail($id); // Untuk mendapatkan detail bengkel

    return view('userpage.sparepart-bengkel', compact('spareparts', 'bengkel'));
}


    public function profile(){
        return view('userpage.profile');
    }
}
