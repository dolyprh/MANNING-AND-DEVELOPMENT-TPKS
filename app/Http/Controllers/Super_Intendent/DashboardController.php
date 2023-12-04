<?php

namespace App\Http\Controllers\Super_Intendent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuModel;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->MenuModel = new MenuModel();
    }

    public function dashboard() {
        $data = [
            'menus' => $this->MenuModel->getMenus(),
            'submenus'    => $this->MenuModel->getSubmenus(),
        ];

        return view('superintendent.dashboard', $data);
    }
}
