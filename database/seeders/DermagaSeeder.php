<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DermagaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('spk_m_dermaga')->insert([
            [
                'kode_dermaga'  => 'D-01',
                'nama_dermaga'  => 'Dermaga 01',
                'keterangan'  => 'Dermaga 01 TPKS',
            ],
            [
                'kode_dermaga'  => 'D-02',
                'nama_dermaga'  => 'Dermaga 02',
                'keterangan'  => 'Dermaga 02 TPKS',
            ],
            [
                'kode_dermaga'  => 'D-03',
                'nama_dermaga'  => 'Dermaga 03',
                'keterangan'  => 'Dermaga 03 TPKS',
            ],
            [
                'kode_dermaga'  => 'D-04',
                'nama_dermaga'  => 'Dermaga 04',
                'keterangan'  => 'Dermaga 04 TPKS',
            ],
            
        ]);
    }
}
