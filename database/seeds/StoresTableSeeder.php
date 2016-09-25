<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_store')->truncate();
        DB::table('stores')->truncate();
        factory(App\Store::class, 20)->create();
        factory(App\ProductStore::class, 50)->create();
    }
}
