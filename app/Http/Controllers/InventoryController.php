<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Warehouse;
use DB;

class InventoryController extends Controller
{
    public function inventory()
    {
        return view('inventorylist');
    }
    public function inventoryin()
    {
        $warehouse = Warehouse::all();
        return view('inventoryin', [
            'warehouse' => $warehouse,
        ]);
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
