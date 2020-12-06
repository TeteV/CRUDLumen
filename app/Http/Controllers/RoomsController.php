<?php


namespace App\Http\Controllers;

use App\Models\Rooms;
use Illuminate\Http\Request;


class RoomsController extends Controller
{
    //Get 1 or all
    public function index(Request $request){
            return Rooms::all();
    }

    //GET 1 specific
    public function show($num){
        if (Rooms::where('num',$num)->exists()){
            return Rooms::where('num',$num)->get();
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'Rooms no exists'
            ]);
        }

    }

    //POST
    public function store(Request $request){
        $data = [$request];
        $validator = \Validator::make($data,[
            'num'=>'required|min:1|max:3',
            'avaible'=>'required'
        ]);

        $input = $request ->all();
        if ($request->has("url_img"))
            $input["url_img"] = $this->loadImage($request->url_img);
        Rooms::create($input);

        return response()->json([
            'res'=>true,
            'message'=>'Registro creado correctamente'
        ]);
    }

    //PUT
    public function update($num, Request $request){

        $data = [$request];
        $validator = \Validator::make($data,[
            'num'=>'required|min:1|max:3',
            'avaible'=>'required'
        ]);
        $input = $request ->all();
        if ($request->has("url_img"))
            $input["url_img"] = $this->loadImage($request->url_image);

        $room = Rooms::where('num',$num);
        $room->update($input);
        return response()->json([
            'res'=>true,
            'message'=>'Registro modificado correctamente'
        ]);
    }


    //DELETE
    public function delete($num){
        $room = Rooms::where('num',$num);
        $room->delete();
        return response()->json([
            'res'=>true,
            'message'=>'Registro eliminado correctamente'
        ]);
    }

    public function loadImage($file){
        $photoName = time().".". $file->getClientOriginalExtension();
        $file->move(base_path("/public/rooms_image"),$photoName);
        return $photoName;
    }
}
