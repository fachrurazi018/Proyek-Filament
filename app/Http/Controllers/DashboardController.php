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
        $kegiatan = Kegiatan::with('umkm')->get();
        return view('user.dashboard',compact('pemiliks','umkm','kegiatan'));
    }  

    public function show(Umkm $umkm){
        $umkm->load('pemilik_umkm');
        return view('user.detail', compact('umkm'));
    }
}
