<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

            $validatedData['password'] = bcrypt($request->password);

        $user = User::create($validatedData);

        $accessToken = $user->createToken('authToken')->accessToken;

        return response(['user'=> $user, 'access_token' => $accessToken]);
    }


    public function login(Request $request){

            $loginData = $request->validate([
                'email' => 'email|required',
                'password' => 'required',
            ]);

            if(!auth()->attempt($loginData)){
                return response(['message' => 'Invalid Credentials']);
            }

            $accessToken = auth()->user()->createToken('authToken')->accessToken;
            
            return response(['user'=> auth()->user(), 'access_token' => $accessToken]);

    }

    public function showUsers(){
        return response()->json(User::get());
    }
    public function UserId($id){
        $user = User::find($id);
        if(is_null($user)){
            return response()->json(['message'=>'Record Not Found']);
        }
        return response()->json($user);
    }
    public function delete(Request $request, $id){

        $user = User::find($id);
        if(is_null($user)){
            return response()->json(['message'=>'Record Not Found']);
        }
        $user->delete();
        return response()->json('Deleted');
    }
}
