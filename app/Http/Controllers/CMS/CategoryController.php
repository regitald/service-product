<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Traits\GeneralServices;

class CategoryController extends Controller
{
    use GeneralServices;
	public function index(){
		$data = CategoryModel::all();
		if ($data->isEmpty()) {
            return $this->ResponseJson(404,"Category not found.",$data);
        }
        return $this->ResponseJson(200,"Category Data",$data);
	}
	public function store(Request $request){
		$rules = [
			'category_name' => 'Required|string',
			'logo' => 'Required|string'
		];
		$validateData = $this->ValidateRequest($request->all(), $rules);

		if (!empty($validateData)) {
            return $validateData;
		}
		$save = CategoryModel::create($request->all());
		if(!$save){
            return $this->ResponseJson(404,"Failed! Server Error!.");
		}
        return $this->ResponseJson(200,"Category Succesfully Created");
	}
	public function show($id){
		$data = CategoryModel::find($id);
		if (empty($data)) {
            return $this->ResponseJson(404,"Category not found.",$data);
        }
        return $this->ResponseJson(200,"Category Data",$data);
	}
	public function update(Request $request,$id){
		$rules = [
			'category_name' => 'Required|string',
			'logo' => 'Required|string'
		];
		$validateData = $this->ValidateRequest($request->all(), $rules);

		if (!empty($validateData)) {
            return $validateData;
		}

		$save = CategoryModel::where('id','=',$id)->update($request->except('_method'));
		if(!$save){
            return $this->ResponseJson(404,"Failed! Server Error!.");
		}
        return $this->ResponseJson(200,"Category Succesfully Updated");
	}
	public function destroy(Request $request,$id){
		$save = CategoryModel::where('id','=',$id)->delete();
		if(!$save){
            return $this->ResponseJson(404,"Failed! Server Error!.");
		}
        return $this->ResponseJson(200,"Category Succesfully Deleted");
	}
}
