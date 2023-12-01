<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'nipp' => '32131',
                'username' => 'admin',
                'password' => Hash::make('123'),
                'role'     => 'admin'
            ],
            [
                'name' => 'pegawai',
                'nipp'  => '34231',
                'username' => 'pegawai',
                'password' => Hash::make('321'),
                'role'     => 'superintendent'
            ],
        ]);
    }
}
