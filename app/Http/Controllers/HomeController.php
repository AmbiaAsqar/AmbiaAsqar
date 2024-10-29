<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\ApiUrl;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $url = new ApiUrl();
        $data = $url->getData(ApiUrl::$content, null);
        return view('home', ['data' => $data]);
    }
}
