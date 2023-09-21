<?php

namespace App\Http\Controllers\admin\laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuModel;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->MenuModel = new MenuModel();
    }

    public function laporan() {
        $data = [
            'menus' => $this->MenuModel->getMenus(),
            'submenus'    => $this->MenuModel->getSubmenus(),
        ];

        return view('admin/laporan', $data);
    }
}
