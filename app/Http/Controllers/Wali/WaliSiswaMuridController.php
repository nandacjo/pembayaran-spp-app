<?php

namespace App\Http\Controllers\Wali;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WaliSiswaMuridController extends Controller
{
  public function index()
  {
    return view('wali.siswa_index', [
      'models' => Auth::user()->siswa,
    ]);
  }
}
