<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KateringSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('spk_m_katering')->insert([
            [
                'nama'              => 'CV.aditria',
                'email_vendor_food' => 'dhitria.com@gmail.com',
                'kode_cabang'       => '40',
                'kode_terminal'     => '40',
                'kode_regional'     => '9',
                'phone'             => '+62 822-2500-0701',
            ],
            [
                'nama'              => 'Yahya Dwi Erika',
                'email_vendor_food' => 'dwierika40@gmail.com',
                'kode_cabang'       => '40',
                'kode_terminal'     => '40',
                'kode_regional'     => '9',
                'phone'             => '+62 815-4228-0905',
            ],
            [
                'nama'              => 'Warung Ijo',
                'email_vendor_food' => 'kaswadi5.2020@gmail.com',
                'kode_cabang'       => '40',
                'kode_terminal'     => '40',
                'kode_regional'     => '9',
                'phone'             => '+62 812-2880-4040',
            ],
            
        ]);
    }
}
