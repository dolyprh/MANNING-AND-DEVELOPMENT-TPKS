<?php

namespace App\Models\spk;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class spk_baru extends Model
{
    public function getRcnHeaderByDate($tanggal)
    {
        return DB::table('spk_t_rcn_header')
            ->where('status', 0)
            ->whereIn('rcn_no', DB::table('spk_t_rcn_detail')
                ->select('rcn_no')
                ->where(DB::raw('DATE_FORMAT(waktu_mulai, "%Y-%m-%d")'), $tanggal)
            )
            ->get();
    }

    function getJGroup($tanggal) {
        return DB::table('spk_t_jadwal_group')
            ->where(DB::raw('DATE_FORMAT(tanggal, "%Y-%m-%d")'), $tanggal)
            ->leftjoin('spk_tspk_header', 'spk_tspk_header.id_h', '=' , 'spk_t_jadwal_group.id')
            ->leftjoin('spk_m_shift', 'spk_m_shift.no_shift', '=', 'spk_t_jadwal_group.id_shift')
            ->leftjoin('spk_m_group', 'spk_m_group.id_group', '=' , 'spk_t_jadwal_group.id_group')
            ->get();
    }

    function cek_tspk_header($spk_no) {
        return DB::table('spk_tspk_header')
            ->where('spk_no', $spk_no)
            ->get();
    }

    // function get_tspk_header($tanggal) {
    //     return DB::table('spk_t_jadwal_group')
    //         ->where(DB::raw('DATE_FORMAT(spk_t_jadwal_group.tanggal, "%Y-%m-%d")'), $tanggal)
    //         ->leftjoin('spk_m_shift', 'spk_m_shift.no_shift', '=', 'spk_t_jadwal_group.id_shift')
    //         ->leftjoin('spk_m_group', 'spk_m_group.id_group', '=' , 'spk_t_jadwal_group.id_group')
    //         ->leftjoin('spk_tspk_header', 'spk_tspk_header.id', '=' , 'spk_t_jadwal_group.id')
    //         ->where('spk_tspk_header.id', '1')
    //         ->get();
    // }

    function getJGroup_ById($id) {
        return DB::table('spk_t_jadwal_group')
            ->where('spk_t_jadwal_group.id', $id)
            ->leftjoin('spk_m_group', 'spk_m_group.id_group', '=' , 'spk_t_jadwal_group.id_group')
            ->leftjoin('spk_m_shift', 'spk_m_shift.no_shift', '=', 'spk_t_jadwal_group.id_shift')
            ->leftjoin('spk_m_pegawai', 'spk_m_pegawai.group_id', '=', 'spk_m_group.kode')
            ->where('spk_m_pegawai.jobdesk', 'Vessel Planner')
            // ->where('spk_m_pegawai.jobdesk', 'Vessel Planner')
            ->get();
    }

    function get_ship_planner($id) {
        return DB::table('spk_t_jadwal_group')
            ->where('spk_t_jadwal_group.id', $id)
            ->leftjoin('spk_m_group', 'spk_m_group.id_group', '=' , 'spk_t_jadwal_group.id_group')
            ->leftjoin('spk_m_shift', 'spk_m_shift.no_shift', '=', 'spk_t_jadwal_group.id_shift')
            ->leftjoin('spk_m_pegawai', 'spk_m_pegawai.group_id', '=', 'spk_m_group.kode')
            ->where('spk_m_pegawai.jobdesk', 'Ship Planner')
            ->get();
    }

    function insert_tspk_header($data) {
        return DB::table('spk_tspk_header')->insert($data);
    }
    
    function get_headerById() {
        return DB::table('spk_tspk_header')->select('id_h')->limit(1)->orderBy('created_date', 'desc')->get();
    }

    function getOperatorCC_ByGroup($id) {
        return DB::table('spk_t_jadwal_group')
            ->leftjoin('spk_m_group', 'spk_m_group.id_group', '=' , 'spk_t_jadwal_group.id_group')
            ->leftjoin('spk_m_shift', 'spk_m_shift.no_shift', '=', 'spk_t_jadwal_group.id_shift')
            ->leftjoin('spk_m_pegawai', 'spk_m_pegawai.group_id', '=', 'spk_m_group.kode')
            ->where('spk_m_pegawai.jobdesk', 'LIKE', '%CC%')
            ->where('spk_t_jadwal_group.id', $id)
            ->get();  
    }

    function getOperatorRTG_ByGroup($id) {
        return DB::table('spk_t_jadwal_group')
            ->leftjoin('spk_m_group', 'spk_m_group.id_group', '=' , 'spk_t_jadwal_group.id_group')
            ->leftjoin('spk_m_shift', 'spk_m_shift.no_shift', '=', 'spk_t_jadwal_group.id_shift')
            ->leftjoin('spk_m_pegawai', 'spk_m_pegawai.group_id', '=', 'spk_m_group.kode')
            ->where('spk_m_pegawai.jobdesk', 'LIKE', '%RTG%')
            ->where('spk_t_jadwal_group.id', $id)
            ->get();  
    }

    function getOperatorRS_ByGroup($id) {
        return DB::table('spk_t_jadwal_group')
            ->leftjoin('spk_m_group', 'spk_m_group.id_group', '=' , 'spk_t_jadwal_group.id_group')
            ->leftjoin('spk_m_shift', 'spk_m_shift.no_shift', '=', 'spk_t_jadwal_group.id_shift')
            ->leftjoin('spk_m_pegawai', 'spk_m_pegawai.group_id', '=', 'spk_m_group.kode')
            ->where('spk_m_pegawai.jobdesk', 'LIKE', '%RS%')
            ->where('spk_t_jadwal_group.id', $id)
            ->get();  
    }

    function getOperator_ByShiftGroup($id) {
        return DB::table('spk_t_jadwal_group')
            ->leftjoin('spk_m_group', 'spk_m_group.id_group', '=' , 'spk_t_jadwal_group.id_group')
            ->leftjoin('spk_m_shift', 'spk_m_shift.no_shift', '=', 'spk_t_jadwal_group.id_shift')
            ->leftjoin('spk_m_pegawai', 'spk_m_pegawai.group_id', '=', 'spk_m_group.kode')
            ->where('spk_t_jadwal_group.id', $id)
            ->get();  
    }


    function get_tpsk_operatorcc() {
        return DB::table('spk_tspk_operatorcc')->get();
    }

    function insert_tpsk_operatorcc($data) {
        DB::table('spk_tspk_operatorcc')->insert($data);
    }

    function insert_tpsk_operatorabsen($data) {
        DB::table('spk_tspk_operator_absen')->insert($data);
    }

    function getOperatorCC_ById($id_operator) {
        return DB::table('spk_t_jadwal_group')
            ->leftjoin('spk_m_group', 'spk_m_group.id_group', '=' , 'spk_t_jadwal_group.id_group')
            ->leftjoin('spk_m_shift', 'spk_m_shift.no_shift', '=', 'spk_t_jadwal_group.id_shift')
            ->leftjoin('spk_m_pegawai', 'spk_m_pegawai.group_id', '=', 'spk_m_group.kode')
            ->where('spk_m_pegawai.jobdesk', 'LIKE', '%CC%')
            ->where('spk_m_pegawai.id', $id_operator)
            ->get();  
    }

    function getTanggal_ByRcnDetail($tanggal, $id_shift) {
        return DB::table('spk_t_rcn_detail')
            ->where(DB::raw('DATE_FORMAT(waktu_mulai, "%Y-%m-%d")'), $tanggal)
            ->Where('id_shift', $id_shift)
            ->get();
    }

    function get_tspk_header(){
        return DB::table('spk_tspk_header')->get();
    }
}
