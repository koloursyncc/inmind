<?php
use Illuminate\Http\Request;
use Illuminate\Http\Response;


function sendresponse($code, $status, $message, $arrData) 
{

	$output['code'] = $code;
	$output['status'] = $status;
	$output['message'] = $message;
	if (empty($arrData)) {
		$arrData = (object) array();
	}
	$output['data'] = $arrData;
	return response()->json($output);
} 

/*
 *Check validation after each request
 */
function checkvalidation($request, $rules, $messsages) {

	$validator = Validator::make($request, $rules);

    if ($validator->fails()) {
		$message = $validator->getMessageBag()->toArray();
		$err = array();
		foreach ($message as $key=>$error) {
			$err[$key] = $error[0];
		}
	} else {
		$err = '';
	}
	return $err;
}


















?>