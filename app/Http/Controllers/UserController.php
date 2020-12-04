<?php


namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function signIn(Request $request){

        $input = $request ->all();
        $input['password'] = Hash::make($request->password);
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
}
