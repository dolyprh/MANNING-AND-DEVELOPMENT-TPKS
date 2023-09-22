<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ShiftModel extends Model
{
    public function get_shift() 
    {
        return DB::table('spk_m_shift')->get();
    
    }

    public function insert_shift($data)
    {
        if (DB::table('spk_m_shift')->insert($data)){
            return true;
        }else{
            return false;
        }
    }

    function delete_shift($id_shift) 
    {
        DB::table('spk_m_shift')->where('id_shift', $id_shift)->delete();    
    }
}
