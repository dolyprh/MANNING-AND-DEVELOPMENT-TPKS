<?php

namespace App\Models\perencanaan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RcnHeader extends Model
{
    use HasFactory;

    protected $table = 'spk_t_rcn_header';
    protected $fillable = [
        'ves_id',
        'ves_code',
        'ves_name',
        'pelayaran',
        'in_voyage',
        'out_voyage',
        'kd_awal',
        'kd_akhir',
        'rcn_sandar',
        'rcn_berangkat',
        'rcn_awal_kerja',
        'rcn_akhir_kerja',
        'rcn_no',
        'kd',
        'kd_regional',
        'kd_cabang',
        'kd_terminal',
        'status',
    ];
}
