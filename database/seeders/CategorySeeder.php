<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class CategorySeeder extends Seeder
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
	        DB::table('categories')->insert([
                'category_name' => $faker->name,
                'logo' => 'default.png',
	        ]);
	    }
    }
}
