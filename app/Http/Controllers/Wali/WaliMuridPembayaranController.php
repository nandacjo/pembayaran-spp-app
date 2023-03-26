<?php

namespace App\Http\Controllers\Wali;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\BankSekolah;
use App\Models\Pembayaran;
use App\Models\Tagihan;
use Illuminate\Http\Request;

class WaliMuridPembayaranController extends Controller
{
  public function create(Request $request)
  {
    // $data['tagihan'] =  Tagihan::where('id', $request->query('tagihan_id'))->first();
    // $data['bank_sekolah'] = Bank::findOrFail($request->bank_sekolah_id);
    $data['tagihan'] =  Tagihan::waliSiswa()->findOrFail($request->query('tagihan_id'));
    $data['model'] = new Pembayaran();
    $data['method'] = 'POST';
    $data['route'] = 'wali.pembayaran.store';
    $data['listBank'] = BankSekolah::pluck('nama_bank', 'id');

    if ($request->bank_sekolah_id != '') {
      $data['bankYangDipilih'] = BankSekolah::findOrFail($request->bank_sekolah_id);
    }
    $data['url'] = route('wali.pembayaran.create', [
      "tagihan_id" => $request->query('tagihan_id'),
    ]);
    return view('wali.pembayaran_form', $data);
  }
}