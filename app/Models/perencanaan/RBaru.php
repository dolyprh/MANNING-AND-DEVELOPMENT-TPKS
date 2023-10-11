<?php

namespace App\Models\perencanaan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RBaru extends Model
{
    function get_rencanaBaru()
    {
        return DB::table('spk_t_rcn_header')->where('status', 0)->get();
    }

    function getRencanaBaruLimit()
    {
        return DB::table('spk_t_rcn_header')->where('status', 0)->limit(1)->orderBy('created_at', 'desc')->get();
    }

    function get_rencanaBaruByStatus()
    {
        return DB::table('spk_t_rcn_header')->where('status', 1)->get();
    }

    function get_rencanaById($id_rencana)
    {
        return DB::table('spk_t_rcn_header')->where('rcn_no', $id_rencana)->get();
    }

    function insert_rcn_header($data)
    {
        if (DB::table('spk_t_rcn_header')->insert($data)) {
            return true;
        } else {
            return false;
        }
    }

    function getAllVesId()
    {
        return DB::table('spk_t_rcn_header')->select('ves_id')->get();
    }

    function get_kapal()
    {
        return DB::table('spk_v_rcn_kapal')->get();
    }

    function get_kapalById($id_kapal)
    {
        return DB::table('spk_v_rcn_kapal')->where('ves_id', $id_kapal)->get();
    }

    function insertRcnAlat($data){
        return DB::table('spk_t_rcn_alat')->insert($data);
    }

    function InsertRcnDetail($data){
        return DB::table('spk_t_rcn_detail')->insert($data);
    }

    function checkRcnNoInDetail($rcnNo){
        return DB::table('spk_t_rcn_detail')->select('detail_id')->where('rcn_no', $rcnNo)->limit(1)->orderBy('detail_id', 'desc')->get();
    }

}
