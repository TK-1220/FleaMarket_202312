<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

use function PHPSTORM_META\map;

class ListBuysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('list-buys')->insert([
            'user_id' => 1,
            'list_id' => 0,
            'date' => '2023-01-01',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
