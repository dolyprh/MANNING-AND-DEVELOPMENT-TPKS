<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KateringModel extends Model
{
    function get_katering() 
    {
        return DB::table('spk_m_katering')->get();    
    }

    public function insert_katering($data)
    {
        if (DB::table('spk_m_katering')->insert($data)){
            return true;
        }else{
            return false;
        }
    }

    function get_kateringById($id_katering) {
        return DB::table('spk_m_katering')->where('id', $id_katering)->get();
    }

    function update_katering($data, $id_katering) {
        if(DB::table('spk_m_katering')->where('id', $id_katering)->update($data)) {
            return true;
        } else {
            return false;
        }
    }

    function delete_katering($id_kat) 
    {
        DB::table('spk_m_katering')->where('id', $id_kat)->delete();    
    }
}
