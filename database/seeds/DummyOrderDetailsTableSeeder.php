<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DummyOrderDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_details')->insert([
            'order_id' => "1",
            'product_id' => "1",
            'total_products' => "2",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
