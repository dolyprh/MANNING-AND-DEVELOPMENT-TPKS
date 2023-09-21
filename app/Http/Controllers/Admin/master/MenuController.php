<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuModel;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->MenuModel = new MenuModel();
    }

    public function index()
    {
        $data = [
            'menus' => $this->MenuModel->getMenus(),
            'submenus'    => $this->MenuModel->getSubmenus(),
        ];

        return view('admin/master/menu', $data);
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
            'parent_id'     => $request->input('jenis_menu'),
            'nama_submenu'  => $request->input('nama_submenu'),
            'url_submenu'   => $request->input('url_submenu'),
            'created_at' => \Carbon\Carbon::now(),
        ];

        if ($this->MenuModel->insert_submenu($data)) {
            // return redirect('/menu')->with('toast_success', 'Berhasil Tambah Menu!');
            return redirect('/menu')->withSuccess('Menu Berhasil ditambahkan');
        } else {
            return redirect('/menu')->with('toast_error', 'Gagal Tambah Menu!');

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
    public function destroy($id_menu)
    {
        $this->MenuModel->delete_submenu($id_menu);
        return redirect('menu')->withSuccess('Berhasil Hapus Menu');
    }
}
