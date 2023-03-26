<?php

namespace App\Http\Controllers\Wali;

use App\Http\Controllers\Controller;
use App\Models\BankSekolah;
use App\Models\Biaya;
use App\Models\Tagihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WaliMuridTagihanController extends Controller
{
  public function index()
  {
    // $siswaId = Auth::user()->siswa->pluck('id');
    $siswaId = Auth::user()->getAllSiswaId();
    return view('wali.tagihan_index', [
      'tagihan' =>  Tagihan::waliSiswa()->get(),
    ]);
  }

  public function show($id)
  {
    // $siswaId = Auth::user()->siswa->pluck('id');
    // $siswaId = Auth::user()->getAllSiswaId();
    // $tagihan = Tagihan::whereIn('siswa_id', $siswaId)->findOrFail($id);
    $tagihan = Tagihan::waliSiswa()->findOrFail($id);
    $data['tagihan'] = $tagihan;
    $data['siswa'] = $tagihan->siswa;
    $data['banksekolah'] = BankSekolah::all();

    return view('wali.tagihan_show', $data);
  }
}