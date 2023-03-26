<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBiayaRequest;
use App\Http\Requests\StoreSiswaRequest;
use App\Http\Requests\UpdateBiayaRequest;
use App\Http\Requests\UpdateSiswaRequest;
use App\Models\User;

use Illuminate\Http\Request;
use App\Models\Biaya as Model;
use Illuminate\Support\Facades\Storage;

class BiayaController extends Controller
{
  private $viewIndex = 'biaya_index';
  private $viewCreate = 'biaya_form';
  private $viewEdit = 'biaya_form';
  private $viewShow = 'biaya_show';
  private $routePrefix = 'biaya';
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    // simbol <> tidak sama dengan
    // Model::query();

    if ($request->filled('q')) {
      $models = Model::with('user')->search($request->q)->paginate(50);
    } else {
      $models = Model::with('user')->latest()->paginate(50);
    }

    return view('operator.biaya.' . $this->viewIndex, [
      'models' =>   $models,
      'routePrefix' => $this->routePrefix,
      'title' => 'DATA BIAYA',
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $data = [
      'model' => new Model(),
      'method' => 'POST',
      'route' => $this->routePrefix . '.store',
      'button' => 'SIMPAN',
      'title' => 'FORM DATA BIAYA',
    ];

    return view('operator.biaya.' . $this->viewCreate, $data);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreBiayaRequest $request)
  {
    Model::create($request->validated());
    flash('Data berhasil disimpan');
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
    return view('operator.' . $this->viewShow, [
      'model' => Model::findOrFail($id),
      'title' => 'DETAIL SISWA',
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $data = [
      'model' => Model::findOrFail($id),
      'method' => 'PUT',
      'route' => [$this->routePrefix . '.update', $id],
      'button' => 'UPDATE',
      'title' => 'FROM DATA BIAYA',

    ];

    return view('operator.biaya' . $this->viewEdit, $data);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateBiayaRequest $request, $id)
  {
    $model = Model::findOrFail($id);
    $model->fill($request->validated());
    $model->save();
    flash('Data berhasil diubah');
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
    $model = Model::firstOrFail();
    if ($model->foto != null) {
      Storage::delete($model->foto);
    }
    $model->delete();

    flash('Data berhsil dihapus');
    return back();
  }
}