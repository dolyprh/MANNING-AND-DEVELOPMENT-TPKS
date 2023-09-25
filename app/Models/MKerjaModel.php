<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MKerjaModel extends Model
{
    function get_mitra()
    {
        return DB::table('spk_m_mitrakerja')->get();    
    }

    function insert_mitra($data) 
    {
        if(DB::table('spk_m_mitrakerja')->insert($data)) {
            return true;
        } else {
            return false;
        }
    }

    function delete_mitra($id_mitra)
    {
        DB::table('spk_m_mitrakerja')->where('id', $id_mitra)->delete();    
    }
}
