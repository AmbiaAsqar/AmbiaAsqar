<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;

class UserController extends Controller
{
    public function login() {
        //
    }

    public function checkNumber($number, $pin) {
        // Replace any symbols
        $regex = preg_replace('/[^0-9]/', '', $number);

        // Serialize number
        $getLocalePrefix = substr($regex, 0, 1);
        $getInternationalPrefix = substr($regex, 0, 2);

        $msisdn = $number;
        if($getLocalePrefix == "0") {
            $trimNumber = substr($regex, 1);
            $msisdn = $trimNumber;
        }

        if($getInternationalPrefix == "62") {
            $trimNumber = substr($regex, 2);
            $msisdn = $trimNumber;
        }

        $number = User::where('msisdn', '62'.$msisdn)->where('pin', $pin);
        $getnumber = $number->first();

        if(!$getnumber || !$getnumber->pin) {
            $result = [
                "status" => "2",
                "rc" => "02",
                "message" => "MSISDN or PIN is incorrect"
            ];

            return $result;
        }

        if($getnumber->status < 1) {
            $result = [
                "status" => "2",
                "rc" => "02",
                "message" => "Your account inactive"
            ];

            return $result;
        }

        $result = [
            "status" => "0",
            "rc" => "00",
            "message" => "success",
            "detail" => $getnumber
        ];

        return response()->json($result);
    }

    public function userDetail(Request $request, $number) {
        $auth = $request->header("Authorization") ?? "";

        if($auth != base64_encode($number)) return $this->errorHandling("noAuth");

        $user = User::where("msisdn", $number)->first();

        return response()->json($user);
    }

    public function profile(Request $request, $number) {
        $auth = $request->header("Authorization") ?? "";

        if($auth != base64_encode($number)) return $this->errorHandling("noAuth");

        $detail = User::where("msisdn", $number)->first();
        $userId = $detail['nik'];
        $profile = Profile::where("nik", $userId)->first();

        return response()->json($profile);
    }

    private function errorHandling($error) {
        if($error == "noAuth") return response()->json("Invalid Authorization", 419);
    }
}
