<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use DateTime;

trait GeneralServices {

    public function ResponseJson($status,$message,$data = null){
        $response = [
            'status' => true,
            'message' => $message,
            'data' => $data 
        ];
		if($status != 200){
			$response = [
				'status' => false,
				'message' => $message
			];
		}
		return response()->json($response, $status);
	}
    function ValidateRequest($params,$rules){

		$validator = Validator::make($params, $rules);

		if ($validator->fails()) {
			$response = [
				'status' => false,
				// 'message' => $validator->messages()
				'message' =>  $validator->errors()->first()
			];
			return response()->json($response, 406);
		}
	}   
}