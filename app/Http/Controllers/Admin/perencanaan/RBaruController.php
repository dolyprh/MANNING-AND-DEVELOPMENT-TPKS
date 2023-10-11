<?php

namespace App\Http\Controllers\admin\perencanaan;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MenuModel;
use App\Models\perencanaan\RBaru;
use App\Models\AlatModel;
use App\Models\perencanaan\RcnHeader;


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
        $id = $request->valey;
        $kapal = $this->RBaru->get_kapalById($id);

        $data = [
            'ves_id' => $id,
            'ves_code' => $kapal[0]->ves_code,
            'nama_kapal' => $kapal[0]->ves_name,
            'pelayaran' => $kapal[0]->pelayaran,
            'in_voyage' => $kapal[0]->in_voyage,
            'out_voyage' => $kapal[0]->out_voyage,
            'kd_awal' => $kapal[0]->kd_awal,
            'kd_akhir' => $kapal[0]->kd_akhir,
            'rcn_sandar' => $kapal[0]->rcn_sandar,
            'rcn_berangkat' => $kapal[0]->rcn_berangkat,
            'rcn_awal_kerja' => $kapal[0]->rcn_awal_kerja,
            'rcn_akhir_kerja' => $kapal[0]->rcn_akhir_kerja,
            'kd_regional' => 9,
            'kd_cabang' => 40,
            'kd_terminal' => 40,
            'status' => 0,
            'created_at' => \Carbon\Carbon::now(),
            'rcn_no' => DB::raw("CONCAT('RCN-',ves_id, DATE_FORMAT(created_at, '%d%m%Y'))")
        ];

        if ($this->RBaru->insert_rcn_header($data)) {
            return redirect('/rencana-baru/detail')->withSuccess('Jadwal Group Berhasil ditambahkan');
        } else {
            return redirect('/rencana-baru')->with('toast_error', 'Gagal Tambah Jadwal Group!');

        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $data = [
            'menus' => $this->MenuModel->getMenus(),
            'submenus' => $this->MenuModel->getSubmenus(),
            'alat' => $this->AlatModel->getDataAlat(),
            'rencana' => $this->RBaru->getRencanaBaruLimit(),

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
    public function destroy(string $id)
    {
        //
    }

    // function view_rencana()
    // {
    //     $data = [
    //         'menus' => $this->MenuModel->getMenus(),
    //         'submenus' => $this->MenuModel->getSubmenus(),
    //         'rencana' => $this->RBaru->get_rencanaBaru(),
    //     ];

    //     return view('admin.perencanaan.tambah_rencana', $data);
    // }


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
        ];

        return view('admin.perencanaan.edit_rencana', $data);
    }

    function update_rencana()
    {
        $data = [
            'menus' => $this->MenuModel->getMenus(),
            'submenus' => $this->MenuModel->getSubmenus(),
            'rencana' => $this->RBaru->get_rencanaById($id_rencana),
            'alat' => $this->AlatModel->getDataAlat(),
            'rencana' => $this->RBaru->getRencanaBaruLimit(),

        ];

        return view('admin.perencanaan.edit_detail_rencana', $data);
    }

    function detail_rencana(Request $request, $id_rencana)
    {
        $request->validate(
            [
                "edit_alat" => "required"
            ],
            [
                "edit_alat.required" => "Isi Alat!"
            ]
        );
        $date = Carbon::now()->timezone('Asia/Jakarta')->format('H');
        $idShift = 0;
        if ($date >= '00' && $date <= '08') {
            $idShift = 3;
        } else if ($date >= '08' && $date <= '16') {
            $idShift = 1;
        } else {
            $idShift = 2;
        }
        $idDetail = 1;
        $dataIdDetail = $this->RBaru->checkRcnNoInDetail($request->rcnNo);
        if (count($dataIdDetail) != 0) {
            $idDetail = $dataIdDetail[0]->detail_id + 1;
        }
        $dataDetail = [
            "detail_id" => $idDetail,
            "rcn_no" => $request->rcnNo,
            "id_shift" => $idShift,
            'waktu_mulai' => $request->waktuAwal,
            'waktu_selesai' => $request->waktuAkhir,
            "nama_shift" => "SHIFT $idShift",
            "ves_id" => $request->vesId
        ];
        $this->RBaru->InsertRcnDetail($dataDetail);
        foreach ($request->edit_alat as $alat) {
            $dataAlat = explode(',', $alat);
            $dataInputAlat = [
                'detail_id' => $idDetail,
                'kd_alat' => $dataAlat[0],
                'nama_alat' => $dataAlat[1],
                'waktu_mulai' => $request->waktuAwal,
                'waktu_selesai' => $request->waktuAkhir,
                'rcn_no' => $request->rcnNo,
            ];
            $this->RBaru->insertRcnAlat($dataInputAlat);
        }
        $data = [
            'menus' => $this->MenuModel->getMenus(),
            'submenus' => $this->MenuModel->getSubmenus(),
            'rencana' => $this->RBaru->get_rencanaById($id_rencana),
            'alat' => $this->AlatModel->getDataAlat(),
        ];

//        return $request->edit_alat;
//        return $dataDetail;
        return view('admin.perencanaan.edit_detail_rencana', $data);
    }
}
