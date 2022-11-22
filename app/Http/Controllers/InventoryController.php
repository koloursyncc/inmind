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
    public function warehouse_inventory_detail(Request $req)
    {
        $wh_id = $req->wh_id;
        $warehousedetail = Warehouse::where('id', '=', $wh_id)->first();
        $inventory = DB::table('inventory_in')
            ->join(
                'inventory_in_products',
                'inventory_in_products.inventory_in_ticket_no',
                '=',
                'inventory_in.inventory_in_ticket_no'
            )
            ->join(
                'products',
                'products.code',
                '=',
                'inventory_in_products.product_code'
            )
            ->join('brands', 'brands.id', '=', 'products.brand_id')
            ->where('inventory_in.wh_id', '=', $wh_id)
            ->select(
                'inventory_in_products.*',
                'products.name as pdt_name',
                'brands.name as pdt_brand'
            )
            ->get();
        //dd($inventory);
        return view('warehouse.inventory.warehouse-inventory-detail', [
            'warehousedetail' => $warehousedetail,
            'inventory' => $inventory,
        ]);
    }
    public function inventoryin(Request $req)
    {
        $warehouse = Warehouse::all();
        $supplierpo = SupplierPo::all();
        $max_ticket_no = $this->getMaxTicketNo('MVI 200');
        return view('warehouse.inventory.inventoryin', [
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
            $inventoryin_sr = Inventory_in::orderBy('id', 'desc')->value(
                'sr_no'
            );
            $max_ticket_no = $this->getMaxTicketNo('MVI 200');
            $inventoryin_sr++;
            $inventory_in = new Inventory_in();
            $inventory_in->sr_no = $inventoryin_sr;
            $inventory_in->inventory_in_ticket_no = $max_ticket_no;
            $inventory_in->order_type = $req->is_inernal_moving;
            $inventory_in->is_supplier_po = 1;
            $inventory_in->supplier_po_no = $req->supplier_po_no;
            $inventory_in->wh_id = $req->to_warehouse;
            $inventory_in->delivery_ticket_no = $req->delivery_ticket_no;
            $inventory_in->delivery_person = $req->delivery_person;
            $inventory_in->telephone = $req->delivery_person_contact_no;
            $inventory_in->expected_delivery_date =
                $req->expected_delivery_date;
            $inventory_in->remarks = $req->remarks;
            //$inventory_in->inventory_out_ticket_no = $req->;
            $inventory_in->created_at = date('Y-m-d h:i:s');
            //$inventory_in->updated_at = $req->;

            $inventory_in->save();

            if ($req->pdt_row_count > 0) {
                for ($i = 0; $i < $req->pdt_row_count; $i++) {
                    $inventory_in_product = new Inventory_in_product();
                    $inventory_in_product->inventory_in_ticket_no =
                        $req->inventory_in_tickect_id;
                    $inventory_in_product->product_code =
                        $req->inv_in_pdt[$i]['product_code'];
                    $inventory_in_product->total_qty =
                        $req->inv_in_pdt[$i]['total_qty'];
                    $inventory_in_product->ready_to_sale =
                        $req->inv_in_pdt[$i]['ready_to_sale'];
                    $inventory_in_product->repair =
                        $req->inv_in_pdt[$i]['repair'];
                    $inventory_in_product->created_at = date('Y-m-d h:i:s');
                    //$inventory_in_product->updated_at = $req->;
                    $inventory_in_product->save();
                }
            }
            DB::commit();
            $is_saved = 1;
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
    public function inventorymodify(Request $req)
    {
        $wh_id = $req->wh_id;
        $warehousedetail = Warehouse::where('id', '=', $wh_id)->first();
        $inventory = DB::table('inventory_in')
            ->join(
                'inventory_in_products',
                'inventory_in_products.inventory_in_ticket_no',
                '=',
                'inventory_in.inventory_in_ticket_no'
            )
            ->join(
                'products',
                'products.code',
                '=',
                'inventory_in_products.product_code'
            )
            ->join('brands', 'brands.id', '=', 'products.brand_id')
            ->where('inventory_in.wh_id', '=', $wh_id)
            ->select(
                'inventory_in_products.*',
                'products.name as pdt_name',
                'brands.name as pdt_brand'
            )
            ->get();
        return view('warehouse.inventory.inventorymodify', [
            'warehousedetail' => $warehousedetail,
            'inventory' => $inventory,
        ]);
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

    public function getStatusWisePdtQty(Request $req)
    {
        $total_qty = 0;
        $ready_to_sale = 0;
        $repair = 0;
        $wrecked = 0;
        $lost = 0;

        $inventory = DB::table('inventory_in')
            ->join(
                'inventory_in_products',
                'inventory_in_products.inventory_in_ticket_no',
                '=',
                'inventory_in.inventory_in_ticket_no'
            )
            ->where([
                ['inventory_in.wh_id', '=', $req->wh_code],
                ['inventory_in_products.product_code', '=', $req->product_code],
            ])
            ->select('inventory_in_products.*')
            ->get();
        if (count($inventory) > 0) {
            $total_qty = $inventory->total_qty;
            $ready_to_sale = $inventory->ready_to_sale;
            $repair = $inventory->repair;
            $wrecked = $inventory->wrecked;
            $lost = $inventory->lost;
        }

        return response()->json([
            'total_qty' => $total_qty,
            'ready_to_sale' => $ready_to_sale,
            'repair' => $repair,
            'wrecked' => $wrecked,
            'lost' => $lost,
        ]);
    }
}
