<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\PemilikUmkm;
use App\Models\Umkm;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $pemiliks = PemilikUmkm::get();
        $umkm = Umkm::get();
        $kegiatan = Kegiatan::get();
        return view('user.dashboard',compact('pemiliks','umkm','kegiatan'));
    }  

    public function show(){
        $umkm = Umkm::with('pemilik_umkm')->get();
        return view('user.detail', compact('umkm'));
    }
}
