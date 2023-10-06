<?php

namespace App\Http\Controllers\admin\perencanaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuModel;
use App\Models\perencanaan\RBaru;
use App\Models\AlatModel;

class RBaruController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->MenuModel = new MenuModel();
        $this->RBaru = new RBaru();
        $this->AlatModel = new AlatModel();
    }

    public function index()
    {
        $data = [
            'menus' => $this->MenuModel->getMenus(),
            'submenus'    => $this->MenuModel->getSubmenus(),
            'rencana' => $this->RBaru->get_rencanaBaru(),
            'status_rencana'    => $this->RBaru->get_kapal(),
        ];

        return view('admin/perencanaan/rencana_baru', $data);
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
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id_rencana)
    {
        $data = [
            'menus'    => $this->MenuModel->getMenus(),
            'submenus' => $this->MenuModel->getSubmenus(),
            'rencana'     => $this->RBaru->get_rencanaById($id_rencana),
            'alat'     => $this->AlatModel->get_alat(),
        ];

        return view('admin.perencanaan.edit_rencana', $data);
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

    function detail_rencana() {
        $data = [
            'menus'    => $this->MenuModel->getMenus(),
            'submenus' => $this->MenuModel->getSubmenus(),
        ];

        return view('admin.perencanaan.edit_detail_rencana', $data);
    }
}
