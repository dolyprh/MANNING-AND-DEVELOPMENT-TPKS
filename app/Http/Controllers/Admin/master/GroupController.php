<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuModel;
use App\Models\GroupModel;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    function __construct()
    {
        $this->MenuModel = new MenuModel();
        $this->GroupModel = new GroupModel();   
    }

    public function index()
    {
        $data = [
            'menus'    => $this->MenuModel->getMenus(),
            'submenus' => $this->MenuModel->getSubmenus(),
            'group'     => $this->GroupModel->get_group(),  
        ];

        return view('admin/master/group', $data);
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
                'nama_group' => 'required',
                'kode_group'         => 'required',
            ],
            [
                'nama_group.required'    => 'nama tidak boleh kosong',
                'kode_group.required'            => 'kode tidak boleh kosong',
            ]
        );

        $data = [
            'nama_group'              => $request->input('nama_group'),
            'kode' => $request->input('kode_group'),
            'created_at'        => \Carbon\Carbon::now(),
        ];

        if ($this->GroupModel->insert_group($data)) {
            // return redirect('/menu')->with('toast_success', 'Berhasil Tambah Menu!');
            return redirect('/group')->withSuccess('Group Berhasil ditambahkan');
        } else {
            return redirect('/group-')->with('toast_error', 'Gagal Tambah Group!');

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
    public function destroy($id_group)
    {
        $this->GroupModel->delete_group($id_group);
        return redirect('group')->withSuccess('Berhasil Hapus Group');
    }
}
