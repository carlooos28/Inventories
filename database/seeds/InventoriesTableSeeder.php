<?php

use Illuminate\Database\Seeder;

class InventoriesTableSeeder extends Seeder
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
	        DB::table('inventories')->insert([
                'product_id' => $item,
                'quantity' => 20,
                'availability' => 19
	        ]);
    	}
    }
}
