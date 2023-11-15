<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JGroupModel extends Model
{
    protected $fillable = [
        'tanggal',
        'id_group',
        'id_shift',
    ];

    function get_jadwal_group()
    {
        return DB::table('spk_t_jadwal_group')->get();    
    }

    function get_jadwalByYear() {
        return DB::table('spk_t_jadwal_group')
                    ->select(DB::raw('YEAR(tanggal) as year'))
                    ->groupBy('year')
                    ->get();
    }
    
    public function insert_jadwal_group($data) 
    {
        if(DB::table('spk_t_jadwal_group')->insert($data)) {
            return true;
        } else {
            return false;
        }
    }

    function get_jgroupById($bulan) {
        if($bulan) {
            return DB::table('spk_t_jadwal_group')
                ->whereMonth('tanggal', '=' , $bulan)
                ->leftjoin('spk_m_group', 'spk_m_group.id_group', '=' , 'spk_t_jadwal_group.id_group')
                ->leftjoin('spk_m_shift', 'spk_m_shift.no_shift', '=', 'spk_t_jadwal_group.id_shift')
                ->get();
        } else {
            return DB::table('spk_t_jadwal_group')
                ->leftjoin('spk_m_group', 'spk_m_group.id_group', '=' , 'spk_t_jadwal_group.id_group')
                ->leftjoin('spk_m_shift', 'spk_m_shift.no_shift', '=', 'spk_t_jadwal_group.id_shift')
                ->get();
        }
    }

    function get_jgroupByYear($year) {
        if($year) {
            return DB::table('spk_t_jadwal_group')
                ->whereYear('tanggal', '=' , $year)
                ->leftjoin('spk_m_group', 'spk_m_group.id_group', '=' , 'spk_t_jadwal_group.id_group')
                ->leftjoin('spk_m_shift', 'spk_m_shift.no_shift', '=', 'spk_t_jadwal_group.id_shift')
                ->get();
        } else {
            return DB::table('spk_t_jadwal_group')
                ->leftjoin('spk_m_group', 'spk_m_group.id_group', '=' , 'spk_t_jadwal_group.id_group')
                ->leftjoin('spk_m_shift', 'spk_m_shift.no_shift', '=', 'spk_t_jadwal_group.id_shift')
                ->get();
        }
    }

    function delete_jgroup($id_jgroup)
    {
        DB::table('spk_t_jadwal_group')->where('id', $id_jgroup)->delete();    
    }
}
