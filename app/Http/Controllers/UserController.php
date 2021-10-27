<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserValidateRequest;

class UserController extends Controller
{


    public function register(Request $request)
    {


        $variables=$request->validate(UserValidateRequest::rules()['register']);


        $user = User::create([
            'name'=>$variables['name'],
            'email'=>$variables['email'],
            'password'=>bcrypt($variables['password']),
        ]);

        $token = $user->createToken('token')->plainTextToken;

        $respone=['user'=>$user, 'token'=>$token ];

        return response($respone , 201);
    }

    public function login(Request $request)
    {

        $variables=$request->validate(UserValidateRequest::rules()['login']);

        $user=User::where('email',$variables['email'])->first();

        if(!$user || !Hash::check($variables['password'],$user->password))
        {
            return response('not correct', 401);
        }
        else
        {
            $token = $user->createToken('token')->plainTextToken;

            $respone=['user'=>$user, 'token'=>$token ];

            return response($respone , 201);
        }


    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return 'logout';
    }

}
