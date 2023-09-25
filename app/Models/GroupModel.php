<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GroupModel extends Model
{
    function get_group()
    {
        return DB::table('spk_m_group')->get();    
    }

    function insert_group($data) 
    {
        if(DB::table('spk_m_group')->insert($data)) {
            return true;
        } else {
            return false;
        }
    }

    function delete_group($id_group)
    {
        DB::table('spk_m_group')->where('id', $id_group)->delete();    
    }
}
