<?php

namespace App\Http\Controllers\admin\perencanaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuModel;

class RencanaController extends Controller
{
    public function __construct()
    {
        $this->MenuModel = new MenuModel();
    }

    public function rencana_baru() {
        $data = [
            'menus' => $this->MenuModel->getMenus(),
            'submenus'    => $this->MenuModel->getSubmenus(),
        ];

        return view('admin/perencanaan/rencana_baru', $data);
    }
}
