<?php

namespace App\Imports;

use App\Models\perencanaan\JGroup;
use Maatwebsite\Excel\Concerns\ToModel;
// use Maatwebsite\Excel\Concerns\WithHeadingRow;

class jgrupImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $UNIX_DATE = ($row[1] - 25569) * 86400;
        $date_column = gmdate("Y-m-d H:i:s", $UNIX_DATE);

        return new JGroup([
            'tanggal'     => $date_column,
            'id_group'    => $row[2], 
            'id_shift'    => $row[3],
        ]);
    }
}
