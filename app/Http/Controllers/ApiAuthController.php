<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Iluminate\Support\Facades\Auth;
// use Iluminate\Support\Facades\Auth;
use App\Http\Controllers\BaseController as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ApiAuthController extends BaseController
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if($validator->fails()) {
            return $this->sendError('Validator Error', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);

        $user = User::create($input);
        // Generate Auth Token
        $success['token'] = $user->createToken("AuthToken")->accessToken;
        $success['account'] = $user;

        return $this->sendResponse($success, 'Account Created Successfully!!');
    }

    public function login(Request $request)
    {
        // if(Auth::attempt(['email' = $request->get('email'), 'passsword' => $request->password])){
            if(Auth::attempt(['email' => $request->get('email'), 'password' => $request->password])){
            $user = Auth::user();
            $succes['token'] =  $user->createToken("AuthToken")->accessToken;
            $succes['user'] = $user;

            return $this->sendResponse($succes, 'You Logged in Successfully!!');
        }
        else{
            return $this->sendError('UnAuthenticated ', ['error' => 'UnAuthorized..']); 
        }
    }
}
