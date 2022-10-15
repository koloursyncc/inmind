<?php

namespace App\Components;
use App\Models\Po;
use DB;
use App\Models\Product;
use App\Components\RegionManager;
class POManager
{
	public static $_instance;

    public static function getInstance()
	{
        if ( !(self::$_instance instanceof self) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
	
	public function update($id, $params)
	{
		return Po::where('id', $id)->update($params);
	}
	
	public function save($params, $lastInsertId = false)
	{
		$obj = Po::create($params);
		
		if($lastInsertId === true)
		{
			return $obj->id;
		}
		return $obj;
	}
	
	/* public function saveProductSet($params)
	{
		return Po::create($params);
	} */
	
	public function getPoById($id, $status = 1)
	{
		return Po::where('status', $status)->find($id);
	}
	
	public function getPoDataById($id)
	{
		return Po::find($id);
	}
	
	public function poHandleById($id = null, $type, $heading)
	{
		$regionManager = RegionManager::getInstance();
		$countries = $regionManager->countryList();
		$files = $products = $invoice = $items = [];
		$products = Product::select('id', 'name')->get();
		$response = ['obj' => null, 'countries' => $countries, 'type' => $type, 'files' => $files, 'products' => $products, 'invoice' => $invoice, 'items' => $items];
		if($id == null)
		{
			return $response;
		}
		
		$poObj = $this->getPoById($id, 1);
		
		if($poObj == null)
		{
			$response['type'] = 'save';
			$response['heading'] = 'Add New Po';
			return $response;
		} else {
			$files = DB::table('po_images')->where('po_id', $id)->get();
			$invoice = DB::table('po_invoice')->where('po_id', $id)->get();
			$items = DB::table('po_items')->where('po_id', $id)->get();
		}
		$response['obj'] = $poObj;
		$response['countries'] = $countries;
		$response['files'] = $files;
		$response['invoice'] = $invoice;
		$response['items'] = $items;
		
		return $response;
	}
}
