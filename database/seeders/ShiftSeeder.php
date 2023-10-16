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
                'nama_shift'         => 'Shift 1',
                'waktu_mulai'        => '08:00',
                'waktu_selesai'      => '15:59',
                'mulai_istirahat'    => '12:00',
                'selesai_istirahat'  => '13:00',
                'kd_cabang'          => '40',
                'kd_terminal'        => '40',
                'kd_regional'        => '9',
            ],
            [
                'nama_shift'         => 'Shift 2',
                'waktu_mulai'        => '16:00',
                'waktu_selesai'      => '11:59',
                'mulai_istirahat'    => '18:00',
                'selesai_istirahat'  => '19:00',
                'kd_cabang'          => '40',
                'kd_terminal'        => '40',
                'kd_regional'        => '9',
            ],
            [
                'nama_shift'         => 'Shift 3',
                'waktu_mulai'        => '00:00',
                'waktu_selesai'      => '07:59',
                'mulai_istirahat'    => '04:00',
                'selesai_istirahat'  => '05:00',
                'kd_cabang'          => '40',
                'kd_terminal'        => '40',
                'kd_regional'        => '9',
            ],
        ]);
    }
}
