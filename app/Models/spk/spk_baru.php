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
            ->where('status', 1)
            ->whereIn('rcn_no', DB::table('spk_t_rcn_detail')
                ->select('rcn_no')
                ->where(DB::raw('DATE_FORMAT(waktu_mulai, "%Y-%m-%d")'), $tanggal)
            )
            ->get();
    }

    function getJGroup($tanggal) {
        return DB::table('spk_t_jadwal_group')
            ->where(DB::raw('DATE_FORMAT(tanggal, "%Y-%m-%d")'), $tanggal)
            ->leftjoin('spk_m_shift', 'spk_m_shift.no_shift', '=', 'spk_t_jadwal_group.id_shift')
            ->leftjoin('spk_m_group', 'spk_m_group.id_group', '=' , 'spk_t_jadwal_group.id_group')
            ->get();
       
    }

    function getJGroup_ById($id) {
        return DB::table('spk_t_jadwal_group')
            ->where('id', $id)
            ->leftjoin('spk_m_group', 'spk_m_group.id_group', '=' , 'spk_t_jadwal_group.id_group')
            ->leftjoin('spk_m_shift', 'spk_m_shift.no_shift', '=', 'spk_t_jadwal_group.id_shift')
            ->get();  
    }

    function getOperatorCC_ByGroup($id) {
        return DB::table('spk_t_jadwal_group')
            ->leftjoin('spk_m_group', 'spk_m_group.id_group', '=' , 'spk_t_jadwal_group.id_group')
            ->leftjoin('spk_m_shift', 'spk_m_shift.no_shift', '=', 'spk_t_jadwal_group.id_shift')
            // ->leftjoin('spk_m_pegawai', function ($join) {
            //     $join->on('spk_m_pegawai.group_id', '=', 'spk_m_group.kode')
            //          ->where('spk_m_pegawai.jobdesk', 'LIKE', '%CC%');
            // })
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
}
