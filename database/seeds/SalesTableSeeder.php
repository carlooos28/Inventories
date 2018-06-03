<?php

use Illuminate\Database\Seeder;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item = 0;
    	for ($i=0; $i < 3; $i++) {  
            $item++;
	        DB::table('sales')->insert([
                'product_id' => $item,
                'quantity' => 1,
                'price' => 50000,
                'status' => "sold", //sold , canceled,
                'created_at' => "2018-06-01"
	        ]);
    	}
    }
}