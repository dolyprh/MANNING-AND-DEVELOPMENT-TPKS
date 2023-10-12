<?php

namespace App\Http\Controllers\admin\perencanaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuModel;
use App\Models\ShiftModel;
use App\Models\GroupModel;
use App\Models\JGroupModel;

class JadwalGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->MenuModel = new MenuModel();
        $this->ShiftModel = new ShiftModel();
        $this->GroupModel = new GroupModel();
        $this->JGroupModel = new JGroupModel();
    }

    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $data = [
            'menus'     => $this->MenuModel->getMenus(),
            'submenus'  => $this->MenuModel->getSubmenus(),
            'shift'     => $this->ShiftModel->get_shift(),
            'group'     => $this->GroupModel->get_group(),  
            'jadwal_bytahun'     => $this->JGroupModel->get_jadwalByYear(),
            'jadwal_group'     => $this->JGroupModel->get_jgroupById($keyword), 
            'old_selected'     => $keyword,   

        ];

        return view('admin/perencanaan/jadwal_group', $data);
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;

        $data = [
            'menus'            => $this->MenuModel->getMenus(),
            'submenus'         => $this->MenuModel->getSubmenus(),
            'shift'            => $this->ShiftModel->get_shift(),
            'group'            => $this->GroupModel->get_group(), 
            'jadwal_bytahun'     => $this->JGroupModel->get_jadwalByYear(), 
            'jadwal_group'     => $this->JGroupModel->get_jgroupById($keyword),
            'old_selected'     => $keyword,  
        ];

        return view('admin/perencanaan/jadwal_group', $data);
    }

    public function search_year(Request $request)
    {
        $keyword = $request->keyword_year;

        $data = [
            'menus'            => $this->MenuModel->getMenus(),
            'submenus'         => $this->MenuModel->getSubmenus(),
            'shift'            => $this->ShiftModel->get_shift(),
            'group'            => $this->GroupModel->get_group(),  
            'jadwal_bytahun'     => $this->JGroupModel->get_jadwalByYear(),
            'jadwal_group'     => $this->JGroupModel->get_jgroupByYear($keyword),
            'old_selected'     => $keyword,  
        ];

        return view('admin/perencanaan/jadwal_group', $data);
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
                'jadwal_tanggal'  => 'required',
                'jadwal_group' => 'required|integer',
                'jadwal_shift' => 'required|integer',
            ],
            [
                'jadwal_tanggal.required'          => 'tanggal harus diisi',
                'jadwal_group.required'          => 'group harus diisi',
                'jadwal_shift.required'        => 'shift harus diisi',
                'jadwal_group.integer'          => 'group harus diisi',
                'jadwal_shift.integer'        => 'shift harus diisi',
            ]
        );

        $data = [
            'tanggal'     => $request->input('jadwal_tanggal'),
            'id_group'  => $request->input('jadwal_group'),
            'id_shift'   => $request->input('jadwal_shift'),
        ];

        if ($this->JGroupModel->insert_jadwal_group($data)) {
            return redirect('/jadwal-group')->withSuccess('Jadwal Group Berhasil ditambahkan');
        } else {
            return redirect('/jadwal-group')->with('toast_error', 'Gagal Tambah Jadwal Group!');

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
    public function destroy($id_jgroup)
    {
        $this->JGroupModel->delete_jgroup($id_jgroup);
        return redirect('jadwal-group')->withSuccess('Berhasil Hapus Jadwal Group');
    }
}
