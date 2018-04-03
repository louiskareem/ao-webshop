<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DummyProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => "Zero to One",
            'description' => "author: Peter Thiel",
            'price' => "15.50",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('products')->insert([
            'name' => "NBA 2K18",
            'description' => "developer: 2K Sports",
            'price' => "59.99",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('products')->insert([
            'name' => "Samsung s9+",
            'description' => "product of Samsung Group",
            'price' => "800.00",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('products')->insert([
            'name' => "Jack & Jones winter jacket",
            'description' => "product of Jack & Jones",
            'price' => "80.00",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('products')->insert([
            'name' => "Tag Heuer chronograph watch",
            'description' => "product of Tag Heuer Group",
            'price' => "2990.00",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
