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

    function delete_param($id_param) 
    {
        DB::table('spk_m_parameter')->where('param_id', $id_param)->delete();    
    }

}
