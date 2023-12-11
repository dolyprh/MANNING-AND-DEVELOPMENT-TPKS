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

        $data = [
            'group_shift' => $this->SpkModel->getJGroup_ById($id),
            'shift'     => $this->SpkModel->getJGroup($tanggal),
            'ship_planner'     => $this->SpkModel->get_ship_planner($id),

        ];

        $pdf = PDF::loadView('admin.spk.spk_download', $data);
        $pdf->setPaper('A4', 'potrait');
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
