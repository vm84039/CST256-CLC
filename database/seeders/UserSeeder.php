<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<10; $i++  ){
            DB::table('users')->insert([
                'username' => Str::random(10),
                'firstname' => Str::random(10),
                'lastname' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'password' => Hash::make('password'),
                'roleId' => 1,
            ]);
        }
    }
}
