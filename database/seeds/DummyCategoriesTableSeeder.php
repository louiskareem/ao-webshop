<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DummyCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => "Electronics",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('categories')->insert([
            'name' => "Games",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('categories')->insert([
            'name' => "Books",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('categories')->insert([
            'name' => "Clothing",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('categories')->insert([
            'name' => "Jewelry",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
