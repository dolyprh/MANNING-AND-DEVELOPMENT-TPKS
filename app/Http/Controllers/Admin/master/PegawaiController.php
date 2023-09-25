<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuModel;
use App\Models\PegawaiModel;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    function __construct()
    {
        $this->MenuModel = new MenuModel();
        $this->PegawaiModel = new PegawaiModel();   
    }

    public function index()
    {
        $data = [
            'menus'    => $this->MenuModel->getMenus(),
            'submenus' => $this->MenuModel->getSubmenus(),
            'pegawai'     => $this->PegawaiModel->get_pegawai(),  
        ];

        

        return view('admin/master/pegawai', $data);
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
            'nama'     => $request->input('nama'),
            'nipp'  => $request->input('nipp'),
            'status'   => $request->input('status'),
            'email_address'   => $request->input('email_address'),
            'keterangan'   => $request->input('keterangan'),
            'type'   => $request->input('type'),
            'phone'   => $request->input('phone'),
            'kd_cabang'   => $request->input('kd_cabang'),
            'kd_terminal'   => $request->input('kd_terminal'),
            'kd_regional'   => $request->input('kd_regional'),
            'jobdesk'   => $request->input('jobdesk'),
            'group_id'   => $request->input('group_id'),
            'created_at' => \Carbon\Carbon::now(),
        ];

        if ($this->PegawaiModel->insert_pegawai($data)) {
            // return redirect('/menu')->with('toast_success', 'Berhasil Tambah Menu!');
            return redirect('/pegawai')->withSuccess('Pegawai Berhasil ditambahkan');
        } else {
            return redirect('/pegawai')->with('toast_error', 'Gagal Tambah Pegawai!');

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
    public function destroy($id_pegawai)
    {
        $this->PegawaiModel->delete_pegawai($id_pegawai);
        return redirect('/pegawai')->withSuccess('Berhasil Hapus Pegawai');
    }
}
