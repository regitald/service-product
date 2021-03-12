<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryModel extends Model
{
    use SoftDeletes;
    protected $table   = 'categories';
	public $primarykey = 'id';
	public $timestamps = true;
	protected $fillable = [
		'category_name',
		'logo'
	];
		
	protected $hidden = [
		'created_at','updated_at','deleted_at'
	];
	public function products() {
		return $this->hasMany('App\Models\ProductModel', 'category_id','id');
  	}
}
