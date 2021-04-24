<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    //Login

    public function loginUser(Request $request){

        $nickName = $request->input('nickName');
        $password = $request->input('password');


        try{
            //Que el nickName existe en la tabla user

            $validateUser = User::select('password')
            ->where('nickName', 'LIKE', $nickName)
            ->first();

            if(!$validateUser){
                return response()->json([
                    //nickName incorrecto
                    'error'=>"Nickname o password incorrecto"
                ]);
            }

            $hashed = $validateUser->password;

            //Comprueba si el password recibido corresponde con el del nickName del User

            if(Hash::check($password, $hashed)){

                //Genera el token

                $length = 50;
                $token = bin2hex(random_bytes($length));

                //Guardo el token en su campo de la DB

                User::where('nickName', $nickName)
                ->update(['token'=>$token]);

                //Devolvemos al front la info ya actualizada
                return User::where('nickName', 'LIKE', $nickName)
                ->get();
            }else{
                return response()->json([
                    //Password incorrecto
                    'error'=> "Nickname o password incorrecto"
                ]);
            }

        }catch(QueryException $error){

            return response()->$error;
        }

    }

    //LogOut

    public function logOutUser(Request $request){

        $nickName = $request->input('nickName');

        try{

            return User::where('nickName', '=', $nickName)
            ->update(['token' => '']);

        }catch(QueryException $error){
            return $error;
        }
    }

}
