<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PegawaiModel extends Model
{
    function get_pegawai()
    {
        return DB::table('spk_m_pegawai')->get();    
    }

    function insert_pegawai($data) 
    {
        if(DB::table('spk_m_pegawai')->insert($data)){
            return true;
        } else {
            return false;
        }
    }

    function delete_pegawai($id_pegawai) 
    {
        DB::table('spk_m_pegawai')->where('id', $id_pegawai)->delete();    
    }
}
