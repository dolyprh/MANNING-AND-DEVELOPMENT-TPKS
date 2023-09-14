<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\MenuModel;
use App\Models\SubmenuModel;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->MenuModel = new MenuModel();
    }

    public function index()
    {
        $data = [
            'menus' => $this->MenuModel->getMenus(),
            'submenus'    => $this->MenuModel->getSubmenus(),
        ];

        return view('welcome', $data);
    }

    public function menu()
        {
            // $menus = menus::all();
            // $submenus = SubmenuModel::all();

            $data = [
                'menus' => $this->MenuModel->getMenus(),
                'submenus'    => $this->MenuModel->getSubmenus(),
            ];

            return view('layouts/sidebar', $data);
        }
}
