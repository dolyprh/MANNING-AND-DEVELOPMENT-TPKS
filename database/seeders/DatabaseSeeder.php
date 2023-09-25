<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(SubmenuSeeder::class);
        $this->call(KateringSeeder::class);
        $this->call(ShiftSeeder::class);
        $this->call(PegawaiSeeder::class);
        $this->call(GroupSeeder::class);
        $this->call(AbsenSeeder::class);
    }
}
