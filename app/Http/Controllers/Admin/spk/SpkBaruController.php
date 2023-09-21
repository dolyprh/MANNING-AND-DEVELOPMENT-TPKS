<?php

namespace App\Http\Controllers\admin\spk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuModel;

class SpkBaruController extends Controller
{
    public function __construct()
    {
        $this->MenuModel = new MenuModel();
    }

    public function spk_baru() {
        $data = [
            'menus' => $this->MenuModel->getMenus(),
            'submenus'    => $this->MenuModel->getSubmenus(),
        ];

        return view('admin/spk/spk_baru', $data);
    }
}
