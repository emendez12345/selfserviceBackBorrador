<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\archivosPdfController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;

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

        // this.conexionFtp();

        return $request;
    }
    public function conexionFtp()
    {
        /*
        Json de dato datos_integracion de la tabla tiendas requerido de rutas para las integraciones:
        {
        "usuarioFTP": "*****",
        "contrasenaFTP": "*****",
        "rutaProductos": "/PruebasQA/Productos/",
        "rutaStock":"/PruebasQA/Productos/Stock/"},
        "rutaFotos":"/PruebasQA/Productos/Fotos/"}
         */
        // try {
        //     $ftp = Storage::createFtpDriver([
        //         'driver' => 'ftp',
        //         'host' => env('FTP_HOST'),
        //         'username' => $usuario,
        //         'password' => $contrasena,
        //         'port' => env('FTP_PORT'),
        //     ]);
        //     Storage::disk('publicIMG')->put($name, $contents);
        //     return $ftp;
        // } catch (\Exception$e) {
        //     return false;
        // }
    }
    public function conexionpostgresql(Request $request){

        $bancos=DB::select('select sociedad,banco from banco_occidente');
        $facturas=DB::select('select numero_factura,valor from banco_occidente where numero_identificacion=?',[$request->numero_identificacion]);
        foreach ($bancos as $key => $banco) {
            $bancos[$key]->sociedad;
        }
        $output[] = Arr::add((array) $bancos[$key], 'facturas', $facturas);

        return response()->json($output, 200);

    }

    
}
