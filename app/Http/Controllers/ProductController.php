<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('productadd');
    }
    public function list()
    {
        return view('productlist');
    }
    public function deatil()
    {
        return view('productdetail');
    }
}
