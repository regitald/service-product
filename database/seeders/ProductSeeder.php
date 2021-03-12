<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
    	foreach (range(1,5) as $index) {
	        DB::table('products')->insert([
	            'category_id' => $faker->unique()->numberBetween(1, 5),
                'product_code' =>'AAA2'.$faker->unique()->numberBetween('2000', '3000'),
                'product_name' => $faker->name,
                'product_desc' => $faker->text,
                'price' =>$faker->unique()->numberBetween('5000', '300000'),
                'status' => '1'
	        ]);
	    }
    }
}
