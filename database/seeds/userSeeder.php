<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Tio',
            'email' => 'sangvictim@gmail.com',
            'akses' => '0',
            'username' => 'tio',
            'password' => bcrypt('123456'),
            'created_at' => date(now()),
            'updated_at' => date(now())
        ]);
    }
}
