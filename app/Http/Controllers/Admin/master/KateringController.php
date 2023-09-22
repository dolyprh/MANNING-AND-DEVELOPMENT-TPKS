<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuModel;
use App\Models\KateringModel;

class KateringController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
        $this->MenuModel = new MenuModel();
        $this->KaterModel = new KateringModel();   
    }

    public function index()
    {
        $data = [
            'menus' => $this->MenuModel->getMenus(),
            'submenus'    => $this->MenuModel->getSubmenus(),
            'katering'    => $this->KaterModel->get_katering(),
        ];

        return view('admin/master/katering', $data);
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
                'nama_katering' => 'required',
                'phone'         => 'required',
                'email_vendor'  => 'required',
            ],
            [
                'nama_katering.required'    => 'nama tidak boleh kosong',
                'phone.required'            => 'nomor tidak boleh kosong',
                'email_vendor.required'     => 'email tidak boleh kosong',
            ]
        );

        $data = [
            'nama'              => $request->input('nama_katering'),
            'email_vendor_food' => $request->input('email_vendor'),
            'kode_cabang'       => $request->input('kode_cabang'),
            'kode_terminal'     => $request->input('kode_terminal'),
            'kode_regional'     => $request->input('kode_regional'),
            'phone'             => $request->input('phone'),
            'created_at'        => \Carbon\Carbon::now(),
        ];

        if ($this->KaterModel->insert_katering($data)) {
            // return redirect('/menu')->with('toast_success', 'Berhasil Tambah Menu!');
            return redirect('katering')->withSuccess('katering Berhasil ditambahkan');
        } else {
            return redirect('katering')->with('toast_error', 'Gagal Tambah katering!');

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
    public function destroy($id_kater)
    {
        $this->KaterModel->delete_katering($id_kater);
        return redirect('katering')->withSuccess('Berhasil Hapus Katering');
    }
}
