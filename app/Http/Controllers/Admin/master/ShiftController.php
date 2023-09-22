<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuModel;
use App\Models\ShiftModel;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function __construct()
    {
        $this->MenuModel = new MenuModel();
        $this->ShiftModel = new ShiftModel();
    }

    public function index()
    {
        $data = [
            'menus'      => $this->MenuModel->getMenus(),
            'submenus'   => $this->MenuModel->getSubmenus(),
            'shift'      => $this->ShiftModel->get_shift(),
        ];

        return view('admin/master/shift', $data);
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
            'nama_shift'     => $request->input('nama_shift'),
            'waktu_mulai'  => $request->input('w_mulai'),
            'waktu_selesai'   => $request->input('w_selesai'),
            'mulai_istirahat'  => $request->input('m_istirahat'),
            'selesai_istirahat'   => $request->input('s_istirahat'),
            'kd_regional'  => $request->input('kode_regional'),
            'kd_cabang'    => $request->input('kode_cabang'),
            'kd_terminal'  => $request->input('kode_terminal'),
            'created_at' => \Carbon\Carbon::now(),
        ];

        if ($this->ShiftModel->insert_shift($data)) {
            // return redirect('/menu')->with('toast_success', 'Berhasil Tambah Menu!');
            return redirect('/shift')->withSuccess('Shift Berhasil ditambahkan');
        } else {
            return redirect('/shift')->with('toast_error', 'Gagal Tambah Shift!');

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function destroy($id_shift)
    {
        $this->ShiftModel->delete_shift($id_shift);
        return redirect('shift')->withSuccess('Berhasil hapus data shift');
    }
}
