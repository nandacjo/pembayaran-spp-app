<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class WaliSiswaController extends Controller
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
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'wali_id' => 'required|exists:users,id', //cek apakah wali_id ada di tabel user
      'siswa_id' => 'required',
    ]);


    $siswa = Siswa::find($request->siswa_id);
    if ($siswa->wali_id != null) {
      flash("Wali murid siswa {$siswa->nama} sudah ada, silahkan pilih murid lain !!");
      return back();
    }
    $siswa->wali_id = $request->wali_id;
    $siswa->wali_status = 'ok';
    $siswa->save();
    flash('Data sudah ditambahkan')->success();
    return back();
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $siswa = Siswa::findOrFail($id);
    $siswa->wali_id = null;
    $siswa->wali_status = null;
    $siswa->save();
    flash('Data sudah dihapus')->success();
    return back();
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}