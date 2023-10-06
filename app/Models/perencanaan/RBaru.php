<?php

namespace App\Models\perencanaan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RBaru extends Model
{
    function get_rencanaBaru() {
        return DB::table('spk_t_rcn_header')->where('status', 1)->get();
    }

    function get_rencanaBaruByStatus() {
        return DB::table('spk_t_rcn_header')->where('status', 0)->get();
    }

    function get_rencanaById($id_rencana) 
    {
        return DB::table('spk_t_rcn_header')->where('id', $id_rencana)->get();
    }
    
    function get_kapal() {
        return DB::table('spk_v_rcn_kapal')->get();
    }
}
