<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SuppliersTableSeeder::class);
        $this->call(ProductsTableSeeder::class);     
        $this->call(DetailProductsSeeder::class);                             
        $this->call(InventoriesTableSeeder::class);    
        $this->call(SalesTableSeeder::class);             
    }
}
