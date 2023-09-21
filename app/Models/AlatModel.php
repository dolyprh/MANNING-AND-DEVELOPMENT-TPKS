<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AlatModel extends Model
{
    function get_alat() 
    {
        return DB::table('spk_m_alat')->get();    
    }

    public function insert_alat($data)
    {
        if (DB::table('spk_m_alat')->insert($data)){
            return true;
        }else{
            return false;
        }
    }
}
