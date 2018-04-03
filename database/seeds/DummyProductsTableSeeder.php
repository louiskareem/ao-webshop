<?php

use Illuminate\Database\Seeder;

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
            'name' => "",
            'description' => "",
            'price' => "",
            'category_id' => "",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('products')->insert([
            'name' => "",
            'description' => "",
            'price' => "",
            'category_id' => "",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('products')->insert([
            'name' => "",
            'description' => "",
            'price' => "",
            'category_id' => "",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('products')->insert([
            'name' => "",
            'description' => "",
            'price' => "",
            'category_id' => "",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('products')->insert([
            'name' => "",
            'description' => "",
            'price' => "",
            'category_id' => "",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
