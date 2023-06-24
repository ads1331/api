<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function getlog()
    {
        $login = Login::all();
        if($login->count()>0){




            return response()->json([
                'status'=>201,
                'gramote'=> $login
            ],201);}
        else{
            return response()->json([
                'status'=>404,
                'messege'=> 'Not found certificate'
            ],404);}
    }

    public function postlog(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required|current_password:'

        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ],422);
        }else{

            $gramote = Gramote::create([
                'email' => $request->email,
                'password' => $request->password,

            ]);

            if($gramote){


                return response()->json([
                    'status'=>200,
                    'message'=>"Token, не разобрался"
                ],200);
            }else{
                return response()->json([
                    'status'=>500,
                    'message'=>"no all good"
                ],500);

            }
        }
    }

}

