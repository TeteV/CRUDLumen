<?php


namespace App\Http\Controllers;


use App\Directorio;
use Illuminate\Http\Request;

class DirectorioController extends Controller
{
    //Get 1 or all
    public function index(Request $request){
        if($request -> has('txtBuscar'))
        {
            return Directorio::whereTelefono($request->txtBuscar)
                ->orWhere('nombre_completo', 'like', '%' . $request->txtBuscar . '%')->get();
        }else{
            return Directorio::all();
        }

    }

    //GET 1 specific
    public function show($id){
        return Directorio::findOrFail($id);
    }

    //POST
    public function store(Request $request){

        $this->validate($request,[
            'nombre_completo'=>'required|min:3|max:100',
            'telefono'=>'required|unique:directorios,telefono'
        ]);
        $input = $request ->all();
        Directorio::create($input);

        return response()->json([
            'res'=>true,
            'message'=>'Registro creado correctamente'
        ]);
    }

    //PUT
    public function update($id, Request $request){

        $this->validate($request,[
            'nombre_completo'=>'required|min:3|max:100',
            'telefono'=>'required|unique:directorios,telefono,'.$id
        ]);
        $input = $request ->all();
        $directorio = Directorio::find($id);
        $directorio->update($input);
        return response()->json([
            'res'=>true,
            'message'=>'Registro modificado correctamente'
        ]);
    }


    //DELETE
    public function delete($id){
        Directorio::destroy($id);
        return response()->json([
            'res'=>true,
            'message'=>'Registro eliminado correctamente'
        ]);
    }
}
