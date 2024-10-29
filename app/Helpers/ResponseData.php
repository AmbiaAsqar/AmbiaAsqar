<?php

namespace App\Helpers;

use App\Helpers\ApiUrl;
use Illuminate\Support\Facades\Http;

class ResponseData {
    public function getData($url, $request) {
        $url = env('API_URL') . $url;
        $key = env("APP_KEY").env("API_KEY");
        $response = Http::withHeaders(['Authorization'=>bcrypt($key)])->get($url, $request)->json();
        return $response;
    }

    public function postData($url, $request) {
        $url = env('API_URL') . $url;
        $key = env("APP_KEY").env("API_KEY");
        $response = Http::withHeaders(['Authorization'=>bcrypt($key)])->post($url, $request)->json();
        return $response;
    }

    public function getPageDetail($url, $request, $id) {
        $url = env('API_URL') . $url .'/'. $id;
        $key = env("APP_KEY").env("API_KEY");
        $response = Http::withHeaders(['Authorization'=>bcrypt($key)])->get($url, $request)->json();
        return $response[0];
    }

    public function getDetailData($url, $request, $id) {
        $url = env('API_URL') . $url .'/'. $id;
        $key = env("APP_KEY").env("API_KEY");
        $response = Http::withHeaders(['Authorization'=>bcrypt($key)])->get($url, $request)->json();
        return $response;
    }
}