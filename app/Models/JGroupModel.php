<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JGroupModel extends Model
{

    function get_jadwal_group()
    {
        return DB::table('spk_t_jadwal_group')->get();    
    }
    
    public function insert_jadwal_group($data) 
    {
        if(DB::table('spk_t_jadwal_group')->insert($data)) {
            return true;
        } else {
            return false;
        }
    }

    function get_jgroupById() {
        return DB::table('spk_t_jadwal_group')
            ->leftjoin('spk_m_group', 'spk_m_group.id', '=' , 'spk_t_jadwal_group.id_group')
            ->leftjoin('spk_m_shift', 'spk_m_shift.id_shift', '=', 'spk_t_jadwal_group.id_shift')
            ->get();
    }

    function delete_jgroup($id_jgroup)
    {
        DB::table('spk_t_jadwal_group')->where('id', $id_jgroup)->delete();    
    }
}