<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscripcion;
use DB;

class InscripcionController extends Controller
{
    //
    public function index(){
        return Inscripcion::all();
    }

    public function show($id){
         return Inscripcion::find($id);
    }

    public function create(Request $request){
        $inscripciones=new Inscripcion();
        $inscripciones->name= $request->name=$request->input('name');
        $inscripciones->save();
        return json_encode(['msg'=>'Agregado']);
    }

    public function destroy($id){
        Inscripcion::destroy($id);
        return json_encode(['msg'=>'Eliminado']);
    }

    public function edit(Request $request, $id){
        
        $name=$request->input('name');

        Inscripcion::where('id',$id)->update(
            [ 'name'=>$name]
            );
            return json_encode(['msg'=>'Modificado y Actualizado']);
    }
}
