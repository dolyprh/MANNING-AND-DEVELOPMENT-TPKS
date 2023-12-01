<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\MenuModel;
use App\Models\PegawaiModel;
use App\Models\User;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    function __construct()
    {
        $this->MenuModel = new MenuModel();
        $this->PegawaiModel = new PegawaiModel();   
        $this->User = new User();   
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
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama'  => 'required',
                'nipp' => 'required',
                'status' => 'required',
                'email_address' => 'required',
                'keterangan' => 'required',
                'type' => 'required',
                'phone' => 'required',
                'jobdesk' => 'required',
            ],
            [
                'nama.required'          => 'nama pegawai harus diisi',
                'nipp.required'          => 'nipp pegawai harus diisi',
                'status.required'        => 'status pegawai harus diisi',
                'email_address.required' => 'email_address pegawai harus diisi',
                'keterangan.required'    => 'keterangan harus diisi',
                'type.required'          => 'type harus diisi',
                'phone.required'         => 'phone harus diisi',
                'jobdesk.required'       => 'jobdesk harus diisi',
            ]
        );

        $data = [
            'nama'     => $request->input('nama'),
            'nipp'  => $request->input('nipp'),
            'status'   => $request->input('status'),
            'email_address'   => $request->input('email_address'),
            'keterangan'   => $request->input('keterangan'),
            'type'   => $request->input('type'),
            'phone'   => $request->input('phone'),
            'kd_cabang'   => $request->input('kode_cabang'),
            'kd_terminal'   => $request->input('kode_terminal'),
            'kd_regional'   => $request->input('kode_regional'),
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
    public function show($id_pegawai)
    {
        $data = [
            'menus'    => $this->MenuModel->getMenus(),
            'submenus' => $this->MenuModel->getSubmenus(),
            'pegawai'     => $this->PegawaiModel->get_pegawaiById($id_pegawai),  
        ];

        return view('admin.master.detail_pegawai', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_pegawai)
    {
        $data = [
            'menus'    => $this->MenuModel->getMenus(),
            'submenus' => $this->MenuModel->getSubmenus(),
            'pegawai'     => $this->PegawaiModel->get_pegawaiById($id_pegawai),  
        ];

        return view('admin.master.edit.pegawai_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_pegawai)
    {
        $request->validate(
            [
                'nama'  => 'required',
                'nipp' => 'required',
                'status' => 'required',
                'email_address' => 'required',
                'keterangan' => 'required',
                'type' => 'required',
                'phone' => 'required',
                'jobdesk' => 'required',
            ],
            [
                'nama.required'          => 'nama pegawai harus diisi',
                'nipp.required'          => 'nipp pegawai harus diisi',
                'status.required'        => 'status pegawai harus diisi',
                'email_address.required' => 'email_address pegawai harus diisi',
                'keterangan.required'    => 'keterangan harus diisi',
                'type.required'          => 'type harus diisi',
                'phone.required'         => 'phone harus diisi',
                'jobdesk.required'       => 'jobdesk harus diisi',
            ]
        );

        $data = [
            'nama'     => $request->input('nama'),
            'nipp'  => $request->input('nipp'),
            'status'   => $request->input('status'),
            'email_address'   => $request->input('email_address'),
            'keterangan'   => $request->input('keterangan'),
            'type'   => $request->input('type'),
            'phone'   => $request->input('phone'),
            'kd_cabang'   => $request->input('kode_cabang'),
            'kd_terminal'   => $request->input('kode_terminal'),
            'kd_regional'   => $request->input('kode_regional'),
            'jobdesk'   => $request->input('jobdesk'),
            'group_id'   => $request->input('group_id'),
            'created_at' => \Carbon\Carbon::now(),
        ];

        if ($this->PegawaiModel->update_pegawai($data, $id_pegawai)) {
            // return redirect('/menu')->with('toast_success', 'Berhasil Tambah Menu!');
            return redirect('/pegawai')->with('toast_success','Berhasil Update Pegawai');
        } else {
            return redirect('/pegawai')->with('toast_error', 'Gagal Update Pegawai!');

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_pegawai)
    {
        $this->PegawaiModel->delete_pegawai($id_pegawai);
        return redirect('/pegawai')->withSuccess('Berhasil Hapus Pegawai');
    }

    function view_akses($id_pegawai) {
        $data = [
            'menus'    => $this->MenuModel->getMenus(),
            'submenus' => $this->MenuModel->getSubmenus(),
            'akses'     => $this->PegawaiModel->get_pegawaiById($id_pegawai),  
        ];

        return view('admin.master.edit.tambah_akses', $data);
    }

    function create_akses(Request $request, $id_pegawai) {
        $data = [
            'name'     => $request->input('nama'),
            'nipp'     => $request->input('nipp'),
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
            'role'     => $request->input('role')
        ];

        if ($this->User->insert_akses($data, $id_pegawai)) {
            // return redirect('/menu')->with('toast_success', 'Berhasil Tambah Menu!');
            return redirect('/hak-akses')->with('toast_success','Berhasil Tambah Hak Akses');
        } else {
            return redirect('/hak-akses')->with('toast_error', 'Tambah Hak Akses!');

        }

        return view('admin.master.hak_akses', $data);
    }
}
