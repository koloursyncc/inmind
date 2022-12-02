<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function deliverycreate()
    {
		return view('deliverycreator')->with('pickupdate', '01/12/2022')->with('delivery_ticket_no', 'DL 200/2565');
        //return view('deliverycreator');
    }
    public function deliveryreceived()
    {
        return view('deliveryreceived');
    }
    public function deliverysearch()
    {
        return view('deliverysearch');
    }
}
