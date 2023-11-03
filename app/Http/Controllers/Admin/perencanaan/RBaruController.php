<?php

namespace App\Http\Controllers\admin\perencanaan;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MenuModel;
use App\Models\perencanaan\RBaru;
use App\Models\AlatModel;
use App\Models\ShiftModel;
use App\Models\perencanaan\RcnHeader;
use DateTime;

class RBaruController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->MenuModel = new MenuModel();
        $this->RBaru = new RBaru();
        $this->AlatModel = new AlatModel();
        $this->ShiftModel = new ShiftModel();
    }

    public function index()
    {
        $kapal = $this->RBaru->getAllVesId();
        $newKapal = [];
        foreach ($this->RBaru->get_kapal() as $kap) {
            if (!$kapal->contains("ves_id", $kap->ves_id)) {
                array_push($newKapal, $kap);
            }
        }
        $data = [
            'menus' => $this->MenuModel->getMenus(),
            'submenus' => $this->MenuModel->getSubmenus(),
            'rencana' => $this->RBaru->get_rencanaBaru(),
            'rencana_kapal' => $newKapal,
        ];
//        return $kapal;
        return view('admin/perencanaan/rencana_baru', $data);
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
        $xves_id = $request->valey;
        $vrcnno = 'RCN-' . $xves_id . date('dmY');
        
        RBaru::executeStoredProc($xves_id, $vrcnno);
        return redirect('/rencana-baru/detail')->withSuccess('Jadwal Group Berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id_rcn)
    {

        $data = [
            'menus' => $this->MenuModel->getMenus(),
            'submenus' => $this->MenuModel->getSubmenus(),
            'alat' => $this->AlatModel->getDataAlat(),
            'rencana' => $this->RBaru->getRencanaBaruLimit(),
            'rcn_detail' => $this->RBaru->getDetail($id_rcn),
            'alat_ccr'    => $this->AlatModel->getDataCraine(),
            'alat_artg'    => $this->AlatModel->getDataArtg(),
        ];

        return view('admin.perencanaan.tambah_rencana', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
    public function destroy()
    {
        // $this->RBaru->delete_RcnAlat($seq_id, $rcn_no);
        // return redirect('rencana-kapal/detail-rencana/MKAT159/RCN-MKAT15930102023')->withSuccess('Berhasil Hapus Alat');
    }

    function insert_alat_rcn(Request $request, $id_rencana, $rcn_no)
    {
        $request->validate(
            [
                "tambah_alat_ccr" => "required",
                "tambah_alat_artg" => "required",
            ],
            [
                "tambah_alat_ccr.required" => "Alat CCR Wajib diisi!",
                "tambah_alat_artg.required" => "Alat ARTG Wajib diisi!",
            ]
        );

        $tambah_alat = array_merge($request->tambah_alat_ccr, $request->tambah_alat_artg);
        
        $detail_id = 0;

        $id_rcn = $request->rcnNo;
        $get_rcn_detail = $this->RBaru->getDetail($id_rcn);

        foreach ($get_rcn_detail as $item) {
            
            foreach ($tambah_alat as $alat) {
                $dataAlat = explode(',', $alat);
                $seq_id = $detail_id + 1;
                $dataInputAlat = [
                    'seq_id'    => $seq_id,
                    'detail_id' => $item->detail_id,
                    'kd_alat' => $dataAlat[0],
                    'nama_alat' => $dataAlat[1],
                    'waktu_mulai' => $item->waktu_mulai,
                    'waktu_selesai' => $item->waktu_selesai,
                    'rcn_no' => $request->rcnNo,
                ];

                $detail_id++;
                $this->RBaru->insertRcnAlat($dataInputAlat);
            }
        }
        

        $data = [
            'menus' => $this->MenuModel->getMenus(),
            'submenus' => $this->MenuModel->getSubmenus(),
            'rencana' => $this->RBaru->get_rencanaById($id_rencana),
            'alat' => $this->AlatModel->getDataAlat(),
            'alat_ccr'    => $this->AlatModel->getDataCraine(),
            'detail_alat' => $this->RBaru->getAlatlByRcn($rcn_no),

        ];

        if($data) {
            return redirect('/rencana-kapal/'.$id_rencana.'/'.$rcn_no);
        } else {
            return redirect('/rencana-baru')->with('toast_error', 'Gagal tambah alat!');
        }

    }


    function insert_vassel()
    {
        $data = [
            'menus' => $this->MenuModel->getMenus(),
            'submenus' => $this->MenuModel->getSubmenus(),
            'alat' => $this->AlatModel->get_alat(),
        ];

        return view('admin.perencanaan.tambah_rencana', $data);

    }

    function edit_rencana($id_rencana)
    {
        $data = [
            'menus' => $this->MenuModel->getMenus(),
            'submenus' => $this->MenuModel->getSubmenus(),
            'rencana' => $this->RBaru->get_rencanaById($id_rencana),
            'alat' => $this->AlatModel->getDataAlat(),
            'alat_ccr'    => $this->AlatModel->getDataCraine(),
            'alat_artg'    => $this->AlatModel->getDataArtg(),
        ];

        return view('admin.perencanaan.edit_rencana', $data);
    }

    function update_alat_rcn(Request $request, $id_rencana, $rcn_no)
    {
        $request->validate(
            [
                "edit_alat_ccr" => "required",
                "edit_alat_artg" => "required",
            ],
            [
                "edit_alat_ccr.required" => "Alat CCR Wajib diisi!",
                "edit_alat_artg.required" => "Alat ARTG Wajib diisi!",
            ]
        );

        $update_alat = array_merge($request->edit_alat_ccr, $request->edit_alat_artg);
        
        $detail_id = 0;
        $last_rcn_no = null; // Menyimpan rcn_no terakhir
        $seq_id = 1; // Inisialisasi seq_id

        $id_rcn = $request->rcnNo;
        $get_rcn_detail = $this->RBaru->getDetail($id_rcn);

        foreach ($get_rcn_detail as $item) {
            
            foreach ($update_alat as $alat) {
                $dataAlat = explode(',', $alat);

                if ($item->rcn_no != $last_rcn_no) {
                    $seq_id = 1; // Reset seq_id ke 1 jika rcn_no berbeda
                }
                // $seq_id = $detail_id + 1;
                $dataInputAlat = [
                    'seq_id'    => $seq_id,
                    'detail_id' => $item->detail_id,
                    'kd_alat' => $dataAlat[0],
                    'nama_alat' => $dataAlat[1],
                    'waktu_mulai' => $item->waktu_mulai,
                    'waktu_selesai' => $item->waktu_selesai,
                    'rcn_no' => $request->rcnNo,
                ];

                $this->RBaru->insertRcnAlat($dataInputAlat);
    
                $last_rcn_no = $item->rcn_no;
    
                $seq_id++;
            }
        }
        

        $data = [
            'menus' => $this->MenuModel->getMenus(),
            'submenus' => $this->MenuModel->getSubmenus(),
            'rencana' => $this->RBaru->get_rencanaById($id_rencana),
            'alat' => $this->AlatModel->getDataAlat(),
            'alat_ccr'    => $this->AlatModel->getDataCraine(),
            'detail_alat' => $this->RBaru->getAlatlByRcn($rcn_no),

        ];

        if($data) {
            return redirect('/rencana-kapal/'.$id_rencana.'/'.$rcn_no);
        } else {
            return redirect('/rencana-kapal')->with('toast_error', 'Gagal tambah alat!');
        }
    }

    function view_detail_rencana($id_rencana, $rcn_no)
    {
        $data = [
            'menus' => $this->MenuModel->getMenus(),
            'submenus' => $this->MenuModel->getSubmenus(),
            'rencana' => $this->RBaru->get_rencanaById($id_rencana),
            // 'rencana' => $this->RBaru->getRencanaBaruLimit(),
            'detail_rcn' => $this->RBaru->getDetailByRcn($rcn_no),
            // 'detail_rcn_toAlat' => $this->RBaru->getDetailByRcn_ToAlat($no_rcn, $id_rencana),
            'alat_ccr'    => $this->AlatModel->getDataCraine(),
            'alat_artg'    => $this->AlatModel->getDataArtg(),
            'detail_alat' => $this->RBaru->getAlatlByRcn($rcn_no),
            // 'detail_alat' => $this->RBaru->getAlatlByRcnJson(),
        ];

        return view('admin.perencanaan.edit_detail_rencana', $data);
    }

    function get_jason_detail($rcn_no, $detail_id) {
        $data = [
            'menus' => $this->MenuModel->getMenus(),
            'submenus' => $this->MenuModel->getSubmenus(),
            'rencana' => $this->RBaru->getRencanaBaruLimit(),
            'detail_rcn' => $this->RBaru->getDetailByRcn($rcn_no),

            'detail_alat' => $this->RBaru->getAlatlByRcnJson($rcn_no, $detail_id),
        ];

        return view('admin.perencanaan.edit_detail_rencana', $data);
    }

    public function delete_rcnalat($rcn_no, $seq_id)
    {
        $this->RBaru->delete_RcnAlat($rcn_no, $seq_id);
        return redirect('rencana-kapal/'.$rcn_no. '/1' )->withSuccess('Berhasil Hapus Alat');
    }

    // function view_detail($id_rencana)
    // {
    //     $data = [
    //         'menus' => $this->MenuModel->getMenus(),
    //         'submenus' => $this->MenuModel->getSubmenus(),
    //         'rencana' => $this->RBaru->get_rencanaById($id_rencana),

    //     ];

    //     return view('admin.perencanaan.jason_detail', $data);
    // }
}
