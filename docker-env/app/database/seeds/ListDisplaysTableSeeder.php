<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ListDisplaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('list-display')->insert([
            'name' => 'sample001',
            'price' => 800,
            'user_id' => 1,
            'image' => 'sample.png',
            'profile' => 'sample sample sample',
            'date' => '2023-01-01',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
