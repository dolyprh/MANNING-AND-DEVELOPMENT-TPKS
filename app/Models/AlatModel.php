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

    function getDataAlat()
    {
        return DB::table('spk_m_alat')->select(DB::raw("CONCAT(id, ',', nama_alat) as id"), 'nama_alat as text')->get();
    }

    function getDataCraine()
    {
        return DB::table('spk_m_alat')->select(DB::raw("CONCAT(id, ',', nama_alat) as id"), 'nama_alat as text')->where('jenis_alat', 'CCR')->get();
    }

    function getDataArtg()
    {
        return DB::table('spk_m_alat')->select(DB::raw("CONCAT(id, ',', nama_alat) as id"), 'nama_alat as text')->where('jenis_alat', 'ARTG')->orWhere('jenis_alat', 'RTG')->get();
    }
    
    function insert_alat($data)
    {
        if (DB::table('spk_m_alat')->insert($data)){
            return true;
        }else{
            return false;
        }
    }

    function get_alatById($id_alat) {
        return DB::table('spk_m_alat')->where('id', $id_alat)->get();
    }

    function update_alat($data, $id_alat) {
        if(DB::table('spk_m_alat')->where('id', $id_alat)->update($data)) {
            return true;
        } else {
            return false;
        }
    }

    function delete_alat($id_alat)
    {
        DB::table('spk_m_alat')->where('id', $id_alat)->delete();
    }

    
}
