<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $rules = [
            'email'   => 'required|email',
            'password' => 'required'
          ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
          }
          if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            dd('hai1');
          }
          dd('hai');
    }
}