<?php

namespace App\Models\perencanaan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JGroup extends Model
{
    protected $table = 'spk_t_jadwal_group';

    protected $fillable = [
        'tanggal',
        'id_group',
        'id_shift',
    ];
}
