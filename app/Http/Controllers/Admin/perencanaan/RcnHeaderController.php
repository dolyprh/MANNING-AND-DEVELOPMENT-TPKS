<?php

namespace App\Http\Controllers\admin\perencanaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\perencanaan\RcnHeader;

class RcnHeaderController extends Controller
{
    function insert_header() {
        try {
            
            $vesId = $request->input('ves_id'); // Ambil ves_id dari input pengguna
            // Query untuk mengambil data
            $data = \DB::table('v_rcn_kapal as s')
                ->where('s.ves_id', $vesId)
                ->insert([
                    'ves_id' => DB::raw('s.ves_id'),
                    'ves_code' => DB::raw('s.ves_code'),
                    'ves_name' => DB::raw('s.ves_name'),
                    'pelayaran' => DB::raw('s.pelayaran'),
                    'in_voyage' => DB::raw('s.in_voyage'),
                    'out_voyage' => DB::raw('s.out_voyage'),
                    'kd_awal' => DB::raw('s.kd_awal'),
                    'kd_akhir' => DB::raw('s.kd_akhir'),
                    'rcn_sandar' => DB::raw('s.rcn_sandar'),
                    'rcn_berangkat' => DB::raw('s.rcn_berangkat'),
                    'rcn_awal_kerja' => DB::raw('s.rcn_awal_kerja'),
                    'rcn_akhir_kerja' => DB::raw('s.rcn_akhir_kerja'),
                    'rcn_no' => '',
                    'kd_regional' => 9,
                    'kd_cabang' => 40,
                    'kd_terminal' => 40,
                    'status' => 0
                ]);

            // Simpan data ke dalam model
            foreach ($data as $row) {
                RcnHeader::create((array) $row);
            }
            
            return view('admin/perencanaan/rencana_baru');;
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
