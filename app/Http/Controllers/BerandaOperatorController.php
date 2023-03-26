<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class BerandaOperatorController extends Controller
{
    public function index()
    {
        return view('operator.beranda_index');
    }
}
