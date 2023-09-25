<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('spk_m_group')->insert([
            [
                'nama_group'  => 'Group A',
                'kode'  => 'A',
            ],
            [
                'nama_group'  => 'Group B',
                'kode'  => 'B',
            ],
            [
                'nama_group'  => 'Group C',
                'kode'  => 'C',
            ],
            [
                'nama_group'  => 'Group D',
                'kode'  => 'D',
            ],
        ]);
    }
}
