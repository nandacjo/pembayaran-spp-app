<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use function Ramsey\Uuid\v1;

use Illuminate\Http\Request;
use App\Models\User as Model;

class WaliController extends Controller
{
  private $viewIndex = 'wali_index';
  private $viewCreate = 'user_form';
  private $viewEdit = 'user_form';
  private $viewShow = 'wali_show';
  private $routePrefix = 'wali';
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    // simbol <> tidak sama dengan

    return view('operator.' . $this->viewIndex, [
      'models' =>   $models = Model::wali()->latest()->paginate(50),
      'routePrefix' => $this->routePrefix,
      'title' => 'DATA WALI MURID',
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
      'title' => 'CREATE DATA WALI MURID'
    ];

    return view('operator.' . $this->viewCreate, $data);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    // dd($request->all());
    $requestData = $request->validate([
      'name' => 'required',
      'email' => 'required|unique:users',
      'nohp' => 'required|unique:users',
      'password' => 'required',
    ]);

    $requestData['password'] = bcrypt($requestData['password']);
    $requestData['email_verified_at'] = now();
    $requestData['akses'] = 'wali';

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
      'siswa' => Siswa::whereNotIn('wali_id', [$id])->orWhere('wali_id', null)->pluck('nama', 'id'), //wherNotIn maksudnya jiak data murid sudah ada di wali maka tikda usah di tampilkan
      'model' => Model::wali()->where('id', $id)->firstOrFail(),
      'title' => 'DEATAIL DATA WALI MURID',
    ] );
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
      'title' => 'EDIT DATA WALI MURID'

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
  public function update(Request $request, $id)
  {
    $requestData = $request->validate([
      'name' => 'required',
      'nohp' => 'required|unique:users,nohp,' . $id,
      'email' => 'required|unique:users,email,' . $id,
      'password' => 'nullable',
    ]);

    $model = Model::findOrFail($id);
    if ($requestData['password'] == "") {
      unset($requestData['password']);
    } else {
      $requestData['password'] = bcrypt($requestData['password']);
    }
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
    $model = Model::where('akses', 'wali')->firstOrFail();

    $model->delete();
    flash('Data berhsil dihapus');
    return back();
  }
}
