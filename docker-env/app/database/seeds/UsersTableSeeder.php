<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'user001',
            'email' => 'user001@mail.com',
            'password' => '001001',
            'image' => 'sample.png',
            'profile' => 'text text text 001',
            'tel' => '0123456789',
            'address' => 'addressTest',
            'root' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
