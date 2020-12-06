<?php


namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    public function signIn(Request $request){

        $input = $request ->all();
        $input['password'] = Hash::make($request->password);
        if ($request->has("url_img"))
            $input["url_img"] = $this->loadImage($request->url_img);
        User::create($input);

        return response()->json([
            'res'=>true,
            'message'=>'Registro creado correctamente'
        ]);
    }

    public function logIn(Request $request){
        $user = User::whereEmail($request->email)->first();

        if(!is_null($user) && Hash::check($request->password, $user->password)){
            $user->api_token = Str::random(150);
            $user->save();

            return response()->json([
                'res'=>true,
                'token'=>$user->api_token,
                'message'=>'Ha accedido correctamente'
            ]);
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'Email o contraseña incorrecta'
            ]);
        }
    }

    public function logOut(){
        $user = auth()->user();
        $user->api_token = null;
        $user->save();

        return response()->json([
            'res'=>true,
            'message'=>'Ha salido correctamente'
        ]);
    }

    /*_______________________________USER CRUD___________________________________*/

    //Get 1 or all
    public function index(Request $request){
        return User::all();
    }

    //GET 1 specific
    public function show($dni){
        if (User::where('dni',$dni)->exists()){
            return User::where('dni',$dni)->get();
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'User not exists'
            ]);
        }

    }

    //PUT
    public function update($dni, Request $request){

        $data = [$request];
        $validator = \Validator::make($data,[
            'dni'=>'required|min:9|max:10',
            'name'=>'required'
        ]);
        $input = $request ->all();
        if ($request->has("url_img"))
            $input["url_img"] = $this->loadImage($request->url_image);

        $user = User::where('dni',$dni);
        $user->update($input);
        return response()->json([
            'res'=>true,
            'message'=>'Ususario modificado correctamente'
        ]);
    }


    //DELETE
    public function delete($dni){
        $user = User::where('dni',$dni);
        $user->delete();
        return response()->json([
            'res'=>true,
            'message'=>'Usuario eliminado correctamente'
        ]);
    }

    public function loadImage($file){
        $photoName = time().".". $file->getClientOriginalExtension();
        $file->move(base_path("/public/user_image"),$photoName);
        return $photoName;
    }
}
