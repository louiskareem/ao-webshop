<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DummyCategoryProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('category_product')->insert([
            'category_id' => "1",
            'product_id' => "6",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // DB::table('category_product')->insert([
        //     'category_id' => "1",
        //     'product_id' => "1",
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        // ]);

        // DB::table('category_product')->insert([
        //     'category_id' => "2",
        //     'product_id' => "2",
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        // ]);

        // DB::table('category_product')->insert([
        //     'category_id' => "3",
        //     'product_id' => "3",
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        // ]);

        // DB::table('category_product')->insert([
        //     'category_id' => "4",
        //     'product_id' => "4",
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        // ]);

        // DB::table('category_product')->insert([
        //     'category_id' => "5",
        //     'product_id' => "5",
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        // ]);
    }
}
