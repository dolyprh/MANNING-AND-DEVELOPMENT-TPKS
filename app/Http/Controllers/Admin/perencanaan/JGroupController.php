<?php

namespace App\Http\Controllers\admin\perencanaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuModel;

class JGroupController extends Controller
{
    public function __construct()
    {
        $this->MenuModel = new MenuModel();
    }

    public function jadwal_group() {
        $data = [
            'menus' => $this->MenuModel->getMenus(),
            'submenus'    => $this->MenuModel->getSubmenus(),
        ];

        return view('admin/perencanaan/jadwal_group', $data);
    }
}
