<?php

use Illuminate\Database\Seeder;

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
            'username' => 'こんのすけ',
            'email' => 'konnosuke@kkk',
            'password' => bcrypt('konnosuke'),
            'admin_role' => '1',
        ]);
    }
}
