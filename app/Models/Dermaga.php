<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Dermaga extends Model
{
    function getDataDermaga()
    {
        return DB::table('spk_m_dermaga')->get();
    }

    function get_dermaga()
    {
        return DB::table('spk_m_dermaga')->select(DB::raw("CONCAT(id, ',', kode_dermaga, ',', nama_dermaga) as id"), 'kode_dermaga as text', 'nama_dermaga as dermaga')->get();
    }

    use HasFactory;

    protected $table = 'spk_m_dermaga';

    protected $fillable = [
        'kode_dermaga',
        'nama_dermaga',
        'keterangan',
    ];
}
