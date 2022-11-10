<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Components\RegionManager;
use App\Models\Warehouse;
use DB;

class WarehouseController extends Controller
{
    public function index()
    {
        //$data = $this->getSupplier('save', null);
        $regionManager = RegionManager::getInstance();
        $countries = $regionManager->countryList();
        return view('warehouse.warehousecreate', [
            'countries' => $countries,
        ]);
    }
    public function store(Request $req)
    {
        $validator = $req->validate([
            'Warehouse_name' => 'required|string',
            'supplier_warehouse_type' => 'required|integer',
            'wh_status' => 'required|integer',
        ]);
        /**
		 * 
		 * 
		 * "Warehouse_name" => null
      "supplier_warehouse_type" => null
      "customer_name" => null
      "customer_id" => null
      "storename" => null
      "address" => null
      "building" => null
      "sub_district" => null
      "district" => null
      "road" => null
      "country_id" => "237"
      "state_id" => null
      "city_id" => null
      "zipcode" => null
      "contact_prson" => null
      "contact_prson_contactno" => null
      "wh_status" => "1"
		 */
        $warehouse = new Warehouse();
        $warehouse->wh_name = $req->Warehouse_name;
        $warehouse->wh_type = $req->supplier_warehouse_type;
        $warehouse->customer_id = $req->customer_id;
        $warehouse->customer_store_id = $req->storename;
        $warehouse->customer_name = $req->customer_name;
        $warehouse->address = $req->address;
        $warehouse->building = $req->building;
        $warehouse->sub_district = $req->sub_district;
        $warehouse->district = $req->district;
        $warehouse->road = $req->road;
        $warehouse->country_id = $req->country_id;
        $warehouse->state_id = $req->state_id;
        $warehouse->city = $req->city_id;
        $warehouse->zipcode = $req->zipcode;
        $warehouse->contact_person = $req->contact_prson;
        $warehouse->tel_number = $req->contact_prson_contactno;
        $warehouse->status = $req->wh_status;
        $warehouse->created_at = date('Y-m-d h:i:s');
        // $warehouse->updated_at = $req->;

        if ($warehouse->save()) {
            return redirect()
                ->back()
                ->with('success', 'Changes Saved Successfully!');
        } else {
            return redirect()
                ->back()
                ->with('danger', 'Failed to Save ! Please Retry');
        }
    }
    public function list()
    {
        $warehouse = Warehouse::all();

        return view('warehouse.warehouselist', ['warehouse' => $warehouse]);
    }

    public function inventory()
    {
        return view('inventorylist');
    }
    public function ajaxcall(Request $request)
    {
        ## Read value
        $draw = $request->get('draw');
        $start = $request->get('start');
        $rowperpage = $request->get('length'); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        // Total records
        $totalRecords = Product::select('count(*) as allcount')->count();
        $countData = Product::select('count(*) as allcount');

        if ($searchValue != null) {
            $countData->where('name', 'like', '%' . $searchValue . '%');
            //$countData->where('supplier', 'like', '%' .$searchValue . '%');
        }
        $totalRecordswithFilter = $countData->count();
        // Fetch records

        $records = Product::select('*') //orderBy($columnName,$columnSortOrder)
            //  ->orderBy('id', 'Desc')
            ->skip($start)
            ->take($rowperpage);
        if ($columnName == 'product_name') {
            $records->orderBy('name', $columnSortOrder);
        } elseif ($columnName == 'product_code') {
            $records->orderBy('code', $columnSortOrder);
        }
        if ($searchValue != null) {
            $records->where('name', 'like', '%' . $searchValue . '%');
            //$records->where('supplier', 'like', '%' .$searchValue . '%');
        } else {
            $records->orderBy('id', 'Desc');
        }

        $list = $records->get();

        $data_arr = [];

        foreach ($list as $sno => $record) {
            $id = $record->id;
            $status = $record->status;
            $statustext = 'Active';
            $statuschecked = 'checked';
            if ($status == 2) {
                $statustext = 'InActive';
                $statuschecked = '';
            }
            $view = url('inventorylist/' . $record->id);
            $edit = url('productedit/' . $record->id);
            $action =
                '<div class="d-flex order-actions">
				<a href="' .
                $edit .
                '" class=""><i class="bx bxs-edit"></i></a>
				
			</div>';

            $action .=
                '<div class="form-check form-switch">
				<input class="form-check-input checktrigger" id="checktrigger_' .
                $id .
                '" data-id="' .
                $id .
                '" data-status="' .
                $status .
                '" type="checkbox" ' .
                $statuschecked .
                '>
				<label class="form-check-label" id="check_label_' .
                $id .
                '" for="">' .
                $statustext .
                '</label>
			</div>
            ';

            $detail =
                '<a href=""><a href="' .
                $view .
                '" type="button" class="btn btn-primary btn-sm radius-30 px-4">Inventory Detail</a></a>';

            $img = Image::where('product_id', $record->id)->first();

            $main_img = '';
            if ($img) {
                $ig = asset(
                    'images/products/' . $record->id . '/' . $img->name . ''
                );
                $main_img = '<img src="' . $ig . '" height="30">';
            }

            $id = $record->id;

            $data_arr[] = [
                'id' => $id,
                'main_img' => $main_img,
                'product_name' => $record->name,
                'product_code' => $record->code,
                'detail' => $detail,
                'action' => $action,
            ];
        }

        $response = [
            'draw' => intval($draw),
            'iTotalRecords' => $totalRecords,
            'iTotalDisplayRecords' => $totalRecordswithFilter,
            'aaData' => $data_arr,
        ];

        echo json_encode($response);
        exit();
    }
    public function ajax_get_stores()
    {
        $customers_store = DB::table('customer_stores')->get();

        return response()->json([
            'customers_store' => $customers_store,
        ]);
    }

    public function ajax_get_customers_by_store_id(Request $req)
    {
        $customers = DB::table('customer_stores')
            ->join(
                'customers',
                'customers.id',
                '=',
                'customer_stores.customer_id'
            )
            ->select('customer_stores.*', 'customers.*')
            ->where('customer_stores.id', '=', $req->store_id)
            ->get();
        //dd($customers);
        return response()->json([
            'customers' => $customers,
        ]);
    }
}
