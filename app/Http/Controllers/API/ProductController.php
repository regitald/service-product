<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Traits\GeneralServices;

class ProductController extends Controller
{
    use GeneralServices;
    public function index(Request $request){
		$query = ProductModel::with('category')->where('status','1');
        
        if(!empty($request->category_id)){
            $query->where('category_id',$request->category_id);
        }
        if(!empty($request->name)){
            $query->where('product_name','LIKE','%'.$request->name.'%');
        }
        $data = $query->orderBy('id','DESC')->get();
		if ($data->isEmpty()) {
            return $this->ResponseJson(404,"Product not found.",$data);
        }
        return $this->ResponseJson(200,"Product Data",$data);
	}
    public function show($id){
		$data = ProductModel::with('category')->where('status','1')->where('id',$id)->first();
		if (empty($data)) {
            return $this->ResponseJson(404,"Product not found.",$data);
        }
        return $this->ResponseJson(200,"Product Data",$data);
	}
    public function category(){
		$data = CategoryModel::all();
		if ($data->isEmpty()) {
            return $this->ResponseJson(404,"Category not found.",$data);
        }
        return $this->ResponseJson(200,"Category Data",$data);
	}
    public function categoryShow($id){
		$data = CategoryModel::with('products')->find($id);
		if (empty($data)) {
            return $this->ResponseJson(404,"Category not found.",$data);
        }
        return $this->ResponseJson(200,"Category Data",$data);
	}
}
