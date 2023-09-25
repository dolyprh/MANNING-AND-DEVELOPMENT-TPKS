<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuModel;
use App\Models\AbsenModel;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->MenuModel = new MenuModel();
        $this->AbsenModel = new AbsenModel();
    }

    public function index()
    {
        $data = [
            'menus' => $this->MenuModel->getMenus(),
            'submenus'    => $this->MenuModel->getSubmenus(),
            'absen'    => $this->AbsenModel->get_absen(),
        ];

        return view('admin/master/jenis_absen', $data);
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
                'nama' => 'required',
                'jenis_absen'         => 'required',
            ],
            [
                'nama.required'    => 'nama tidak boleh kosong',
                'jenis_absen.required'            => 'kode tidak boleh kosong',
            ]
        );

        $data = [
            'nama'              => $request->input('nama'),
            'kode' => $request->input('jenis_absen'),
            'created_at'        => \Carbon\Carbon::now(),
        ];

        if ($this->AbsenModel->insert_absen($data)) {
            // return redirect('/menu')->with('toast_success', 'Berhasil Tambah Menu!');
            return redirect('/jenis-absen')->withSuccess('Absen Berhasil ditambahkan');
        } else {
            return redirect('/jenis-absen')->with('toast_error', 'Gagal Tambah Absen!');

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
    public function destroy($id_absen)
    {
        $this->AbsenModel->delete_absen($id_absen);
        return redirect('/jenis-absen')->withSuccess('Berhasil Hapus Jenis Absen');
    }
}
