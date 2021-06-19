<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;

class AuthAPIController extends Controller
{
    public function register(Request $request) {
        $data = array(
            'name' => $request -> name,
            'email' => $request -> email,
            'password' => bcrypt($request->password),
            'phone' => $request -> phone,
            'birth' => $request -> birth
        );
        $doesExist = User::where([['name',$data['name']], ['phone', $data['phone']], ['birth', $data['birth']]])->exists();
        if($doesExist){
            return response(['message' => 'already Exists']);
        }
        
        $user = User::create($data);
        $accessToken = $user->createToken('authToken')->accessToken;
        
        return response([ 'user' => $user, 'access_token' => $accessToken], 200);
    }
    
    public function validEmail(Request $request){
        if(User::where('email', $request->email)->exists())
            return response(['message' => 'already Exists']);
        return response(['message' => 'success']);
    }
    
    public function login(Request $request) {
        $loginData = array(
            'email' => $request->email,
            'password' => $request->password
        );
        
        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid Credentials']);
        }
        
        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        return response(['user' => auth()->user(), 'access_token' => $accessToken]);
    }
    
    public function logout(Request $request) {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
    
    public function getUser(Request $request) {
        return response()->json($request->user());
    }
}
