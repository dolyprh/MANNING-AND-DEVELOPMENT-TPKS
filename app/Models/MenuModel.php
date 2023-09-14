<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MenuModel extends Model
{
    public function getMenus()
    {
        return DB::table('menus')->get();
    }

    public function getSubmenus()
    {
        return DB::table('submenus')->get();
    }
}
