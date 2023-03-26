<?php

namespace App\Http\Controllers;

use App\Models\Biaya;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Tagihan as Model;
use PhpParser\Node\Stmt\Foreach_;
use App\Http\Requests\StoreTagihanRequest;
use App\Http\Requests\UpdateTagihanRequest;
use App\Models\Pembayaran;
use App\Models\TagihanDetail;

class TagihanController extends Controller
{
  private $viewIndex = 'tagihan.tagihan_index';
  private $viewCreate = 'tagihan.tagihan_form';
  private $viewEdit = 'tagihan.tagihan_form';
  private $viewShow = 'tagihan.tagihan_show';
  private $routePrefix = 'tagihan';
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    // Pencarian data berdasarkan bulan dan tahun
    if ($request->filled('bulan') && $request->filled('tahun')) {
      // $models = Model::with('user', 'siswa')->groupBy('siswa_id')->latest()
      $models = Model::latest()
        ->whereMonth('tanggal_tagihan', $request->bulan)
        ->whereYear('tanggal_tagihan', $request->tahun)
        ->paginate(50);
    } else {
      $models = Model::latest()->paginate(50);
    }

    // dd($models);

    return view('operator.' . $this->viewIndex, [
      'models' => $models,
      'routePrefix' => $this->routePrefix,
      'title' => 'DATA TAGIHAN',
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $siswa = Siswa::all();
    $data = [
      'model' => new Model(),
      'method' => 'POST',
      'route' => $this->routePrefix . '.store',
      'button' => 'SIMPAN',
      'title' => 'FORM DATA TAGIHAN',
      'angkatan' => $siswa->pluck('angkatan', 'angkatan'),
      'kelas' => $siswa->pluck('kelas', 'kelas'),
      'biaya' => Biaya::get(),
      // 'biaya' => Biaya::get()->pluck('nama_biaya_full', 'id'),

    ];

    return view('operator.' . $this->viewCreate, $data);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\StoreTagihanRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreTagihanRequest $request)
  {
    //1. Lakukan validasi
    $requestData = $request->validated();

    //2. Ambil data biaya yang ditagihkan
    $baiyaIdArray = $requestData['biaya_id'];

    //3. Ambil data siswa yang ditagih berdasarkan kelas atau berdasarkan angkatan
    $siswa = Siswa::query();
    if ($requestData['kelas'] != '') {
      $siswa->where('kelas', $requestData['kelas']);
    }
    if ($requestData['angkatan'] != '') {
      $siswa->where('angkatan', $requestData['angkatan']);
    }
    $siswa = $siswa->get();

    //4. Lakukan perulangan berdasarkan data siswa
    foreach ($siswa as $item) {
      $itemSiswa = $item;
      $biaya = Biaya::whereIn('id', $baiyaIdArray)->get();
      unset($requestData['biaya_id']);
      $requestData['siswa_id'] = $itemSiswa->id;
      $requestData['status'] = 'baru';

      // $tanggalTagihan = Carbon::parse($requestData['tanggal_jatuh_tempo']);
      $tanggalTagihan = Carbon::parse($requestData['tanggal_tagihan']);
      $bulanTagihan = $tanggalTagihan->format('m');
      $tahunTagihan = $tanggalTagihan->format('Y');
      $cekTagihan = Model::where('siswa_id', $itemSiswa->id)
        // ->where('nama_biaya', $itemBiaya->nama)
        ->whereMonth('tanggal_tagihan', $bulanTagihan)
        ->whereYear('tanggal_tagihan', $tahunTagihan)
        ->first();

      if ($cekTagihan == null) {
        $tagihan = Model::create($requestData);

        foreach ($biaya as $itemBiaya) {
          $detail = TagihanDetail::create([
            'tagihan_id' => $tagihan->id,
            'nama_biaya' => $itemBiaya->nama,
            'jumlah_biaya' => $itemBiaya->jumlah,
          ]);
        }
      }
    }


    //5. Didalam perulangan, simpan tagihan berdasarkan biaya dan siswa
    //6. Simpan notifkasi database untuk tagihan
    //7. Kirim pesan whatsapp
    //8. Redirect back() dengan pesan sukses
    flash('Data tagihan berahasi disimpan')->success();
    return back();
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Tagihan  $tagihan
   * @return \Illuminate\Http\Response
   */
  public function show(Request $request, $id)
  {
    // $tagihan = Model::with('siswa')->where('siswa_id', $request->siswa_id)
    //   ->whereMonth('tanggal_tagihan', $request->bulan)
    //   ->whereYear('tanggal_tagihan', $request->tahun)
    //   ->get();
    $tagihan = Model::with('pembayaran')->findOrFail($id);
    $data['tagihan'] = $tagihan;
    // $data['siswa'] = $tagihan->first()->siswa;
    $data['siswa'] = $tagihan->siswa->first();
    $data['periode'] = Carbon::parse($tagihan->tanggal_tagihan)->translatedFormat('F Y');
    $data['model'] = new Pembayaran();
    return view('operator.' . $this->viewShow, $data);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Tagihan  $tagihan
   * @return \Illuminate\Http\Response
   */
  public function edit(Model $tagihan)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdateTagihanRequest  $request
   * @param  \App\Models\Tagihan  $tagihan
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateTagihanRequest $request, Model $tagihan)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Tagihan  $tagihan
   * @return \Illuminate\Http\Response
   */
  public function destroy(Model $tagihan)
  {
    $tagihan->delete();
    return back();
  }
}