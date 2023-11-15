<?php

namespace App\Http\Controllers\admin\spk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuModel;
use App\Models\spk\spk_baru;
use App\Models\AlatModel;
use App\Models\AbsenModel;

class SpkController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->MenuModel = new MenuModel();
        $this->SpkModel = new spk_baru();
        $this->AlatModel = new AlatModel();
        $this->AbsenModel = new AbsenModel();
    }

    public function index(Request $request)
    {
        $tanggal = $request->input('tanggal_spk');

        $data = [
            'menus' => $this->MenuModel->getMenus(),
            'submenus'      => $this->MenuModel->getSubmenus(),
            'spk'           => $this->SpkModel->getRcnHeaderByDate($tanggal),
            'shift'         => $this->SpkModel->getJGroup($tanggal),
            // 'tspk_header'   => $this->SpkModel->get_tspk_header($tanggal),
        ];

        // dd($data);
        return view('admin.spk.spk_baru', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tanggal = $request->input('tanggal_spk');

        $data = [
            'menus' => $this->MenuModel->getMenus(),
            'submenus'  => $this->MenuModel->getSubmenus(),
            'spk'       => $this->SpkModel->getRcnHeaderByDate($tanggal),
            'shift'     => $this->SpkModel->getJGroup($tanggal),
            // 'tspk_header'   => $this->SpkModel->get_tspk_header($tanggal),
            'old_date'  => $tanggal,
        ];

        // dd($data);
        return view('admin.spk.spk_baru', $data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $tspk_header = $this->SpkModel->getJGroup_ById($id);
        $id_shift = $tspk_header[0]->no_shift;

        if ($tspk_header && $tspk_header->isNotEmpty()) {
            $firstItem = $tspk_header->first();
            if ($firstItem && property_exists($firstItem, 'tanggal')) {
                $tanggal = date('Y-m-d', strtotime($firstItem->tanggal));
            }
        }

        foreach($tspk_header as $item) {
            $shift = $item->no_shift;
            $group = $item->kode;
            $spkno = 'SPK-' . substr(date('Y'), -2) . date('md-') . 'S'.$shift. 'G'.$group ;
            $data_header = [
                'id_h'           => $id,
                'spk_no'       => $spkno,
                'id_shift'     => $item->no_shift,
                'nama_shift'   => $item->nama_shift,
                'nama_group'   => $item->kode,
                'created_date' => \Carbon\Carbon::now() 
            ];

            $this->SpkModel->insert_tspk_header($data_header);
        }

        $data = [
            'menus'         => $this->MenuModel->getMenus(),
            'submenus'      => $this->MenuModel->getSubmenus(),
            'group_shift'   => $this->SpkModel->getJGroup_ById($id),
            // 'pegawai_alat'   => $this->SpkModel->getOperatorCC_ByAlat($jobdesk),
            'operator_cc'   => $this->SpkModel->getOperatorCC_ByGroup($id),
            'operator_rtg'  => $this->SpkModel->getOperatorRTG_ByGroup($id),
            'alat_cc'       => $this->AlatModel->getDataCraine(),
            'alat_rtg'       => $this->AlatModel->getDataArtg(),
            'jenis_absen'   => $this->AbsenModel->get_absen(),
            'detail_rcn'    => $this->SpkModel->getTanggal_ByRcnDetail($tanggal, $id_shift),
            'id_group'      => $id,
        ];
        

        // dd($data);
        return view('admin.spk.spk_detail', $data);
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

    public function insert_alat_operator(Request $request, $tanggal) {

        // $tambah_alat = $request->tambah_alat_cc;
        
        $id_header = $this->SpkModel->get_headerById();
        $detail_id = 0;
        $id_operator = $request->id_group;
        $get_operator_cc = $this->SpkModel->getOperatorCC_ByGroup($id_operator);
        $get_operator_rtg = $this->SpkModel->getOperatorRTG_ByGroup($id_operator);
        // $get_operator_byId = $this->SpkModel->getOperator_ByShiftGroup($id_operator);

        foreach ($get_operator_cc as $operator) {
            foreach ($request['tambah_alat_cc_'. $operator->id] as $alat ) {
                $dataAlat = explode(',', $alat);
                $seq_id = $detail_id + 1;
                $dataOperator = [
                    'id_h'      => $id_header[0]->id_h,
                    'seq_id'    => $seq_id,
                    'nipp'    => $operator->nipp,
                    'nama'    => $operator->nama,
                    'kode_alat' => $dataAlat[1],
                    'nama_alat' => $dataAlat[2],
                    'waktu_mulai' => $request['waktu_mulai'. $operator->id],
                    'waktu_selesai' => $request['waktu_selesai'. $operator->id],
                    'nama_kapal' => $request['vesid'. $operator->id],
                ];
                
                $dataAbsen = [
                    'id_h'      => $id_header[0]->id_h,
                    'seq_id'    => $seq_id,
                    'nipp'    => $operator->nipp,
                    'nama'    => $operator->nama,
                    'jobdesk'    => $operator->jobdesk,
                    'status' => $request['status_absen'. $operator->id],
                ];

                $detail_id++;
                $this->SpkModel->insert_tpsk_operatorcc($dataOperator);
                $this->SpkModel->insert_tpsk_operatorabsen($dataAbsen);
            } 
            $detail_id = 0;
        }

        foreach ($get_operator_rtg as $operator) {
            foreach ($request['tambah_alat_rtg_'. $operator->id] as $alat_rtg ) {
                $dataAlat = explode(',', $alat_rtg);
                $seq_id = $detail_id + 1;
                $dataOperator = [
                    'id_h'      => $id_header[0]->id_h,
                    'seq_id'    => $seq_id,
                    'nipp'    => $operator->nipp,
                    'nama'    => $operator->nama,
                    'kode_alat' => $dataAlat[1],
                    'nama_alat' => $dataAlat[2],
                    'waktu_mulai' => $request['waktu_mulai'. $operator->id],
                    'waktu_selesai' => $request['waktu_selesai'. $operator->id],
                    'nama_kapal' => $request['vesid'. $operator->id],
                ];
                
                $dataAbsen = [
                    'id_h'      => $id_header[0]->id_h,
                    'seq_id'    => $seq_id,
                    'nipp'    => $operator->nipp,
                    'nama'    => $operator->nama,
                    'jobdesk'    => $operator->jobdesk,
                    'status' => $request['status_absen'. $operator->id],
                ];

                $detail_id++;
                $this->SpkModel->insert_tpsk_operatorcc($dataOperator);
                $this->SpkModel->insert_tpsk_operatorabsen($dataAbsen);
            } 
            $detail_id = 0;
        }

        return redirect('spk-baru');
    }

    public function get_report() {
        $data = [
            'menus' => $this->MenuModel->getMenus(),
            'submenus'    => $this->MenuModel->getSubmenus(),
        ];

        return view('admin/spk/spk_report', $data);
    }

}
