<?php

namespace App\Imports;

use App\Models\perencanaan\JGroup;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class jgrupImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new JGroup([
            'tanggal'     => $row['tanggal'],
            'id_group'    => $row['id_group'], 
            'id_shift'    => $row['id_shift'],
        ]);
    }
}
