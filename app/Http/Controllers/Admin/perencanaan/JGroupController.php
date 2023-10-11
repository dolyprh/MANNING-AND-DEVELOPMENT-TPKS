<?php

namespace App\Http\Controllers\admin\perencanaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuModel;
use App\Imports\jgrupImport;
use Maatwebsite\Excel\Importer;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Support\File;


class JGroupController extends Controller
{
    private $importer;

    public function __construct(Importer $importer)
    {
        $this->importer = $importer;
    }

    function importExcel(Request $request) 
    {
        Excel::import(new JGroupImport,request()->file('file_import'));
        
        return back();
    }

    public function import(Request $request) 
    {
        Excel::import(new jgrupImport(), $request->file('file'));
        return back();

    }
}
