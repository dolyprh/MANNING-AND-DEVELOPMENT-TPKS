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

    public function insert_submenu($data)
    {
        if (DB::table('submenus')->insert($data)){
            return true;
        }else{
            return false;
        }
    }

    function delete_submenu($id_menu) {
        DB::table('submenus')->where('id', $id_menu)->delete();
    }
}
