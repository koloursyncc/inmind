<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArController extends Controller
{
    public function index()
    {
        return view('arreceive');
    }
    public function arbalancechecker()
    {
        return view('arbalance');
    }
    public function arsearch()
    {
        return view('arsearch');
    }
}
