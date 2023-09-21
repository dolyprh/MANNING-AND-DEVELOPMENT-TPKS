<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Models\AlatModel;
use App\Models\MenuModel;
use Illuminate\Http\Request;

class AlatController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    function __construct()
    {
        $this->MenuModel = new MenuModel();
        $this->AlatModel = new AlatModel();   
    }

    public function index()
    {
        $data = [
            'menus'    => $this->MenuModel->getMenus(),
            'submenus' => $this->MenuModel->getSubmenus(),
            'alat'     => $this->AlatModel->get_alat(),  
        ];

        return view('admin/master/alat', $data);
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
            'kode_alat'     => $request->input('kode_alat'),
            'nama_alat'  => $request->input('nama_alat'),
            'jenis_alat'   => $request->input('jenis_alat'),
            'keterangan'   => $request->input('keterangan'),
            'kd_regional'  => $request->input(''),
            'kd_cabang'    => $request->input(''),
            'kd_terminal'  => $request->input(''),
            'created_at' => \Carbon\Carbon::now(),
        ];

        if ($this->AlatModel->insert_alat($data)) {
            // return redirect('/menu')->with('toast_success', 'Berhasil Tambah Menu!');
            return redirect('/alat')->withSuccess('Alat Berhasil ditambahkan');
        } else {
            return redirect('/alat')->with('toast_error', 'Gagal Tambah Alat!');

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
    public function destroy(string $id)
    {
        //
    }
}