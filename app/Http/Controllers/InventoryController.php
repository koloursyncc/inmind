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
use App\Models\WharehousewiseInventory;
use DB;
use Validator;

class InventoryController extends Controller
{
    public function warehouse_inventory_detail(Request $req)
    {
        $wh_id = $req->wh_id;

        $warehousedetail = Warehouse::where('id', '=', $wh_id)->first();
        $inventory = DB::table('wharehousewise_inventory')
            ->join(
                'products',
                'products.code',
                '=',
                'wharehousewise_inventory.product_code'
            )
            //->join('brands','brands.id', '=','products.brand_id' )
            ->where('wharehousewise_inventory.wh_id', '=', $wh_id)
            ->select(
                'wharehousewise_inventory.*',
                'products.name as pdt_name'
                // 'brands.name as pdt_brand'
            )
            ->get();

        // dd($inventory);
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
                    $inventory_in_product->wh_id = $req->to_warehouse;
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
                    $inventory_in_product->wrecked = 0;
                    $inventory_in_product->lost = 0;
                    $inventory_in_product->created_at = date('Y-m-d h:i:s');
                    //$inventory_in_product->updated_at = $req->;
                    $inventory_in_product->save();
                }
            }
            if ($req->pdt_row_count > 0) {
                //if product exist update quantity else add product
                for ($j = 0; $j < $req->pdt_row_count; $j++) {
                    $row_count = WharehousewiseInventory::where([
                        [
                            'product_code',
                            '=',
                            $req->inv_in_pdt[$j]['product_code'],
                        ],
                        ['wh_id', '=', $req->to_warehouse],
                    ])->count();

                    //dd($row_count);

                    if ($row_count <= 0) {
                        //add new
                        $wh_in_pdt = new WharehousewiseInventory();
                        $wh_in_pdt->wh_id = $req->to_warehouse;
                        $wh_in_pdt->product_code =
                            $req->inv_in_pdt[$j]['product_code'];
                        $wh_in_pdt->total_qty =
                            $req->inv_in_pdt[$j]['total_qty'];
                        $wh_in_pdt->ready_to_sale =
                            $req->inv_in_pdt[$j]['ready_to_sale'];
                        $wh_in_pdt->repair = $req->inv_in_pdt[$j]['repair'];
                        $wh_in_pdt->wrecked = 0;
                        $wh_in_pdt->lost = 0;
                        $wh_in_pdt->created_at = date('Y-m-d h:i:s');
                        $wh_in_pdt->save();
                    } else {
                        //update existing
                        $id = WharehousewiseInventory::where([
                            [
                                'product_code',
                                '=',
                                $req->inv_in_pdt[$j]['product_code'],
                            ],
                            ['wh_id', '=', $req->to_warehouse],
                        ])->value('id');

                        $wh_in_pdt_update = WharehousewiseInventory::findOrFail(
                            $id
                        );
                        $wh_in_pdt_update->total_qty =
                            $wh_in_pdt_update['total_qty'] +
                            $req->inv_in_pdt[$j]['total_qty'];
                        $wh_in_pdt_update->ready_to_sale =
                            $wh_in_pdt_update['ready_to_sale'] +
                            $req->inv_in_pdt[$j]['ready_to_sale'];
                        $wh_in_pdt_update->repair =
                            $wh_in_pdt_update['repair'] +
                            $req->inv_in_pdt[$j]['repair'];
                        $wh_in_pdt_update->wrecked =
                            $wh_in_pdt_update['wrecked'];
                        $wh_in_pdt_update->lost = $wh_in_pdt_update['lost'];
                        $wh_in_pdt_update->updated_at = date('Y-m-d h:i:s');
                        $wh_in_pdt_update->update();
                    }
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

    public function inventorymodify(Request $req)
    {
        $wh_id = $req->wh_id;
        $warehousedetail = Warehouse::where('id', '=', $wh_id)->first();
        $inventory = DB::table('wharehousewise_inventory')
            ->join(
                'products',
                'products.code',
                '=',
                'wharehousewise_inventory.product_code'
            )
            //->join('brands','brands.id', '=','products.brand_id' )
            ->where('wharehousewise_inventory.wh_id', '=', $wh_id)
            ->select(
                'wharehousewise_inventory.*',
                'products.name as pdt_name'
                // 'brands.name as pdt_brand'
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
        $supplier_id = $suppo->supplier_id;
        $po_id = $suppo->id;

        $supplier = Supplier::where('id', '=', $supplier_id)->first();

        $supplier_po_pdt = DB::table('supplier_po_product')
            ->join('products', 'products.id', 'supplier_po_product.product_id')

            ->where('supplier_po_product.supplier_po_id', '=', $po_id)
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

        $inventory = DB::table('wharehousewise_inventory')

            ->where([
                ['wharehousewise_inventory.wh_id', '=', $req->wh_code],
                [
                    'wharehousewise_inventory.product_code',
                    '=',
                    $req->product_code,
                ],
            ])
            ->select('wharehousewise_inventory.*')
            ->get();

        //dd($inventory);
        if (count($inventory) > 0) {
            $total_qty = $inventory[0]->total_qty;
            $ready_to_sale = $inventory[0]->ready_to_sale;
            $repair = $inventory[0]->repair;
            $wrecked = $inventory[0]->wrecked;
            $lost = $inventory[0]->lost;
        }

        return response()->json([
            'total_qty' => $total_qty,
            'ready_to_sale' => $ready_to_sale,
            'repair' => $repair,
            'wrecked' => $wrecked,
            'lost' => $lost,
        ]);
    }

    public function inventoryUpdate(Request $req)
    {
        $is_Saved = 0;

        if ($req->pdt_count > 0) {
            for ($i = 0; $i < $req->pdt_count; $i++) {
                $id = WharehousewiseInventory::where([
                    ['product_code', '=', $req->products[$i]['product_code']],
                    ['wh_id', '=', $req->wh_id],
                ])->value('id');

                $wh_inv_pdt = WharehousewiseInventory::findOrFail($id);
                $wh_inv_pdt->total_qty =
                    $req->products[$i]['ready_to_sale'] +
                    $req->products[$i]['repair'];
                $wh_inv_pdt->ready_to_sale =
                    $req->products[$i]['ready_to_sale'];
                $wh_inv_pdt->repair = $req->products[$i]['repair'];
                $wh_inv_pdt->wrecked = $req->products[$i]['wrecked'];
                $wh_inv_pdt->lost = $req->products[$i]['lost'];
                $wh_inv_pdt->updated_at = date('Y-m-d h:i:s');
                $wh_inv_pdt->update();
                $is_Saved = 1;
            }
        }

        return response()->json(['status' => $is_Saved]);
    }

    /*************inventory Out***************************/

    public function inventoryout()
    {
        $warehouse = Warehouse::all();
        $suppliers = Supplier::where('supplier_type', '=', '4')->get();
        return view('inventoryout', [
            'warehouse' => $warehouse,
            'suppliers' => $suppliers,
        ]);
    }

    public function GetAllWarehouseProducts(Request $req)
    {
        $wh_products = DB::table('wharehousewise_inventory')
            ->join(
                'products',
                'products.code',
                '=',
                'wharehousewise_inventory.product_code'
            )
            //->join('brands','brands.id', '=','products.brand_id' )
            ->where('wharehousewise_inventory.wh_id', '=', $req->wh_id)
            ->select(
                'wharehousewise_inventory.*',
                'products.name as pdt_name'
                // 'brands.name as pdt_brand'
            )
            ->get();

        return response()->json([
            'wh_products' => $wh_products,
        ]);
    }
    public function get_transporters(Request $req)
    {
        $tran_mobile = '';
        $transporter = Supplier::where(
            'id',
            '=',
            $req->transporter_id
        )->first();
        $tran_mobile = $transporter->mobile;
        return response()->json([
            'tran_mobile' => $tran_mobile,
            'transporter' => $transporter,
        ]);
    }

    function getMax_out_TicketNo($pre_concat_str)
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
