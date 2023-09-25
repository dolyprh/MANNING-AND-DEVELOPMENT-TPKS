<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AbsenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('spk_m_jenisabsen')->insert([
            [
                'nama'  => 'Masuk',
                'kode'  => 'M',
            ],
            [
                'nama'  => 'Izin',
                'kode'  => 'I',
            ],
            [
                'nama'  => 'Sakit',
                'kode'  => 'S',
            ],
            [
                'nama'  => 'WFH',
                'kode'  => 'WFH',
            ],
            [
                'nama'  => 'CUTI',
                'kode'  => 'C',
            ],
            [
                'nama'  => 'Stand by',
                'kode'  => 'ST',
            ],
        ]);
    }
}
