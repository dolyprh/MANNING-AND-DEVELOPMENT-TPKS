<?php

namespace App\Http\Controllers\admin\spk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuModel;

class RiwayatSpkController extends Controller
{

    public function __construct()
    {
        $this->MenuModel = new MenuModel();
    }

    public function riwayat_spk() {
        $data = [
            'menus' => $this->MenuModel->getMenus(),
            'submenus'    => $this->MenuModel->getSubmenus(),
        ];

        return view('admin/spk/riwayat_spk', $data);
    }
}
