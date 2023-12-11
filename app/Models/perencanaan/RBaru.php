<?php

namespace App\Models\perencanaan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RBaru extends Model
{

    function get_rencanaBaru()
    {
        return DB::table('spk_t_rcn_header')->get();
    }

    function getRencanaBaruLimit()
    {
        return DB::table('spk_t_rcn_header')->limit(1)->orderBy('created_at', 'desc')->get();
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

    function getDetailByRcn($rcn_no) {
        return DB::table('spk_t_rcn_detail')
            ->where('rcn_no', $rcn_no)
            ->get();
    }
    
    function getAlatlByRcn($rcn_no, $detail_id) {
        return DB::table('spk_t_rcn_alat')
            // ->where('detail_id', $id_rencana)
            ->where('rcn_no', $rcn_no)
            ->where('detail_id', $detail_id)
            ->get();
    }

    function getAlatlByRcnJson($rcn_no, $detail_id) {
        return DB::table('spk_t_rcn_alat')
            ->leftjoin('spk_t_rcn_detail', 'spk_t_rcn_detail.rcn_no', '=', 'spk_t_rcn_alat.rcn_no')
            ->where('spk_t_rcn_detail.rcn_no', $rcn_no)
            ->where('spk_t_rcn_detail.detail_id', $detail_id)
            ->where('spk_t_rcn_alat.detail_id', $detail_id)
            ->get();
    }

    // function getAlatlByRcnJson() {
    //     return DB::table('spk_t_rcn_alat')
    //         ->leftjoin('spk_t_rcn_detail', 'spk_t_rcn_detail.rcn_no', '=', 'spk_t_rcn_alat.rcn_no')
    //         ->where('spk_t_rcn_detail.rcn_no', 'RCN-SIUR01930102023')
    //         ->where('spk_t_rcn_detail.detail_id', 9)
    //         ->where('spk_t_rcn_alat.detail_id', 9)
    //         ->get();
    // }

    function insert_shift_temp($data) {
        return DB::table('spk_shift_temp')->insert($data);
    }

    public static function executeStoredProc($xves_id, $vrcnno)
    {
        DB::statement("CALL spk_gen_rencana_ops(?, ?)", [$xves_id, $vrcnno]);
    }

    function getDetail($id_rcn)
    {
        return DB::table('spk_t_rcn_detail')->where('rcn_no', $id_rcn)->get();
    }

    function get_detailAlat() : Returntype {
        
    }

    function delete_RcnAlat($rcn_no, $seq_id) {
        DB::table('spk_t_rcn_alat')
            // ->leftjoin('spk_t_rcn_detail', 'spk_t_rcn_detail.rcn_no', '=', 'spk_t_rcn_alat.rcn_no')
            ->where('spk_t_rcn_alat.rcn_no', $rcn_no)
            ->where('spk_t_rcn_alat.seq_id', $seq_id)
            ->delete();
    }

}