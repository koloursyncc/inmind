<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function inventory()
    {
        return view('inventorylist');
    }
    public function inventoryin()
    {
        return view('inventoryin');
    }
    public function inventoryout()
    {
        return view('inventoryout');
    }
    public function inventorymodify()
    {
        return view('inventorymodify');
    }
}
