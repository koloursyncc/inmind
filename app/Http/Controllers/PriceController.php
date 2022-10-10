<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Price;
use App\Components\PriceManager;
use Illuminate\Http\Request;

class PriceController extends Controller
{
	public function pricelist()
    {
        return view('pricelist');
    }
	
    public function index()
    {
		$priceManagerObj = PriceManager::getInstance();
		$data = $priceManagerObj->priceHandleById(null, 'save', '');
		
        return view('pricecreate', $data);
    }
    
	private function edit($id)
	{
		$priceManagerObj = PriceManager::getInstance();
		$data = $priceManagerObj->priceHandleById($id, 'edit', '');
		
		return view('pricecreate', $data);
	}
	
	private function view($id)
	{
		$priceManagerObj = PriceManager::getInstance();
		$data = $priceManagerObj->priceHandleById($id, 'view', '');
		
		return view('pricecreate', $data);
	}
}
