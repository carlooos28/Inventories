<?php

use Illuminate\Database\Seeder;

class DetailProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {    	 
        DB::table('detail_products')->insert([
            'supplier_id' => 1,
            'product_id' => 1,
            'quantity' => 20,
            'lote' => "lote_1",
            'expiration_date' => "2018-06-01"
        ]);

        DB::table('detail_products')->insert([
            'supplier_id' => 2,
            'product_id' => 2,
            'quantity' => 20,
            'lote' => "lote_2",
            'expiration_date' => "2018-06-01"
        ]);
        
        DB::table('detail_products')->insert([
            'supplier_id' => 3,
            'product_id' => 3,
            'quantity' => 20,
            'lote' => "lote_3",
            'expiration_date' => "2018-06-01"
        ]);        
    
    }
}