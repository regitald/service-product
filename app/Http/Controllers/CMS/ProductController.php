<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Traits\GeneralServices;

class ProductController extends Controller
{
    use GeneralServices;
	public function index(Request $request){
        
		$data = ProductModel::with('category')->get();
		if ($data->isEmpty()) {
            return $this->ResponseJson(404,"Product not found.",$data);
        }
        return $this->ResponseJson(200,"Product Data",$data);
	}
    
	public function store(Request $request){
		$rules = [
			'category_id' => 'Required|integer',
			'product_code' => 'Required|string',
			'product_name' => 'Required|string',
			'product_desc' => 'Required',
			'price' => 'Required',
		];
		$validateData = $this->ValidateRequest($request->all(), $rules);

		if (!empty($validateData)) {
            return $validateData;
		}
		$save = ProductModel::create($request->all());
		if(!$save){
            return $this->ResponseJson(406,"Failed! Server Error!.");
		}
        return $this->ResponseJson(200,"Product Succesfully Created");
	}
	public function show($id){
		$data = ProductModel::with('category')->find($id);
		if (empty($data)) {
            return $this->ResponseJson(404,"Product not found.",$data);
        }
        return $this->ResponseJson(200,"Product Data",$data);
	}
	public function update(Request $request,$id){
		$rules = [
			'category_id' => 'Required|integer',
			'product_code' => 'Required|string',
			'product_name' => 'Required|string',
			'product_desc' => 'Required',
			'price' => 'Required',
		];
		$validateData = $this->ValidateRequest($request->all(), $rules);

		if (!empty($validateData)) {
            return $validateData;
		}

		$save = ProductModel::where('id','=',$id)->update($request->except('_method'));
		if(!$save){
            return $this->ResponseJson(406,"Failed! Server Error!.");
		}
        return $this->ResponseJson(200,"Product Succesfully Updated");
	}
	public function destroy(Request $request,$id){
		$save = ProductModel::where('id','=',$id)->delete();
		if(!$save){
            return $this->ResponseJson(406,"Failed! Server Error!.");
		}
        return $this->ResponseJson(200,"Product Succesfully Deleted");
	}
}
