<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\archivosPdfController;
use Illuminate\Support\Facades\DB;

class enviarArchivoController extends Controller
{

    public function enviarArchivos(Request $request){

        $subirArchivos = new archivosPdfController();
        print_r($subirArchivos);

        $urlArchivos = $subirArchivos->subir($request->nombre, 'documentos_pdf', $request->file('File'));

        DB::insert(
            'insert into pdf (url) values (?)',
            [
                $urlArchivos,
            ]
        );

        return $request;
    }

    public function enviarExcel(Request $request){

        $subirArchivos = new archivosPdfController();
        print_r($subirArchivos);

        $urlArchivos = $subirArchivos->excel($request->nombre, 'documentos_excel', $request->file('File'));

        DB::insert(
            'insert into excel (archivo) values (?)',
            [
                $urlArchivos,
            ]
        );
        return $request;
    }
    
}
