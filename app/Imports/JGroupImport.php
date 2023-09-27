<?php

namespace App\Imports;

use App\Models\JGroupModel;
use Maatwebsite\Excel\Concerns\ToModel;

class JGroupImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new JGroupModel([
            //
        ]);
    }
}
