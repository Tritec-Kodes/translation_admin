<?php

namespace App\Helpers;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ApiValidate{

    public static function login($request, $model){

        $validator = Validator::make($request->all(),$model::loginRules());

        if($validator->fails())
            throw new HttpResponseException(Api::failed($validator));
        else
            return[
                'username' => $request->email,
                'password' => $request->password
            ];
    }

    public static function register($request, $model){

        $validator = Validator::make($request->all(),$model::UserRegisterRules());
        if($validator->fails()){
            throw new HttpResponseException(Api::failed($validator));
        }
        else{
            return [
                'api_token' => Str::random(60)
            ] + $request->all();
        }

    }

}
