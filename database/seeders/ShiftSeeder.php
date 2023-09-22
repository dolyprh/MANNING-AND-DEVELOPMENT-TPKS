<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('spk_m_shift')->insert([
            [
                'nama_shift'         => 'CV.aditria',
                'waktu_mulai'        => '12:00 AM',
                'waktu_selesai'      => '07:59 AM',
                'mulai_istirahat'    => '04:00 AM',
                'selesai_istirahat'  => '05:00 AM',
                'kd_cabang'          => '40',
                'kd_terminal'        => '40',
                'kd_regional'        => '9',
            ],
            
        ]);
    }
}
