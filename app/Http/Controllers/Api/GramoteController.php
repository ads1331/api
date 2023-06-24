<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gramote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GramoteController extends Controller
{
    public function index()
    {
        $gramote = Gramote::all();
        if($gramote->count()>0){




        return response()->json([
            'status'=>201,
            'gramote'=> $gramote
        ],201);}
        else{
            return response()->json([
                'status'=>404,
                'messege'=> 'Not found certificate'
            ],404);}
        }
    public function storee()
    {
        $gramote = Gramote::all();
        if($gramote->count()>0){



            return response()->json([
                'status'=>203,
                'message'=> "Вы пытаетесь удалить не свое"
            ],203);}
        else{
            return response()->json([
                'status'=>403,
                'messege'=> 'не существует записи с указанным ID'
            ],403);}
    }

        public function store(Request $request)
        {
            $validator = Validator::make($request->all(),[
                'name'=>'required|max:191',
                'photo'=>'required|string|max:191',
                'place'=>'required|string|max:191',
                'url'=>'required|string|max:191',
                'user_id'=>'required|integer|max:191',

            ]);

            if($validator->fails()){
                return response()->json([
                    'status' => 422,
                    'errors' => $validator->messages()
                ],422);
            }else{

                $gramote = Gramote::create([
                    'name' => $request->name,
                    'photo' => $request->photo,
                    'place' => $request->place,
                    'url' => $request->url,
                    'user_id' => $request->user_id,
                ]);

                if($gramote){


                    return response()->json([
                        'status'=>201,
                        'message'=>"all good"
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
