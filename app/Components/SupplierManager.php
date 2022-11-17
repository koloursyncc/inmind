<?php

namespace App\Components;
use App\Models\Supplier;
use App\Models\SupplierProduct;
use App\Models\SupplierPo;
use App\Models\SupplierPoProduct;
use App\Components\ProductManager;
class SupplierManager
{
	public static $_instance;

    public static function getInstance() {
        if ( !(self::$_instance instanceof self) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
	
	public function save($params, $lastInsertId = false)
	{
		$obj = Supplier::create($params);
		
		if($lastInsertId === true)
		{
			return $obj->id;
		}
		return $obj;
	}
	
	public function getProductSupplierBySupplierId($product_id, $supplier_id)
	{
		return SupplierProduct::where('product_id', $product_id)->where('supplier_id', $supplier_id)->first();
	}
	
	public function update($id, $params)
	{
		return Supplier::where('id', $id)->update($params);
	}
	
	public function deleteProductSupplierBySupplierId($supplier_id)
	{
		return SupplierProduct::where('supplier_id', $supplier_id)->delete();
	}
	
	public function getSupplierById($id, $status = 1)
	{
		return Supplier::where('status', $status)->find($id);
	}
	
	public function saveProductSupplier($params)
	{
		return SupplierProduct::create($params);
	}
	
	public function saveSupplierPo($params, $lastInsertId = false)
	{
		$obj = SupplierPo::create($params);
		
		if($lastInsertId === true)
		{
			return $obj->id;
		}
		return $obj;
	}
	
	public function saveSupplierPoProduct($params, $lastInsertId = false)
	{
		$obj = SupplierPoProduct::create($params);		
		if($lastInsertId === true)
		{
			return $obj->id;
		}
		return $obj;
	}
	
	public function updateSupplierPo($id, $params)
	{
		return SupplierPo::where('id', $id)->update($params);
	}
	
	public function getSupplierPoById($id, $status = 1)
	{
		return SupplierPo::where('status', $status)->find($id);
	}
	
	public function getSupplierProductPoByAttrId($supplier_po_id)
	{
		return SupplierPoProduct::where('supplier_po_id', $supplier_po_id)->get();
	}
	
	public function deleteSupplierPoProductByAttr($supplier_po_id)
	{
		return SupplierPoProduct::where('supplier_po_id', $supplier_po_id)->delete();
	}
}
