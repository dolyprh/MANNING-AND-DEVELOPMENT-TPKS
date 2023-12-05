<?php

namespace App\Http\Controllers\admin\spk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuModel;
use App\Models\spk\spk_baru;

class RiwayatSpkController extends Controller
{

    public function __construct()
    {
        $this->MenuModel = new MenuModel();
        $this->SpkModel = new spk_baru();
    }

    public function riwayat_spk() {
        $data = [
            'menus' => $this->MenuModel->getMenus(),
            'submenus'    => $this->MenuModel->getSubmenus(),
            'tspk_header' => $this->SpkModel->get_tspk_header(),
        ];

        return view('admin/spk/riwayat_spk', $data);
    }
}
