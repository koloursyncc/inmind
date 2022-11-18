<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Warehouse;
use App\Models\Supplier;
use App\Models\SupplierPo;
use App\Models\SupplierPoProduct;
use App\Models\Inventory_in;
use App\Models\Inventory_in_product;
use DB;
use Validator;

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
        $max_ticket_no = $this->getMaxTicketNo('MVI 200');
        return view('inventoryin', [
            'warehouse' => $warehouse,
            'supplierpo' => $supplierpo,
            'max_ticket_no' => $max_ticket_no,
        ]);
    }
    public function store(Request $req)
    {
        $is_saved = 0;

        try {
            DB::beginTransaction();

            /* $inventory_in = new Inventory_in();
            $inventory_in->sr_no = $req->;
            $inventory_in->inventory_in_ticket_no = $req->;
            $inventory_in->order_type = $req->;
            $inventory_in->is_supplier_po = $req->;
            $inventory_in->supplier_po_no = $req->;
            $inventory_in->wh_id = $req->;
            $inventory_in->delivery_ticket_no = $req->;
            $inventory_in->delivery_person = $req->;
            $inventory_in->telephone = $req->;
            $inventory_in->expected_delivery_date = $req->;
            $inventory_in->remarks = $req->;
            $inventory_in->inventory_out_ticket_no = $req->;
            $inventory_in->created_at = date('Y-m-d h:i:s');
            //$inventory_in->updated_at = $req->;

            $inventory_in->save();

            $inventory_in_product = new  Inventory_in_product();
            $inventory_in_product->inventory_in_ticket_no = $req->;
            $inventory_in_product->product_code = $req->;
            $inventory_in_product->total_qty = $req->;
            $inventory_in_product->ready_to_sale = $req->;
            $inventory_in_product->repair = $req->;
            $inventory_in_product->created_at = $req->;
            $inventory_in_product->updated_at = $req->;


            DB::commit();
            $is_saved = 1; */
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            $is_saved = 0;
        }
        return response()->json([
            'is_saved' => $is_saved,
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

        $supplier_po_pdt = DB::table('supplier_po_product')
            ->join('products', 'products.id', 'supplier_po_product.id')
            ->where('supplier_po_id', '=', $supplier_id)
            ->select(
                'supplier_po_product.*',
                'products.name as product_name',
                'products.code as product_code'
            )
            ->get();

        return response()->json([
            'supplier_id' => $supplier_id,
            'Supplier_name' => $supplier->supplier_name,
            'supplier_po_pdt' => $supplier_po_pdt,
        ]);
    }

    function getMaxTicketNo($pre_concat_str)
    {
        $inventoryin = Inventory_in::orderBy('id', 'desc')->value('sr_no');
        if ($inventoryin != null) {
            $maxval = $inventoryin;
        } else {
            $maxval = 0;
        }
        $maxval++;
        $maxcode =
            $pre_concat_str .
            '/' .
            str_pad('', 4 - strlen((string) $maxval), '0', STR_PAD_RIGHT) .
            $maxval;
        return $maxcode;
    }
}
