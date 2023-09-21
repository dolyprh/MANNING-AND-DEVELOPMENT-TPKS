<?php

namespace App\Http\Controllers\admin\fooding;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuModel;

class JTanpaMakanController extends Controller
{
    public function __construct()
    {
        $this->MenuModel = new MenuModel();
    }

    public function jadwal_tanpa_makan() {
        $data = [
            'menus' => $this->MenuModel->getMenus(),
            'submenus'    => $this->MenuModel->getSubmenus(),
        ];

        return view('admin/fooding/jadwal_tanpa_makan', $data);
    }
}
