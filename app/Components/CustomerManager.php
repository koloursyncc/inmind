<?php

namespace App\Components;
use App\Models\Customer;
use App\Models\CustomerAddressDocument;
use App\Models\CustomerContactPerson;
class CustomerManager
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
		$obj = Customer::create($params);
		
		if($lastInsertId === true)
		{
			return $obj->id;
		}
		return $obj;
	}
	
	public function saveCustomerAddressDocument($params)
	{
		return CustomerAddressDocument::create($params);
	}
	
	public function updateCustomerAddressDocument($id, $params)
	{
		return CustomerAddressDocument::where('id', $id)->update($params);
	}
	
	public function saveCustomerContactPerson($params)
	{
		return CustomerContactPerson::create($params);
	}
	
	public function updateCustomerContactPerson($id, $params)
	{
		return CustomerContactPerson::where('id', $id)->update($params);
	}
	
	public function update($id, $params)
	{

		return Customer::where('id', $id)->update($params);
	}

	public function getCustomerById($id, $status = 1)
	{
		return Customer::where('status', $status)->find($id);
	}
	
	
	//
	
	public function getCustomerAddressDocumentByCustId($customer_id)
	{
		return CustomerAddressDocument::where('customer_id', $customer_id)->get();
	}
	
	public function getCustomerContactPersonByCustId($customer_id)
	{
		return CustomerContactPerson::where('customer_id', $customer_id)->get();
	}
}
