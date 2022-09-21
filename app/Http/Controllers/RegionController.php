<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Components\RegionManager;
class RegionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function getregionaldata(Request $request) {
		if($request->isMethod('get'))
		{
			$obj = RegionManager::getInstance();
			if($request->name == 'State') {
				$data = $obj->getStateByCountryId($request->value);//District::where('state_id', $request->state_id)->get();
			
				return response()->json($data);
			}
			
		}
	}

}
