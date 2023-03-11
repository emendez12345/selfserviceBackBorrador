<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class archivosPdfController extends Controller
{
    public function subir($name, $path, $file){
        $extension = $file->extension();
        $fileName=Str::random(30).'_'.$name.'.'.$extension;
        $file->move(public_path($path), $fileName);
        return env('APP_URL').'/'.$path.'/'.$fileName;

    }

    public function excel($name, $path, $file){
        $extension = $file->extension();
        $fileName='portal'.$name.'.'.$extension;
        $file->move(public_path($path), $fileName);
        return env('APP_URL').'/'.$path.'/'.$fileName;

    }
}
