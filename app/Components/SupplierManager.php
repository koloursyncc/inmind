<?php

namespace App\Components;
use App\Models\Supplier;
class SupplierManager
{
	public static $_instance;

    public static function getInstance() {
        if ( !(self::$_instance instanceof self) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
	
	
}
