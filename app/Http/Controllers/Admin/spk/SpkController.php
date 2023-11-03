<?php

namespace App\Http\Controllers\admin\spk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuModel;
use App\Models\spk\spk_baru;

class SpkController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->MenuModel = new MenuModel();
        $this->SpkModel = new spk_baru();
    }

    public function index(Request $request)
    {
        $tanggal = $request->input('tanggal_spk');

        $data = [
            'menus' => $this->MenuModel->getMenus(),
            'submenus'    => $this->MenuModel->getSubmenus(),
            'spk'       => $this->SpkModel->getRcnHeaderByDate($tanggal),
            'shift'     => $this->SpkModel->getJGroup($tanggal),
        ];

        return view('admin.spk.spk_baru', $data);
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
        $tanggal = $request->input('tanggal_spk');

        $data = [
            'menus' => $this->MenuModel->getMenus(),
            'submenus'  => $this->MenuModel->getSubmenus(),
            'spk'       => $this->SpkModel->getRcnHeaderByDate($tanggal),
            'shift'     => $this->SpkModel->getJGroup($tanggal),
            'old_date'  => $tanggal,
        ];

        return view('admin.spk.spk_baru', $data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {

        $data = [
            'menus'         => $this->MenuModel->getMenus(),
            'submenus'      => $this->MenuModel->getSubmenus(),
            'group_shift'   => $this->SpkModel->getJGroup_ById($id),
            'operator_cc'      => $this->SpkModel->getOperatorCC_ByGroup($id),
            'operator_rtg'     => $this->SpkModel->getOperatorRTG_ByGroup($id)
        ];

        return view('admin.spk.spk_detail', $data);

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

    // function view_detail($id) {
    //     $data = [
    //         'menus'         => $this->MenuModel->getMenus(),
    //         'submenus'      => $this->MenuModel->getSubmenus(),
    //         'group_shift'   => $this->SpkModel->getJGroup_ById($id)
    //     ];

    //     return view('admin.spk.spk_detail', $data);

    // }
}
