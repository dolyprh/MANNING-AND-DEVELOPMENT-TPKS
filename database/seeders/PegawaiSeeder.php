<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('spk_m_pegawai')->insert([
            [
                'nama'          => 'TRIYONO',
                'nipp'           => '870604729',
                'status'        => 'non shift',
                'email_address' => 'triyono@pelindo.co.id',
                'keterangan'    => '',
                'type'          => 'organik',
                'phone'         => '',
                'kd_cabang'     => '40',
                'kd_terminal'   => '40',
                'kd_regional'   => '9',
                'jobdesk'       => 'admin',
                'group_id'         => 'D',
            ],
        ]);
    }
}
