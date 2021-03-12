<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductModel extends Model
{
    use SoftDeletes;
	
    protected $table   = 'products';
	public $primarykey = 'id';
	public $timestamps = true;
	protected $fillable = [
		'category_id',
		'product_code',
		'product_name',
		'price',
		'product_desc',
		'status'
	];
		
	protected $hidden = [
		'updated_at','deleted_at'
	];
	public function category() {
		return $this->belongsTo('App\Models\CategoryModel', 'category_id','id');
  	}
}
