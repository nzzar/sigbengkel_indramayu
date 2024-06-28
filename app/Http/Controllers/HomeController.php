<?php

namespace App\Http\Controllers;

use App\Models\Bengkel;
use Illuminate\Http\Request;

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

    public function profile(){
        return view('userpage.profile');
    }
}
