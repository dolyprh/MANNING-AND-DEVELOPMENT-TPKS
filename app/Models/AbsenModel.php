<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AbsenModel extends Model
{
    function get_absen()
    {
        return DB::table('spk_m_jenisabsen')->get();    
    }

    function insert_absen($data) 
    {
        if(DB::table('spk_m_jenisabsen')->insert($data)) {
            return true;
        } else {
            return false;
        }
    }

    function get_absenById($id_absen) {
        return DB::table('spk_m_jenisabsen')->where('id', $id_absen)->get();
    }

    function update_absen($data, $id_absen) {
        if(DB::table('spk_m_jenisabsen')->where('id', $id_absen)->update($data)) {
            return true;
        } else {
            return false;
        }
    }

    function delete_absen($id_absen)
    {
        DB::table('spk_m_jenisabsen')->where('id', $id_absen)->delete();    
    }
}
