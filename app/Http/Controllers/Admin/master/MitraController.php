<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuModel;
use App\Models\MKerjaModel;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->MenuModel = new MenuModel();
        $this->MitraModel = new MKerjaModel();
    }

    public function index()
    {
        $data = [
            'menus' => $this->MenuModel->getMenus(),
            'submenus'    => $this->MenuModel->getSubmenus(),
            'mitra'    => $this->MitraModel->get_mitra(),
        ];

        return view('admin/master/mitra_kerja', $data);
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
        $request->validate(
            [
                'jenis_mitra' => 'required',
                'nama_perusahaan'         => 'required',
            ],
            [
                'jenis_mitra.required'    => 'jenis mitra tidak boleh kosong',
                'nama_perusahaan.required'            => 'nama tidak boleh kosong',
            ]
        );

        $data = [
            'jenis_mitra'              => $request->input('jenis_mitra'),
            'nama_perusahaan' => $request->input('nama_perusahaan'),
            'created_at'        => \Carbon\Carbon::now(),
        ];

        if ($this->MitraModel->insert_mitra($data)) {
            // return redirect('/menu')->with('toast_success', 'Berhasil Tambah Menu!');
            return redirect('/mitra-kerja')->withSuccess('Mitra Kerja Berhasil ditambahkan');
        } else {
            return redirect('/mitra-kerja')->with('toast_error', 'Gagal Tambah Mitra Kerja!');

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
    public function edit($id_mitra)
    {
        $data = [
            'menus'    => $this->MenuModel->getMenus(),
            'submenus' => $this->MenuModel->getSubmenus(),
            'mitra'     => $this->MitraModel->get_mitraById($id_mitra),  
        ];

        return view('admin.master.edit.mitra_kerja_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_mitra)
    {
        $request->validate(
            [
                'jenis_mitra' => 'required',
                'nama_perusahaan'         => 'required',
            ],
            [
                'jenis_mitra.required'    => 'jenis mitra tidak boleh kosong',
                'nama_perusahaan.required'            => 'nama tidak boleh kosong',
            ]
        );

        $data = [
            'jenis_mitra'              => $request->input('jenis_mitra'),
            'nama_perusahaan' => $request->input('nama_perusahaan'),
            'created_at'        => \Carbon\Carbon::now(),
        ];

        if ($this->MitraModel->update_mitra($data, $id_mitra)) {
            return redirect('/mitra-kerja')->with('toast_success', 'Mitra Kerja Berhasil di Update');
        } else {
            return redirect('/mitra-kerja')->with('toast_error', 'Gagal Update Mitra Kerja!');

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_mitra)
    {
        $this->MitraModel->delete_mitra($id_mitra);
        return redirect('/mitra-kerja')->withSuccess('Berhasil Hapus Mitra Kerja');
    }
}
