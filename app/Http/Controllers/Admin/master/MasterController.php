<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\MenuModel;

class MasterController extends Controller
{
    public function __construct()
    {
        $this->MenuModel = new MenuModel();
    }

    public function pegawai_mitra() {
        $data = [
            'menus' => $this->MenuModel->getMenus(),
            'submenus'    => $this->MenuModel->getSubmenus(),
        ];

        return view('admin/master/pegawai_mitra', $data);
    }

    public function notifikasi() {
        $data = [
            'menus' => $this->MenuModel->getMenus(),
            'submenus'    => $this->MenuModel->getSubmenus(),
        ];

        return view('admin/master/notifikasi', $data);
    }
}
