<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
         'name' => 'shabbir ahmad',
            'email'=>'shabbir789shahid@gmail.com',
            'phone'=>'343284734',
            'password'=>Hash::make('password'),
        ]);

            }
}
