<?php

namespace App\Http\Controllers\Super_Intendent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\spk\spk_baru;
use PDF;

class Approve_SPKController extends Controller
{

    public function __construct()
    {
        $this->SpkModel = new spk_baru();
    }

    public function index()
    {
        $data = [
            'tspk_header' => $this->SpkModel->get_tspk_header()
        ];
        
        return view('superintendent.approval_spk', $data); 

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
        $tspk_header = $this->SpkModel->getJGroup_ById($id);

        if ($tspk_header && $tspk_header->isNotEmpty()) {
            $firstItem = $tspk_header->first();
            if ($firstItem && property_exists($firstItem, 'tanggal')) {
                $tanggal = date('Y-m-d', strtotime($firstItem->tanggal));
            }
        }

        $operator_alat = $this->SpkModel->get_operator_cc_ByGroup($id);

        $groupedOperators = [];

        foreach ($operator_alat as $operator) {
            $berthNo = $operator->berth_no;
            $namaAlat = $operator->nama_alat;
        
            // Cek apakah $berthNo sudah ada di dalam $groupedData
            $berthKey = array_search($berthNo, array_column($groupedOperators, 'berth_no'));
        
            // Jika belum ada, tambahkan dengan struktur baru
            if ($berthKey === false) {
                $groupedOperators[] = [
                    'berth_no' => $berthNo,
                    'detail' => [
                        [
                            'nama_alat' => $namaAlat,
                            'operators' => [
                                [
                                    'id_h' => $operator->id_h,
                                    'seq_id' => $operator->seq_id,
                                    'nipp' => $operator->nipp,
                                    'nama' => $operator->nama,
                                    'waktu_mulai' => $operator->waktu_mulai,
                                    'waktu_selesai' => $operator->waktu_selesai,
                                ]
                            ]
                        ]
                    ]
                ];
            } else {
                // Jika sudah ada, cek apakah $namaAlat sudah ada di dalam 'detail'
                $detailKey = array_search($namaAlat, array_column($groupedOperators[$berthKey]['detail'], 'nama_alat'));
        
                // Jika belum ada, tambahkan dengan struktur baru
                if ($detailKey === false) {
                    $groupedOperators[$berthKey]['detail'][] = [
                        'nama_alat' => $namaAlat,
                        'operators' => [
                            [
                                'id_h' => $operator->id_h,
                                'seq_id' => $operator->seq_id,
                                'nipp' => $operator->nipp,
                                'nama' => $operator->nama,
                                'waktu_mulai' => $operator->waktu_mulai,
                                'waktu_selesai' => $operator->waktu_selesai,
                            ]
                        ]
                    ];
                } else {
                    // Jika sudah ada, tambahkan operator ke dalam array 'operators'
                    $groupedOperators[$berthKey]['detail'][$detailKey]['operators'][] = [
                        'id_h' => $operator->id_h,
                        'seq_id' => $operator->seq_id,
                        'nipp' => $operator->nipp,
                        'nama' => $operator->nama,
                        'waktu_mulai' => $operator->waktu_mulai,
                        'waktu_selesai' => $operator->waktu_selesai,
                    ];
                }
            }
        }

        $data = [
            'group_shift' => $this->SpkModel->getJGroup_ById($id),
            'shift'     => $this->SpkModel->getJGroup_ByShift($tanggal, $id),
            'yard_planner'     => $this->SpkModel->get_ship_planner($id),
            'ship_planner'     => $this->SpkModel->get_yard_planner($id),
            'vessel_planner'     => $this->SpkModel->get_vessel_planner($id),
            'operator_alat'     => $groupedOperators,

        ];

        $pdf = PDF::loadView('admin.spk.spk_download', $data);
        $pdf->setPaper('A3', 'potrait');
        return $pdf->stream('spk.pdf');
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
    public function update(Request $request, $id)
    {
        $data_update = [
            'approve_tgl' => \Carbon\Carbon::now(),
            'created_nipp' =>  $request->input('created_nipp'),
            'status' => 3,
            'approve_nama'    =>$request->input('nama_approval'),
        ];

        if ($this->SpkModel->update_tspk_header($data_update, $id)) {
            return redirect('/surat-perintah-kerja')->with('toast_success', 'Status SPK Berhasil di Update');
        } else {
            return redirect('/surat-perintah-kerja')->with('toast_error', 'Gagal Update SPK!');

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
