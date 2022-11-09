<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function deliverycreate()
    {
        return view('deliverycreator');
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
