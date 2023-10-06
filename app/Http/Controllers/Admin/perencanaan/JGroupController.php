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
       
        // return $this->importer->import(new JGroupImport, 'file_import.xlsx');
        // $path = $request->file('file_import');

        // Excel::import(new JGroupImport, $path);
        // Excel::import(new JGroupImport, $request->file('file_import')->store('temp'));
        Excel::import(new JGroupImport,request()->file('file_import'));
        
        // return redirect('/jadwal-group')->withSuccess('Jadwal Group Berhasil diimport');
        return back();
    }

    public function import(Request $request) 
    {
        // $path1 = $request->file('file_import')->store('temp'); 
        // $path=storage_path('app').'/'.$path1;  
        // $data = \Excel::import(new jgrupImport,$path);

        Excel::import(new jgrupImport(), $request->file('file'));
        return back();
        // return $this->importer->import(new jgrupImport, 'file_import');
        // $path = $request->file('file_import');

        // Excel::import(new jgrupImport, $path);
        // Excel::import(new jgrupImport, $request->file('file_import'));
        // Excel::import(new jgrupImport,request()->file('file_import'));
        // if($data) {
        //     return redirect('/jadwal-group')->withSuccess('Jadwal Group Berhasil diimport');
        // }

        // return $this->importer->import(new jgrupImport, 'file_import.xlsx');

    }
}
