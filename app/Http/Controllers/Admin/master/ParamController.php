<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuModel;
use App\Models\ParamModel;

class ParamController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->MenuModel = new MenuModel();
        $this->ParamModel = new ParamModel();
    }

    public function index()
    {
        $data = [
            'menus' => $this->MenuModel->getMenus(),
            'submenus'    => $this->MenuModel->getSubmenus(),
            'param'    => $this->ParamModel->get_param(),
        ];

        return view('admin/master/parameter', $data);
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
                'kode_param'  => 'required',
                'keterangan' => 'required',
            ],
            [
                'kode_param.required'         => 'kode Parameter Tidak boleh kosong',
                'keterangan.required'          => 'keterangan Tidak Boleh Kosong',
            ]
        );

        $data = [
            'param_code'    => $request->input('kode_param'),
            'param_label'   => $request->input('keterangan'),
            'val1'          => $request->input('nilai1'),
            'val2'          => $request->input('nilai2'),
            'val3'          => $request->input('nilai3'),
            'created_at'    => \Carbon\Carbon::now(),
        ];

        if ($this->ParamModel->insert_param($data)) {
            // return redirect('/menu')->with('toast_success', 'Berhasil Tambah Menu!');
            return redirect('parameter')->withSuccess('Parameter Berhasil ditambahkan');
        } else {
            return redirect('parameter')->with('toast_error', 'Gagal Tambah Parameter!');

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
    public function destroy($id_param)
    {
        $this->ParamModel->delete_param($id_param);
        return redirect('parameter')->withSuccess('Berhasil Hapus Parameter');
    }
}
