<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Warehouse;
use App\Models\Supplier;
use App\Models\SupplierPo;
use App\Models\SupplierPoProduct;
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
        $supplierpo = SupplierPo::all();
        return view('inventoryin', [
            'warehouse' => $warehouse,
            'supplierpo' => $supplierpo,
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

    /*********Ajax Call*******/
    public function getSupplierDetail(Request $req)
    {
        $suppo = SupplierPo::where('code', '=', $req->pocode)->first();
        $supplier_id = $suppo->id;

        $supplier = Supplier::where('id', '=', $supplier_id)->first();

        $data = [
            'supplier_id' => $supplier_id,
            'Supplier_name' => $supplier->supplier_name,
        ];
        return response()->json([
            'data' => $data,
        ]);
    }
}
