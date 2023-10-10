<?php

namespace App\Http\Controllers\admin\perencanaan;

use App\Http\Controllers\Controller;
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
        $data = [
            'menus' => $this->MenuModel->getMenus(),
            'submenus'    => $this->MenuModel->getSubmenus(),
            'rencana' => $this->RBaru->get_rencanaBaru(),
            'rencana_kapal'    => $this->RBaru->get_kapal(),
        ];

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
        $data = [
                'ves_id' => $request->input('ves_id'),
                'ves_code' => $request->input('ves_code'),
                'nama_kapal' => $request->input('ves_name'),
                'pelayaran' => $request->input('pelayaran'),
                'in_voyage' => $request->input('in_voyage'),
                'out_voyage' => $request->input('out_voyage'),
                'kd_awal' => $request->input('kd_awal'),
                'kd_akhir' => $request->input('kd_akhir'),
                'rcn_sandar' => $request->input('rcn_sandar'),
                'rcn_berangkat' => $request->input('rcn_berangkat'),
                'rcn_awal_kerja' => $request->input('rcn_awal_kerja'),
                'rcn_akhir_kerja' => $request->input('rcn_akhir_kerja'),
                'kd_regional' => 9,
                'kd_cabang' => 40,
                'kd_terminal' => 40,
                'status' => 0,
                'created_at' => \Carbon\Carbon::now(),
                'rcn_no' => DB::raw("CONCAT(ves_id, DATE_FORMAT(created_at, '%d%m%Y'))")
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
    public function show($id_rencana)
    {
        $data = [
            'menus'    => $this->MenuModel->getMenus(),
            'submenus' => $this->MenuModel->getSubmenus(),
            'rencana'     => $this->RBaru->get_rencanaById($id_rencana),
            'alat'     => $this->AlatModel->get_alat(),
            'rencana' => $this->RBaru->get_rencanaBaru(),

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

    function view_rencana() {
        $data = [
            'menus' => $this->MenuModel->getMenus(),
            'submenus'    => $this->MenuModel->getSubmenus(),
            'rencana' => $this->RBaru->get_rencanaBaru(),
        ];

        return view('admin.perencanaan.tambah_rencana', $data);
    }

    function detail_rencana() {
        $data = [
            'menus'    => $this->MenuModel->getMenus(),
            'submenus' => $this->MenuModel->getSubmenus(),
        ];

        return view('admin.perencanaan.edit_detail_rencana', $data);
    }

    function insert_vassel() {
        $data = [
            'menus'    => $this->MenuModel->getMenus(),
            'submenus' => $this->MenuModel->getSubmenus(),
            'alat'     => $this->AlatModel->get_alat(),
        ];


        return view('admin.perencanaan.tambah_rencana', $data);

    }
}
