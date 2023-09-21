<?php

namespace App\Http\Controllers\admin\fooding;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuModel;

class PesananController extends Controller
{
    public function __construct()
    {
        $this->MenuModel = new MenuModel();
    }

    public function pesanan() {
        $data = [
            'menus' => $this->MenuModel->getMenus(),
            'submenus'    => $this->MenuModel->getSubmenus(),
        ];

        return view('admin/fooding/pesanan', $data);
    }
}
