<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubmenuSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('submenus')->insert([
            [
                'parent_id' => '1',
                'nama_submenu' => 'Alat',
                'url_submenu' => '/alat',
            ],
            [
                'parent_id' => '1',
                'nama_submenu' => 'Group',
                'url_submenu' => '/group',
            ],
            [
                'parent_id' => '1',
                'nama_submenu' => 'Jenis Absen',
                'url_submenu' => '/jenis-absen',
            ],
            [
                'parent_id' => '1',
                'nama_submenu' => 'Pegawai Mitra',
                'url_submenu' => '/pegawai-mitra',
            ],
            [
                'parent_id' => '1',
                'nama_submenu' => 'Notifikasi',
                'url_submenu' => '/notifikasi',
            ],
            [
                'parent_id' => '1',
                'nama_submenu' => 'Katering',
                'url_submenu' => '/katering',
            ],
            [
                'parent_id' => '1',
                'nama_submenu' => 'Mitra Kerja',
                'url_submenu' => '/mitra-kerja',
            ],
            [
                'parent_id' => '1',
                'nama_submenu' => 'Pegawai',
                'url_submenu' => '/pegawai',
            ],
            [
                'parent_id' => '1',
                'nama_submenu' => 'Shift',
                'url_submenu' => '/shift',
            ],
            [
                'parent_id' => '1',
                'nama_submenu' => 'Dermaga',
                'url_submenu' => '/dermaga',
            ],
            [
                'parent_id' => '1',
                'nama_submenu' => 'Menu',
                'url_submenu' => '/menu',
            ],
            [
                'parent_id' => '1',
                'nama_submenu' => 'Menu-Hak Akses',
                'url_submenu' => '/hak-akses',
            ],
            [
                'parent_id' => '2',
                'nama_submenu' => 'Rencana Baru',
                'url_submenu' => '/rencana-baru',
            ],
            [
                'parent_id' => '2',
                'nama_submenu' => 'Jadwal Group',
                'url_submenu' => '/jadwal-group',
            ],
            [
                'parent_id' => '3',
                'nama_submenu' => 'SPK Baru',
                'url_submenu' => '/spk-baru',
            ],
            [
                'parent_id' => '3',
                'nama_submenu' => 'Riwayat SPK',
                'url_submenu' => '/riwayat-spk',
            ],
            [
                'parent_id' => '4',
                'nama_submenu' => 'Jadwal Tanpa Makan',
                'url_submenu' => '/jadwal-tanpa-makan',
            ],
            [
                'parent_id' => '4',
                'nama_submenu' => 'Jadwal Ketering',
                'url_submenu' => '/jadwal-katering',
            ],
            [
                'parent_id' => '4',
                'nama_submenu' => 'Pesanan',
                'url_submenu' => '/pesanan',
            ],
            [
                'parent_id' => '5',
                'nama_submenu' => 'Laporan',
                'url_submenu' => '/laporan',
            ],
        ]);
    }
}
