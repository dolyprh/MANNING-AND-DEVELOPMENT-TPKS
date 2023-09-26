<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ParamModel extends Model
{

    public function get_param() 
    {
        return DB::table('spk_m_parameter')->get();
    
    }

    public function insert_param($data)
    {
        if (DB::table('spk_m_parameter')->insert($data)){
            return true;
        }else{
            return false;
        }
    }

    function get_paramById($id_param) 
    {
        return DB::table('spk_m_parameter')->where('param_id', $id_param)->get();
    }

    function update_param($data, $id_param)
    {
        if(DB::table('spk_m_parameter')->where('param_id', $id_param)->update($data)){
            return true;
        } else {
            return false;
        }
    }

    function delete_param($id_param) 
    {
        DB::table('spk_m_parameter')->where('param_id', $id_param)->delete();    
    }

}
