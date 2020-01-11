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
            'name' => 'Administrator',
            'email' => 'administrator@admin.com',
            'akses' => '0',
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'created_at' => date(now()),
            'updated_at' => date(now())
        ]);
    }
}
