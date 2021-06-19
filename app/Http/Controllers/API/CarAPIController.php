<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\SafetyInfo;
use App\Models\Car;

class CarAPIController extends Controller
{
    // post
    public function register_car(Request $request) {
        if (User::where('id', $request->user_id)->exists()) {
            $user = User::find($request->user_id);

            $car = new Car;
            $car->user_id = $user->id;
            $car->car_number = $request->car_number;
            $car->car_img = $request->car_img;
            //$safetyInfo = SafetyInfo::where('user_id', $id)->get();
            //$car->safety_info_id = is_null($safetyInfo)? NULL : $safetyInfo->id;

            $car->save();

            return response($car, 200);
        } else {
            return response()->json([
                "message" => "회원정보가 유효하지 않습니다."
            ], 404);
        }
    }

    // put
    public function update_car(Request $request, $id) {
        if(Car::where('id', $id)->exists()) {
            $car = Car::find($id);
            $car->car_number = is_null($request->car_number)? $car->car_number : $request->car_number;
            $car->car_img = is_null($request->car_img)? $car->car_img : $request->car_img;
            $car->save();
            
            return response($car, 200);
        } else {
            return response()->json([
                "message" => "차 정보가 유효하지 않습니다."
            ], 404);
        }
    }

    // delete
    public function delete_car(Request $request, $id) {
        if(Car::where('id', $id)->exists()) {
            $car = Car::find($id);
            $car->delete();

            return response()->json([
                "message" => "차 정보 삭제가 완료되었습니다."
            ]);
        } else {
            return response()->json([
                "message" => "차 정보가 유효하지 않습니다."
            ], 404);
        }
    } 
}
