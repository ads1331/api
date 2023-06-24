<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use  App\Models\Register;

class RegisterController extends Controller
{
    public function getreg()
    {
        $register = Register::all();
        if($register->count()>0){




            return response()->json([
                'status'=>201,
                'register'=> $register
            ],201);}
        else{
            return response()->json([
                'status'=>404,
                'messege'=> 'Not found certificate'
            ],404);}
    }

    public function postreg(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required|string|max:191',
            'email'=>'required|string|max:191',
            'phone'=>'required|digits:11',
            'password'=>'required|min:8|max:191'

        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ],422);
        }else{

            $register = Register::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => $request->password,
            ]);

            if($register){


                return response()->json([
                    'status'=>201,
                    'message'=>"id,так и не разобрался как вставить id или что-то другое"
                ],201);
            }else{
                return response()->json([
                    'status'=>500,
                    'message'=>"no all good"
                ],500);

            }
        }
    }

}
