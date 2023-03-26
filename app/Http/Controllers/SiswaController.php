<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSiswaRequest;
use App\Http\Requests\UpdateSiswaRequest;
use App\Models\User;

use function Ramsey\Uuid\v1;
use Illuminate\Http\Request;
use App\Models\Siswa as Model;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
  private $viewIndex = 'siswa.siswa_index';
  private $viewCreate = 'siswa.siswa_form';
  private $viewEdit = 'siswa.siswa_form';
  private $viewShow = 'siswa.siswa_show';
  private $routePrefix = 'siswa';
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
      $models = Model::search($request->q)->paginate(50);
    } else {
      $models = Model::with('wali', 'user')->latest()->paginate(50);
    }

    return view('operator.' . $this->viewIndex, [
      'models' =>   $models,
      'routePrefix' => $this->routePrefix,
      'title' => 'DATA SISWA',
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
      'title' => 'FORM DATA SISWA',
      'wali' => User::where('akses', 'wali')->pluck('name', 'id'),
    ];

    return view('operator.' . $this->viewCreate, $data);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreSiswaRequest $request)
  {
    // dd($request->all());
    $requestData = $request->validated();

    if ($request->hasFile('foto')) {
      $requestData['foto'] = $request->file('foto')->store('public');
    }

    if ($request->filled('wali_id')) {
      $requestData['wali_status'] = 'ok';
    }

    $requestData['user_id'] = auth()->user()->id;

    Model::create($requestData);
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
      'title' => 'EDIT DATA SISWA',
      'wali' => User::where('akses', 'wali')->pluck('name', 'id'),

    ];

    return view('operator.' . $this->viewEdit, $data);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateSiswaRequest $request, $id)
  {
    $requestData = $request->validated();

    $model = Model::findOrFail($id);

    if ($request->hasFile('foto')) {
      Storage::delete($model->foto);
      $requestData['foto'] = $request->file('foto')->store('public');
    }

    if ($request->filled('wali_id')) {
      $requestData['wali_status'] = 'ok';
    }

    $requestData['user_id'] = auth()->user()->id;

    $model->fill($requestData);
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
