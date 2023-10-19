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

    // function updateRcnAlat($data, $ves_id) {
    //    if(DB::table('spk_t_rcn_header')->where('ves_id', $ves_id)->update($data)){
    //         return true;
    //    } else {
    //         return false;
    //    }
    // }

    function checkRcnNoInDetail($rcnNo){
        return DB::table('spk_t_rcn_detail')->select('detail_id')->where('rcn_no', $rcnNo)->limit(1)->orderBy('detail_id', 'desc')->get();
    }

    function getDetailByRcn($no_rcn) {
        return DB::table('spk_t_rcn_detail')->where('ves_id', $no_rcn)->get();
    }
    
    function getAlatlByRcn($no_rcn) {
        return DB::table('spk_t_rcn_alat')->where('detail_id', $no_rcn)->get();
    }

    function insert_shift_temp($data) {
        return DB::table('spk_shift_temp')->insert($data);
    }

    function get_rcnAwalKerja($xves_id) {
        return DB::table('spk_v_rcn_kapal')
            ->where('ves_id', $xves_id)
            ->value('rcn_awal_kerja');
    }

    function get_rcnAkhirKerja($xves_id) {
        return DB::table('spk_v_rcn_kapal')
            ->where('ves_id', $xves_id)
            ->value('rcn_akhir_kerja');
    }

    function get_rcn_xvesid($xves_id) {
        DB::table('spk_v_rcn_kapal')
            ->where('ves_id', $xves_id)
            ->selectRaw('DATEDIFF(rcn_akhir_kerja, rcn_awal_kerja) + 1 as xdays')
            ->value('xdays');
    }

//contoh memanggil procedure
    function generate_rnc($xves_id) {
        return DB::table('spk_v_rcn_kapal')
            ->where('ves_id', $xves_id)
            ->selectRaw('DATEDIFF(rcn_akhir_kerja, rcn_awal_kerja) + 1 as xdays, rcn_awal_kerja, rcn_akhir_kerja')
            ->first();
    }

    function get_procedure($xves_id, $vrcnno) {
        $data = "CALL spk_gen_rencana_ops(?,?)";
        return DB::statement($data, [$xves_id, $vrcnno]);
    }
}