<?php

namespace App\Components;
use App\Models\Staff;
use App\Models\StaffImage;
use App\Models\StaffAddressDocument;
class StaffManager
{
	public static $_instance;

    public static function getInstance() {
        if ( !(self::$_instance instanceof self) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
	
	public function getStaffById($id)
	{
		return Staff::find($id);
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
	
	public function saveStaffContactAddress($params)
	{
		return StaffAddressDocument::create($params);
	}
	
	public function updateStaffContactAddress($id, $params)
	{
		return StaffAddressDocument::where('id', $id)->update($params);
	}
	
	public function getAddressDocumentByStaffId($staffid)
	{
		return StaffAddressDocument::where('staff_id', $staffid)->get();
	}
	
}
