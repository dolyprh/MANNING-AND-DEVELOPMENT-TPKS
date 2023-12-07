<?php

namespace App\Http\Controllers\Admin\spk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuModel;
use App\Models\spk\spk_baru;
use App\Models\AlatModel;
use App\Models\AbsenModel;

class RiwayatSpkController extends Controller
{
    public function __construct()
    {
        $this->MenuModel = new MenuModel();
        $this->SpkModel = new spk_baru();
        $this->AlatModel = new AlatModel();
        $this->AbsenModel = new AbsenModel();
    }

    public function index()
    {
        $data = [
            'menus' => $this->MenuModel->getMenus(),
            'submenus'    => $this->MenuModel->getSubmenus(),
            'tspk_header' => $this->SpkModel->get_tspk_header(),
        ];

        return view('admin.spk.spk_riwayat', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $data = [
            'menus'         => $this->MenuModel->getMenus(),
            'submenus'      => $this->MenuModel->getSubmenus(),
            'group_shift'   => $this->SpkModel->getJGroup_ById($id),
            'operator_cc'   => $this->SpkModel->getOperatorCC_ByGroup($id),
            'operator_rtg'  => $this->SpkModel->getOperatorRTG_ByGroup($id),
            'operator_rs'  => $this->SpkModel->getOperatorRS_ByGroup($id),
            'alat_cc'       => $this->AlatModel->getDataCraine(),
            'alat_rtg'       => $this->AlatModel->getDataArtg(),
            'alat_rs'       => $this->AlatModel->getDataRS(),
            'jenis_absen'   => $this->AbsenModel->get_absen(),
            // 'detail_rcn'    => $this->SpkModel->getTanggal_ByRcnDetail($tanggal, $id_shift),
            'id_group'      => $id,
        ];
        
        return view('admin.spk.spk_update', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
