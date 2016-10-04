<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function auth(Request $request)
    {
        $return = [
            'success' => false,
            'message' => 'You are not authenticated',
            'result' => [],
        ];

        if($request->has('email') && $request->has('password')){
            $user = User::whereEmail($request->email)->first();

            if($user){
                if (\Hash::check($request->password, $user->password)) {
                    $user->api_token = str_random(60);
                    $user->save();

                    $return = [
                        'success' => true,
                        'message' => 'You are authenticated',
                        'result' => ['api_token' => $user->api_token],
                    ];
                    return \Response::json($return);

                }else
                    return \Response::json($return);

            }else
                return \Response::json($return);

        }else
            return \Response::json($return);

    }
}
