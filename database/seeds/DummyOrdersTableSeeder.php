<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DummyOrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            'client_id' => "1",
            'status' => "NULL",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
