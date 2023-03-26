<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Http\Requests\StorePembayaranRequest;
use App\Http\Requests\UpdatePembayaranRequest;
use App\Models\Tagihan;

class PembayaranController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\StorePembayaranRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StorePembayaranRequest $request)
  {
    $requestData = $request->validated();
    $requestData['status_konfirmasi'] = 'sudah';
    $requestData['metode_pembayaran'] = 'manual';

    $tagihan = Tagihan::findOrFail($requestData['tagihan_id']);
    if ($requestData['jumlah_dibayar'] >= $tagihan->tagihanDetails->sum('jumlah_biaya')) {
      $tagihan->status = 'lunas';
    } else {
      $tagihan->status = 'angsur';
    }

    $tagihan->save();
    Pembayaran::create($requestData);
    flash('Pembayaran berhasil disimpan')->success();
    return back();
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Pembayaran  $pembayaran
   * @return \Illuminate\Http\Response
   */
  public function show(Pembayaran $pembayaran)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Pembayaran  $pembayaran
   * @return \Illuminate\Http\Response
   */
  public function edit(Pembayaran $pembayaran)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdatePembayaranRequest  $request
   * @param  \App\Models\Pembayaran  $pembayaran
   * @return \Illuminate\Http\Response
   */
  public function update(UpdatePembayaranRequest $request, Pembayaran $pembayaran)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Pembayaran  $pembayaran
   * @return \Illuminate\Http\Response
   */
  public function destroy(Pembayaran $pembayaran)
  {
    //
  }
}