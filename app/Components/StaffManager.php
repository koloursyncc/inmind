<?php

namespace App\Components;
use App\Models\Staff;
use App\Models\StaffImage;
use App\Models\StaffLabourContracts;
use App\Models\StaffLabourContractImage;
class StaffManager
{
	public static $_instance;

    public static function getInstance() {
        if ( !(self::$_instance instanceof self) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
	
	public function getStaffById($id, $status = 1)
	{
		return Staff::where('status', $status)->find($id);
	}
	
	public function save($params, $lastInsertId = false)
	{
		$obj = Staff::create($params);
		
		if($lastInsertId === true)
		{
			return $obj->id;
		}
		return $obj;
	}
	
	public function update($id, $params)
	{
		return Staff::where('id', $id)->update($params);
	}
	
	public function saveStaffFile($params)
	{
		return StaffImage::create($params);
	}
	
	public function getStaffDocByStaffIdTypeId($staff_id, $type)
	{
		return StaffImage::where('staff_id', $staff_id)->where('type', $type)->get();
	}
	
	public function saveStaffContactAddress($params, $lastInsertId)
	{
		$obj = StaffLabourContracts::create($params);
		
		if($lastInsertId === true)
		{
			return $obj->id;
		}
		return $obj;
	}
	
	public function updateStaffContactAddressById($id, $params)
	{
		return StaffLabourContracts::where('id', $id)->update($params);
	}
	
	public function getStaffContactAddressById($id)
	{
		return StaffLabourContracts::find($id);
	}
	
	public function getStaffContactAddressByStaffId($staff_id)
	{
		return StaffLabourContracts::where('staff_id', $staff_id)->get();
	}
	
	public function saveStaffLabourImage($params)
	{
		return StaffLabourContractImage::create($params);
	}
	
	public function getStaffLabourContactImage($staff_labour_contract_id)
	{
		return StaffLabourContractImage::where('staff_labour_contract_id', $staff_labour_contract_id)->get();
	}
	
	/* 
	
	public function updateStaffContactAddressById($id, $params)
	{
		return StaffAddress::where('id', $id)->update($params);
	} */
	
	/* public function handleStaffAddress($staff_id, $params)
	{
		$obj = $this->getStaffContactAddressByStaffId($staff_id);
		if($obj)
		{
			$this->updateStaffContactAddressById($obj->id, $params);
		}
		else
		{
			$this->saveStaffContactAddress($params);
		}
	} */
	
	public function getStaffImageById($id)
	{
		return StaffImage::find($id);
	}
	
	public function deleteImageById($id)
	{
		$obj = $this->getStaffImageById($id);
		if($obj)
		{
			if($obj->delete())
			{
				return true;
			}
		}
		
		return false;
	}
}
