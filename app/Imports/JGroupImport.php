<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\DB;

class JGroupImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            // Map Excel columns to database columns
            $data = [
                'tanggal' => $row[1],
                'id_group' => $row[2],
                'id_shift' => $row[3],
            ];

            // Insert the data into the database using the DB Facade
            DB::table('spk_t_jadwal_group')->insert($data);
        }
    }
}
