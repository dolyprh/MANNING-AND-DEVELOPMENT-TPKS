<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menus')->insert([
            [
                'nama_menu' => 'Master',
                'url_menu' => '/master',
                'icon' => 'fa-cog',
                'data_target' => 'collapseTwo',
                'data_parent' => 'collapseTwo',
            ],
            [
                'nama_menu' => 'Perencanaan',
                'url_menu' => '/perencanaan',
                'icon' => 'fa-wrench',
                'data_target' => 'collapsePerencanaan',
                'data_parent' => 'collapsePerencanaan'
            ],
            [
                'nama_menu' => 'Surat Perintah Kerja',
                'url_menu' => '/spk',
                'icon' => 'fa-folder',
                'data_target' => 'collapseSpk',
                'data_parent' => 'collapseSpk'
            ],
            [
                'nama_menu' => 'Extra Fooding',
                'url_menu' => '/fooding',
                'icon' => 'fa-pizza-slice',
                'data_target' => 'collapseFooding',
                'data_parent' => 'collapseFooding'
            ],
            [
                'nama_menu' => 'Laporan',
                'url_menu' => '/master',
                'icon' => 'fa-table',
                'data_target' => 'collapseLaporan',
                'data_parent' => 'collapseLaporan'
            ],
        ]);
    }
}
